<?php
namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use frontend\models\RegForm;
use frontend\models\ListGoodsForm;
use frontend\models\GoodsForm;
use frontend\models\User1;
use frontend\models\Goods;
use frontend\models\Color;
use frontend\models\Size;
use frontend\models\OrderForm;
use frontend\models\Payment;
use frontend\models\Delivery;
use frontend\models\Reviews;
use frontend\models\Category1;
use frontend\models\Category2;
use frontend\models\Category3;
use frontend\models\ContactForm;
use frontend\models\Order;
use frontend\models\Order_goods;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\Html;

use yii\web\Cookie;
use yii\web\Session;

use yii\db\Query;
use yii\db\ActiveQuery;
use yii\db\Command;

use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $nameCategory1;
    public $nameCategory2;
    public $arr_bascet = array();
    
 
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
     //Вход
    public function actionLogin()
    { 
        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;
      
          $model = new LoginForm();
    
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } 
        
            return $this->render('login', ['model' => $model]);
        
       
       
    }
    
    
    
   //Регистрация
   public function actionReg(){
     $model = new RegForm();    
    if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User1::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                      // if ( $user->admin==20): echo "Kkkk"; die; return $this->redirect(Url::toRoute('/goods/index'));
                    //    endif;
                        return $this->goHome();
                    endif;
                endif;               
                else: 
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
      endif;
      return $this->render('reg', ['model' => $model]);
   }
   
   
    /**
     * Logs out the current user.
     *   Выход
     * @return mixed
     */
    public function actionLogout()
    {
        // Выходим
        \Yii::$app->user->logout();
                
        //echo "ddsd"; 
      //  die;
        return $this->goHome();
    }

    //Поиск товара
    public function actionSearch(){
    
         $model;
        //подключение к базе данных id, name,Category1.name AS Category1
         $db=Yii::$app->db;  
    
       $search=Yii::$app->request->post('search');
         if (!empty($search)) {
         $search1= substr($search,0, -1);
       //   $search1= substr($search1,0, -1);
        //     $listGoods = Goods::find()->where( ['like', 'name', $search1] )->all();
      //  echo $search;
              $str='SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
                         LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
                         LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
                         LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
                         WHERE `full_description` like "%'.$search.'%"';
             
             
            $model = $db->createCommand($str)  ->queryAll();
             
            }
       
       else return $this->goBack();
       
        return $this->render('search', ['model' => $model, 'search1' => $search,]);
      
      
       
    }     

 //Поиск товара
    public function actionNew_hits_sale(){
    
       $n_h_s=Yii::$app->request->post('n_h_s');
      $model;
        //подключение к базе данных id, name,Category1.name AS Category1
         $db=Yii::$app->db;  
        // echo $n_h_s;
	 switch ($n_h_s) {
                case 1:
                    $n_h_s='new1';
                    echo $n_h_s;
                  //  $listGoods = Goods::find()->where([$n_h_s => 1])->all(); 
                    $str='SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
                         LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
                         LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
                         LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
                         WHERE Goods.'.$n_h_s.'=1 AND Goods.visible=1 ';
                                                  
                    $n_h_s='Новинки';    
                    break;
                case 2:
                     $n_h_s='hits';
                    $str='SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
                         LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
                         LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
                         LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
                         WHERE Goods.'.$n_h_s.'=1 AND Goods.visible=1 ';
                          
                      $n_h_s='Лидеры продаж';    
                    break;
                case 3:
                    $n_h_s='sale'; 
                      $str='SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
                         LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
                         LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
                         LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
                         WHERE Goods.'.$n_h_s.'=1 AND Goods.visible=1 ';
                    
                     $n_h_s='Распродажа';    
                    break;
                default:
                    return $this->goBack();                 
            }

    
        $model = $db->createCommand($str) 
            ->queryAll();
     
             
        return $this->render('search', ['model' => $model, 'search1' => $n_h_s ]);
      
      
       
    } 
         
    //Вывод контактов
     public function actionContact()
    {
        return $this->render('contact');
    }
       
    //Вывод таблицы размеров 
     public function actionSize_table()
    {
        return $this->render('size_table');
    }
    
   
   //Список товаров 
    public function actionListgoods()
    {
        $category1;
        $category2;
        $category3;
        $sort;
        $price;
        $checkboxListColor;
        $checkboxListSize;
        
        
        // возвращает покупателя с идентификатором 123
// SELECT * FROM `customer` WHERE `id` = 123
//$customer = Customer::find() ->where(['id' => 123]) ->one();
    
          $session = Yii::$app->session;
        // открываем сессию
           $session->open();
      
       // Создание запороса к БД ->'SELECT * FROM Goods'
            $query = new Query;   
            $query->from('Goods');
              
          $str=Yii::$app->request->post('id_category1');
          if (!empty ($str))
          {  
        $category1=Yii::$app->request->post('id_category1');
        $category2=Yii::$app->request->post('id_category2');
        $category3=Yii::$app->request->post('id_category3');
        $sort=Yii::$app->request->post('sort-by');
        $price=Yii::$app->request->post('price');
        
         $model= new ListGoodsForm();
           
         $model->load(\Yii::$app->request->post());
        
        $checkboxListColor=$model->checkboxListColor;
        $checkboxListSize=  $model->checkboxListSize;
        
        $session->set('id_category1', $category1);
        $session->set('id_category2', $category2);
        $session->set('id_category3', $category3);
        $session->set('sort', $sort);
        $session->set('price', $price);
        $session->set('checkboxListColor',  $model->checkboxListColor);
        $session->set('checkboxListSize',  $model->checkboxListSize);
        
        
      // echo  'sortt_' ;
    //   echo $sort;
     //    echo  '__sortt_' ;
         }
         
         else {
            
        $category1=$session->get('id_category1');
        $category2=$session->get('id_category2');
        $category3=$session->get('id_category3');
        $sort=$session->get('sort-by');
        $price=$session->get('price');
        $checkboxListColor=$session->get('checkboxListColor');
        $checkboxListSize= $session->get('checkboxListSize');
         }
         
         
         
       //  echo $category1."SSSSSS_____category1____".$category2."___cat3=". $category3."<br/>";
         
        if (isset($category1))
        { //echo $category1."__GHH___category1____".$category2."___cat3=". $category3;
            
         // $goods=Goods::find()->where(['id_category1' => $_GET['id_category1'],'id_category2' => $_GET['id_category2']])->all();
            $query->where(['id_category1' => $category1,'id_category2' => $category2]);
           
            $nameCategory1=Category1::find()->where(['id' => $category1])->one();
            $nameCategory2=Category2::find()->where(['id' => $category2])->one();         
            $nameCategory3 = Category3::find()->where( ['like', 'id_catygory2', $category2] )->all();
          //  echo $nameCategory3;
          //$category3=Yii::$app->request->post('id_category3');
           if ($category3!='NULL') { 
            
           //  echo  $category1;
           // echo $category2;
       
       // die;*/
             // echo $category3;
            $query->andWhere( ['like', 'id_category3', $category3] );
           }
           
        };
        //сортировка по цене
         $price1=180;
         $price2=3000;
    //    $price=Yii::$app->request->post('price');
         if (!empty($price)) {
      //  echo $price."  <br />";
      //  echo" <br />  <br />";
         $slider=explode(",",$price); 
       //  echo is_string($price);
        
         $price1= $slider[0];
         $price2= $slider[1];
      
            $query->andWhere( ['>', 'price',  $price1] );
            $query->andWhere( ['<', 'price',  $price2] );
         
            }
            
            //сортировка по возростанию или убыванию цены
            if (!empty($sort))
            {//echo "sort!!";
                if ($sort=='price-asc'){
                    
                     $query->orderBy('price ASC');
                }
                else  $query->orderBy('price DESC');
            }
       
           $model= new ListGoodsForm();
           
        /*   if($model->load(\Yii::$app->request->post())) {
                echo '  </br>';
                 echo  print_r($model->checkboxListColor) ;
               echo '   ____________еее</br>';
              echo  print_r( $model->checkboxListSize); 
               echo 'уу</br>';
                */ 
            
              //______поиск  товар по заданному  цвету_________
              // if(!empty($model->checkboxListColor) )
                if(!empty($checkboxListColor) )
               {  
                //echo "MMM</br>";
              // $color = Color::find()->where(['id' => $model->checkboxListColor])->asArray()->all(); //->asArray()
               $color = (new Query())->select(['name']) ->from('Color')->where(['id' => $checkboxListColor]) ->all();
                
               $dd=(new Query())->select(['name']) ->from('Color')->where(['id' => $checkboxListColor]) ->all();
                $arrayColor=array ();
                foreach ($dd as $c)
                {
                    $arrayColor[]=$c[name];
                }
                            //echo  print_r($color) ; echo '</br>';
                             //  echo  print_r($as) ; echo '</br>';
                $query->andWhere( ['or like', 'id_color',$arrayColor  ] );
                }
                
                // поиск  товар по заданному  размеру
             //  if(!empty($model->checkboxListSize))  {
               if(!empty($checkboxListSize))  {
                
              //  $size1 = Size::find()->where(['id' => $model->checkboxListSize]) ->asArray()->all();
                $size1 = (new Query())->select(['name']) ->from('Size')->where(['id' => $checkboxListSize]) ->all();
              //  echo print_r( $size1); 
                $arrSize=array ();
                foreach ($size1 as $ar)
                {
                    $arrSize[]=$ar[name];
                }
                 $query->andWhere( ['or like', 'id_size', $arrSize] );
                 }   
     //}
     
        $color=Color::find()->all();  
        $size = Size::find()->where("name > '40' and name<'53'")->all();
      
      //  $goods = $query->all();
        
      ////постраничный вывод данных
            $pagination = new Pagination([
            'defaultPageSize' =>6,
            'totalCount' => $query->count(),
        ]);
        
        
      
         $goods = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
       
        return $this->render('listgoods',['goods' => $goods,'pagination' => $pagination ,'modelColor' => $model,'color' => $color, 'size' => $size ,'nameCategory1' => $nameCategory1,
         'nameCategory2' => $nameCategory2, 'nameCategory3' => $nameCategory3,'id_category1' => $category1,'id_category2' => $category2,'id_category3' => $category3,
         'goods1' => $goods1, 'price1' => $price1, 'price2' => $price2 ]);
        
        
    }
    
    //Характеристика одного товара
     public function actionGoods()
    {      
      //  $addGoods=0;
        // возвращает покупателя с идентификатором 123
// SELECT * FROM `customer` WHERE `id` = 123
//$customer = Customer::find() ->where(['id' => 123]) ->one();

      
       
       /* if (isset($_GET['id']))
        { 
           $model=Goods::findOne($_GET['id']);
          
        };
      /or */
        $id=Yii::$app->request->get("id");
        //  $model=Goods::findOne($id);         
        //   $model = (new Query())->from('Goods')->where(['id' =>  $id) ->all();
         
          //подключение к базе данных id, name,Category1.name AS Category1
          $db=Yii::$app->db;
           
          // $sql="SELECT Goods.*,   FROM `Goods` LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id WHERE Goods.id=5";
           $model = $db->createCommand('SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
             LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
             LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
             LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
              WHERE Goods.id=:id')       
           ->bindValue(':id',  $id)
            ->queryAll();
            
            
            
            
            //отзывы о товаре
             $modelReviews=new Reviews();
             //добавление отзыва в БД
       if($modelReviews->load(\Yii::$app->request->post()))
       { //echo "jjjj";
         $modelReviews->saveReviews($id);
        
         unset( $_POST[name_user]);
         unset( $_POST[message]);
      
       //  echo  print_r($modelReviews->getAttributes());
       }            
          $reviews = $db->createCommand('SELECT Reviews.name_user,Reviews.message,  DATE_FORMAT( Reviews.date,"%d.%m.%Y") as date1,  User1.firstname AS nameUser  FROM `Reviews`  
             LEFT JOIN `User1` ON  Reviews.id_user=User1.id             
             WHERE Reviews.id_good=:id')       
           ->bindValue(':id',  $id)
            ->queryAll();


     //Добовление товара в корзину
       $modelGood=new GoodsForm();
   //echo print_r($reviews);
         if($modelGood->load(\Yii::$app->request->post())&&$modelGood->validate())
     {       
        $modelGood->addtoBasket($id);
      // $modelGood-> total_quantity($_SESSION['basket']);
            $addGoods='yes';
      // echo "++SERR________ <br />";
     //  echo  $_SESSION['total_quantity'].' KKK<br />';
      //  echo $modelGood->listColor;
      //  echo $modelGood->quantity;
    // print_r($modelGood->getAttributes());
      //echo "tttt________<br />";
    // echo    print_r($_SESSION['basket']);
        
        
        
        
      
         /*  echo "ttt________<br />".$modelGood->listSize;
           $result = count($a);
           echo count($_SESSION['basket'])."count________<br />";
     for($i=0; $i<count($_SESSION['basket']) ; $i++)    
         { 
         //   echo $basket['id'].'  '.$basket['qty'] ;  
             if(($_SESSION['basket'][$i]['id']==$id)&&$_SESSION['basket'][$i]['color']==$modelGood->listColor&&$_SESSION['basket'][$i]['size']==$modelGood->listSize) 
             {  echo $_SESSION['basket'][$i]['qty']."________<br />";
                // $_SESSION['basket'][$i]['qty']+=$modelGood->quantity;
               // $this-> total_sum_quantity ();
                  echo  $_SESSION['basket'][$i]['qty']. "________rrr<br />";
                return ;
              }
         }
   
        
        
        
      die;*/
       
     }
      
            
       return $this->render('goods',['model' => $model,'modelGood' => $modelGood,'addGoods' => $addGoods, 'reviews' =>$reviews, 'modelReviews' =>$modelReviews]);
        
        
    } 
   public function  actionBasket (){
    
        $ar = array ();
        $session = Yii::$app->session;
       // открываем сессию
        $session->open();
        
        $modelGood=new GoodsForm();        
        
        //изменение колличества товара в корзине
          $qty=Yii::$app->request->post('qty');
          if (!is_int($qty)) {
        
            $id=Yii::$app->request->post('id');
            $color=Yii::$app->request->post('color');
            $size=Yii::$app->request->post('size');
          // $qty=Yii::$app->request->post('qty');
       
           $modelGood-> re_count($id, $color, $size, $qty);             
              
            }
                     
          if(!empty($_SESSION['basket']))
          {  
        //вывод товара в корзину
         foreach ($_SESSION['basket'] as  $basket){         
          $ar[]=$basket['id'];
          //echo print_r($ar);
        }; 
       
        //преобразует массив в строку с запятой
        $id_ar = implode(", ", $ar);
      //  echo "__".$id_ar;
         $db=Yii::$app->db;
           
          /* $sql="SELECT Goods.id, Goods.name, Goods.id_brands, Goods.id_category1, Goods.id_category2, 
             Category1.name AS nameCetegory1, Category2.name AS nameCetegory2,  Goods.img,  Goods.img_clothers,
             Goods.price FROM `Goods`  LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
              WHERE Goods.id=5";*/
            $sql='SELECT Goods.*,  Category1.name AS nameCategory1, Category2.name AS nameCategory2, Brands.name AS nameBrands  FROM `Goods`  
             LEFT JOIN `Category1` ON  Goods.id_category1=Category1.id 
             LEFT JOIN `Category2` ON  Goods.id_category2=Category2.id
             LEFT JOIN `Brands` ON  Goods.id_brands=Brands.id
              WHERE Goods.id IN ('.$id_ar.')';  
              
         $model = $db->createCommand($sql) 
            ->queryAll();
      //  $model = Goods::find()->where(['id' =>$ar ])->all();
       }
         return $this->render('basket',['model' => $model, 'modelGood' => $modelGood ]); 
    }
    
    //======Удаление товара с корзины========
      public function  actionDel_basket (){
        $ar = array ();
        $session = Yii::$app->session;
       // открываем сессию
        $session->open();
        
        $modelGood=new GoodsForm();
            
            //удаление товара с  корзины
          $quantity=Yii::$app->request->post('quantity');
          if (!is_int($quantity)) {
        
            $id=Yii::$app->request->post('id');
            $color=Yii::$app->request->post('color');
            $size=Yii::$app->request->post('size');
           
       
           $modelGood-> delete_goods($id, $color, $size);             
           $modelGood-> total_sum_quantity();  
         
            }           
       
         return $this->actionBasket ();
    }
    

 
 //Оформление заказа
 public function  actionOrder (){
      $save_goods=false;
      $error=true;
    $model=new OrderForm();
    $deliv=Delivery::find()->all();
    $paym=Payment::find()->all();
     if($model->load(\Yii::$app->request->post())&&$model->validate())
     { 
         
        $save_goods=$model->save();
        // $save_goods=true;
     //   $error=$model->save();
       
    }
    
     return $this->render('order',['model' => $model,'deliv' => $deliv,'paym' => $paym,'save_goods' => $save_goods,'error' => $error]); 
    }
}
