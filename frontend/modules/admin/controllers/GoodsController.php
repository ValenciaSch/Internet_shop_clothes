<?php
namespace app\modules\admin\controllers;

use Yii;
use frontend\models\Goods;
use frontend\models\GoodsCreateForm;
use frontend\models\Search\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\UploadTableForm;
use yii\web\UploadedFile;
use frontend\models\Category1;
use frontend\models\Category2;
use frontend\models\Category3;
use frontend\models\Brands;
use yii\helpers\BaseFileHelper;

use yii\db\Query;
use yii\db\ActiveQuery;

use yii\filters\AccessControl;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends Controller
{ //подключение шапки
     public $layout="inner";
     
  /*  public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
*/
    public function behaviors()
    { 
         return [
            'access' => [
                'class' => AccessControl::className(),
              //   'only' => ['index'],
                'rules' => [
                    [
                       // 'actions' => ['index'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                             return Yii::$app->user->identity->admin == '20';
                        }
                    ],
                ],
            ],
        ];
    }
    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
         $tableModel = new UploadTableForm();
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        //загрузка файла
        $uploadFile=false;
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tableModel' => $tableModel,
            'uploadFile' => $uploadFile,
        ]);
    }
    
      public function actionUpload()
    {
         $tableModel = new UploadTableForm();
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        $model = new UploadTableForm();

     
      
       
      //   if (Yii::$app->request->isPost){
       if ($model->load(Yii::$app->request->post())){
        
        //   сохранение данных из файла в БД
          $model->file = UploadedFile::getInstance($model, 'file');
      if (!empty($model->file)) {
          
            //echo $model->file ;
            //echo $model->file->baseName ;
            //echo "--";
            //echo $model->file->extension;
        //   echo "HHH <br/>";
            //echo $path=Yii::getAlias('@app').'\\web\\uploads\\';
            if ($model->file && $model->validate()) {                
          
                $model->file->saveAs(Yii::getAlias('@uploads'). $model->file);
                
               $uploadFile= $model->saveTable($model->file);//сохранение данных
            }
        }
        
        
        
         //редактирование цены в БД по id
            $model->file_id = UploadedFile::getInstance($model, 'file_id');            
           if (!empty($model->file_id)) {
              //   echo $model->file_id ;
             //   echo $model->file_id->baseName ;
             //   echo "--";
              
                //echo $model->file->extension;
            //    echo "HHH2 <br/>";
            //    echo $path=Yii::getAlias('@app').'\\web\\uploads\\';
                if ($model->file_id && $model->validate()) {                
              
                    $model->file_id->saveAs(Yii::getAlias('@uploads').$model->file_id);
                    
                  $uploadFile= $model->updateTable($model->file_id);//редактирование данных
                }
            }
        }
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tableModel' => $tableModel,
             'uploadFile' => $uploadFile
        ]);
    }
    

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GoodsCreateForm();
          
            
           //  if(Yii::$app->request->isPost){
            
         if ($model->load(Yii::$app->request->post())){
           
            //сохранение данных в БД, кроме  'img_clothers' и   'img_slide' и img
           $model-> saveCreate();
         
         
           //получаем id сохраненой строки
          $nameid=Goods::find()->where(['id_category1' =>$model->id_category1,'id_category2' =>$model->id_category2 ,'name' => $model->name,
            'short_description' => $model->short_description, 'full_description' => $model->full_description, 'price' => $model->price])->one();
         
       
    //    echo "____</br>";
          
              //  if (Yii::$app->request->isPost) {  
             // echo print_r($model->getAttributes());
            $nameCategory1=Category1::findOne($model->id_category1);
            $nameCategory2=Category2::findOne($model->id_category2);             
           
            $path = Yii::getAlias("@frontend/web/img_goods/".$nameCategory1->name."/".$nameCategory2->name."/");//прописываем путь
            //  $path = Yii::getAlias("@frontend/web/img_goods/".$model->id_category1."/".$model->id_category2);//прописываем путь
         //  echo $path;
           
           
       // $new_name = str_replace(«\», «\\», $path);
         mkdir($path, 0755, true);
           BaseFileHelper::createDirectory($path);////проверяем есть ли директория, а иначе создаем ее   
          
             
            
            $model->img_clothers = UploadedFile::getInstances($model, 'img_clothers');//загружаем файлы
         
              $time=1;//счетчик
              $ar_img_clothers=array();//список новых имен файлов     
            foreach ( $model->img_clothers as $file) {
                
                  $name = $nameid['id'].'_'. $time.'_'.$model->name.'.'.$file->extension;//переименовываем файл
                  $ar_img_clothers[]=$name;
           //       echo $name;
             //   $file->saveAs(Yii::getAlias('@uploads'). $file->baseName . '.' . $file->extension);
                 // $file->saveAs($path. $file->baseName . '.' . $file->extension);
                 $file->saveAs($path.$name);
                 
                  $time++;
            }
            $str_clothers = implode("; ", $ar_img_clothers);//формирует строку из массива.
            
            
            
            $model->img_slide = UploadedFile::getInstances($model, 'img_slide');
         
             $ar_img_slide=array();   //список новых имен файлов           
            foreach ( $model->img_slide as $file) {
                
                  $name = $nameid['id'].'_'. $time.'_'.$model->name.'.'.$file->extension;
                  $ar_img_slide[]=$name;                 
                    
                
           //       echo $name;
             //   $file->saveAs(Yii::getAlias('@uploads'). $file->baseName . '.' . $file->extension);
                 // $file->saveAs($path. $file->baseName . '.' . $file->extension);
                 $file->saveAs($path.$name);
                 
                  $time++;
            }
              $str_slide = implode("; ", $ar_img_slide);//формирует строку из массива.
              
            //  echo  $ar_img_slide[0];
            $id='id='.$nameid['id'];
          //  echo $id;
            
              $str_id_category3=implode("; ", $model->id_category3);
            //  echo $str_id_category3;
            
              $model-> updateCreate($id, $ar_img_slide[0], $str_clothers, $str_slide );
       
            return $this->actionView( $nameid['id']);
        
            
        } else {
            $category1=Category1::find()->all();
            $category2=Category2::find()->all();
            $category3=Category3::find()->all();
            $brands=Brands::find()->all();
            return $this->render('create', [
                'model' => $model,  'category1' => $category1,  'category2' => $category2,  'category3' => $category3,  'brands' => $brands, 
            ]);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
