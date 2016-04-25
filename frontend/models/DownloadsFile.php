<?php

namespace frontend\models;

use Yii;
namespace frontend\models;


use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class DownloadsFile extends Model{

   public $file_txt;
   
    public function rules()
    {
        return [
           [['file_txt'], 'file', 'extensions' => 'txt'],
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
                     
                   $ar = array ();
                   foreach ($_SESSION['basket'] as  $basket){         
                      $ar[]=$basket['id'];
                      
                    }; 
                    $goods1=Goods::find()->where(['id' =>$ar ])->all();
                    
                    
                     foreach($_SESSION['basket'] as $basket){
                     
                            foreach ($goods1 as $goods) { 
                                 
                                 if ($goods->id==$basket['id'])         
                                {    
                                    $listColor1=explode("; ", $goods->id_color);                                              
                                    $listSize1=explode("; ", $goods->id_size);   
                                     
                                     
                                    $db=Yii::$app->db;
                                    $db->createCommand()->insert('OrderGoods', [
                                        'id_order' => $orderid,
                                        'id_goods' => $goods->id,
                                        'color' => $listColor1[$basket['color']],
                                        'size' => $listSize1[$basket['size']],
                                        'quantity' =>$basket['qty'],
                                        'price' => $goods->price,
                                        'sum' => $goods->price*$basket['qty'],
                                    ])->execute();    
                                }
                           }
                           }
                           return true;
               }
           
            return false;
            
    }
    
    
    
}
