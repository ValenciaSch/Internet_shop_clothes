<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Goods;
/**
 * ContactForm is the model behind the contact form.
 */
class GoodsForm extends Model
{   public $id;
    public $listColor;
    public $listSize;
    public $quantity;   

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [       
                     [ ['quantity'], 'integer'],     
                     [['listColor', 'listSize', 'quantity'], 'required','message' => 'Поле должно быть обязательно заполнено!'],
                     ['listSize', 'required','message' => 'Поле должно быть обязательно заполнено!'],
        ];
    }

public function attributeLabels()
    {
        return [
            'listColor' => 'Цвет',
            'listSize' => 'Размер',
            'quantity' => 'Количество товара'           
        ];
    }
    
    /* ===Добавление в корзину=== */
public function addtoBasket($goods_id ){
    
    $session = Yii::$app->session;
    // открываем сессию
     $session->open();
    
   /* $session['basket'] = [
    'number' => 5,
    'lifetime' => 3600,
];
    */
    
    
  /*  if(isset($_SESSION['basket'][$goods_id][$this->listColor][$this->listSize])){
        
        // если в массиве basket уже есть добавляемый товар  
        $_SESSION['basket'][$goods_id][$this->listColor][$this->listSize]['qty'] += $this->quantity;
        
        return $_SESSION['basket'];
    }else{
        // если товар кладется в корзину впервые
     //  $_SESSION['basket'][$goods_id][$this->listColor][$this->listSize]['qty'] = $this->quantity;
      */
      
      if(isset($_SESSION['basket']))
      {
        for($i=0; $i<count($_SESSION['basket'] ); $i++)        
         { 
         //   echo $basket['id'].'  '.$basket['qty'] ;  
             if($_SESSION['basket'][$i]['id']==$goods_id&&$_SESSION['basket'][$i]['color']==$this->listColor&&$_SESSION['basket'][$i]['size']==$this->listSize) 
             {
                $_SESSION['basket'][$i]['qty']+=$this->quantity;
                $this-> total_sum_quantity ();
                return ;
              }
         }
      }
      
       $this-> add_new_Goods ($goods_id);
       $this-> total_sum_quantity ();
    
    //   $_SESSION['total_quantity']+= (int)$_SESSION['total_quantity']+(int)$this->quantity;
        return $_SESSION['basket'];
   // }
}
/* ===Добавление в корзину=== */


/*====Добовление нового товара и сумму  в корзину=====*/
public function add_new_Goods ($goods_id){
     $session = Yii::$app->session;
    // открываем сессию
     $session->open();
     //поиск товара по $id
      $quantityGoods = Goods::findOne($goods_id);
   //  $quantityGoods->id
   
      $_SESSION['basket'][]=array(
       'id'=> $goods_id,
        'color' => $this->listColor,
        'size' => $this->listSize,
        'qty'  => $this->quantity,
        'price'=>$quantityGoods->price
     )  ;
     $_SESSION['total_quantity']=$time;
}




/* ===Считаем количество и сумму товара в корзине===*/
  public function total_sum_quantity(){
    $total_sum = 0;
    $total_quantity=0;
  
     foreach ($_SESSION['basket'] as  $basket){ 
           $total_sum += $basket['qty']*$basket['price'];
           $total_quantity+=$basket['qty'];
    }
     $_SESSION['total_quantity']=$total_quantity ;
      $_SESSION['total_sum']=$total_sum;
    
   // return $total_sum;
}

/*=====Пересчет колличества товара в корзине и его суммы=======*/
  public function re_count($id, $color, $size, $qty)
  {
    
        for($i=0; $i<count($_SESSION['basket'] ); $i++)        
         { 
          
             if($_SESSION['basket'][$i]['id']==$id&&$_SESSION['basket'][$i]['color']==$color&&$_SESSION['basket'][$i]['size']==$size) 
             {
                    if($_SESSION['basket'][$i]['id']!==$qty){
                            $_SESSION['basket'][$i]['qty']=$qty;
                            $this-> total_sum_quantity ();
                            return ;
                    }
              }
         } 
         
      
    
  } 
  
      /*====Удаление товара из корзины=====*/
    public function delete_goods($id, $color, $size)
      {
        
            for($i=0; $i<=count($_SESSION['basket'] ); $i++)        
             { 
              
                 if($_SESSION['basket'][$i]['id']==$id&&$_SESSION['basket'][$i]['color']==$color&&$_SESSION['basket'][$i]['size']==$size) 
                 {
                        unset($_SESSION['basket'][$i]);
                                return ;
                       
                  }
             } 
     }
 
 
}
