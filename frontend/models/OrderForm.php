<?php
namespace frontend\models;


use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class OrderForm extends Model
{
  
    public $lastname;
    public $firstname;
    public $patronymic;  
    public $telephone;
    public $delivery;
    public $addressDelivery;
    public $payment;
    public $comments;
    
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
           [['lastname','firstname','patronymic','telephone','delivery','addressDelivery','payment', 'comments'], 'filter', 'filter' => 'trim'],
           [['lastname','firstname','patronymic','telephone'], 'required', 'message' => 'Поле должно быть обязательно заполнено!'],
           [['delivery'], 'required', 'message' => '>>>>>>Выберите способ доставки!<<<<<<<'],  
            [['payment'], 'required', 'message' => '>>>>>>Выберите способ оплаты!<<<<<<<'],  
                             
            [['lastname','firstname','patronymic'], 'string', 'min' => 2, 'max' => 255, 'message' => '>>>>>>Поле должно содержать больше 2 символов!<<<<<<<'],
            
            
            // установим "comments" и "addressDelivery" как NULL, если они пустые
            [['comments', 'addressDelivery' ], 'default'],
            
          //  ['firstname', 'filter', 'filter' => 'trim'],
           // ['firstname', 'required'],            
           // ['firstname', 'string', 'min' => 2, 'max' => 255],
            
        //    ['patronymic', 'filter', 'filter' => 'trim'],
           // ['patronymic', 'required'],            
          //  ['patronymic', 'string', 'min' => 2, 'max' => 255],
            
      
            
              
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'patronymic' => 'Отчество',          
            'telephone' => 'Телефон',
           
        ];
    }
    
     public function save()
    {
          
      $session = Yii::$app->session;
    // открываем сессию
     $session->open();
      
      $userid=User1::find()->where(['lastname' =>$this->lastname,'firstname' =>$this->firstname, 'patronymic' =>$this->patronymic, 'telephone' =>$this->telephone  ])->one();
    
      if (!isset($userid->id)){
        
        $user = new User1();
        $user->lastname = $this->lastname;
        $user->firstname = $this->firstname;
        $user->patronymic = $this->patronymic;
        $user->telephone = $this->telephone;  
        
        $user->save() ? $user : null;
        $userid=User1::find()->where(['lastname' =>$this->lastname,'firstname' =>$this->firstname, 'patronymic' =>$this->patronymic, 'telephone' =>$this->telephone  ])->one();
        }
        
             if (isset($userid->id)){           
        
              $orderid=Order::find()->where(['id_user' =>$userid->id,'id_delivery' =>$this->delivery ,'address_delivery' =>$this->addressDelivery, 'id_payment' =>$this->payment, 'total_sum' =>  $_SESSION['total_sum']])->one();
               if (!isset($orderid->id)){
             //   echo $orderid->id.'--orderid->id; </br>';
               /* $order=new Order ();
                $order->id_user = $userid->id;
                $order->id_delivery = $model->delivery;
                $order->id_payment = $model->payment;
                $order->total_sum = $_SESSION['total_sum'];  
             
                */ 
                
             //   if (!isset($model->comments))   $model->comments='null';   echo  $model->comments.'comments </br>  ';
                
               if (($this->delivery)==2&&isset($this->addressDelivery)){ return false;}                
              //  else  {return false;} 
                 // $order->save() ? $order : null;
                
               
                
                // INSERT (table name, column values)
                $db=Yii::$app->db;
                $db->createCommand()->insert('Order', [
                    'id_user' => $userid->id,
                    'id_delivery' => $this->delivery,
                    'address_delivery' => $this->addressDelivery,
                    'id_payment' => $this->payment,
                    'comments' => $this->comments,
                    'total_sum' => $_SESSION['total_sum'],
                ])->execute();
                }
               
                $orderid=Order::find()->where(['id_user' =>$userid->id,'id_delivery' =>$this->delivery ,'address_delivery' =>$this->addressDelivery, 'id_payment' =>$this->payment, 'total_sum' =>  $_SESSION['total_sum']])->one();
            
              
              }   
    
           
             
              if(isset($orderid)){
                
                    foreach($_SESSION['basket'] as $basket){  
                                    $goods=Goods::find()->where(['id' =>$basket['id']])->one();
                                   
                                    $listColor1=explode("; ", $goods->id_color);                                              
                                    $listSize1=explode("; ", $goods->id_size);   
                                     
                                     
                                    $db=Yii::$app->db;
                                    $db->createCommand()->insert('Order_goods', [
                                        'id_order' => $orderid->id,
                                        'id_goods' => $goods->id,
                                        'color' => $listColor1[$basket['color']],
                                        'size' => $listSize1[$basket['size']],
                                        'quantity' =>$basket['qty'],
                                        'price' => $goods->price,
                                        'sum' => $goods->price*$basket['qty'],
                                    ])->execute();  
                           }
                           
                        session_destroy();
                        $_SESSION['total_quantity']=0;
                           return true;
               }
           
            return false;
            
    }
    
    
    
    
}