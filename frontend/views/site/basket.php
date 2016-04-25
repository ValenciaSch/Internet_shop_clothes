<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Интернет магазин</title>

</head>
<body> 

<?php

/* @var $this \yii\web\View */
/* @var $content string */



use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;

?>


 <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><?=Html::a('Главная',Url::to(['/../web/']));?></li>                        
                         <li> Корзина  </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


 <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                
                 <h1> Корзина  </h1>
                    <div class="table-responsive shopping-cart">
                    
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="40%"><div class="title-wrap">Название товара</div></th>
                                <th width="14%"><div class="title-wrap">Код</div></th>
                                <th width="14%"><div class="title-wrap">Цена </div></th>
                                <th width="14%"><div class="title-wrap">Количество</div></th>
                                <th width="14%"><div class="title-wrap">Общая сумма</div></th>
                                <th width="3%"><div class="title-wrap"><i class="glyphicon glyphicon-remove"></i></div></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                              <?php
                   
                  
                if(!empty($_SESSION['basket']))
                 {  
                   foreach($_SESSION['basket'] as $basket){
                        //  echo $basket['id']." bbb  <br />\n";
                            foreach ($model as $goods) { 
                                
                                 if ($goods['id']==$basket['id'])         
                                {//echo $goods->id." yyyy <br />\n";
                               // echo $goods->id_color." yyyy <br />\n";
                               
                                                $listColor1=explode("; ", $goods['id_color']);
                                                $listImg1=explode("; ", $goods['img_clothers']);
                                                $listSize1=explode("; ", $goods['id_size']);
                               ?> 
                            
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <figure>
                                            <img src="/../advanced_3/frontend/web/img_goods/<?php echo $goods['nameCategory1']."/".$listImg1[$basket['color']];?>" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <h2><a href="#"><?=$goods['name']?></a></h2>
                                            <div class="details">
                                                <span class="detail-line">
                                               
                                                    <strong>Цвет: </strong> <?=$listColor1[$basket['color']]?>
                                                </span>
                                                <span class="detail-line">
                                                    <strong>Размер: </strong> <?=$listSize1[$basket['size']]?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="product-code"><?=$goods['id']?></div></td>
                                <td><div class="price"><?=$goods['price']?></div></td>
                                <td>
                                    <div class="quantity">
                                        <div class="input-group">
                                           <?php                                           
                                           
                                        /* ActiveForm::begin(
                                    [
                                        'action' => ['basket11'],
                                        'method' => 'post',
                                        'options' => [
                                            'class' => 'navbar-form navbar-right'
                                        ]
                                    ]
                                );//form-control bfh-number
                              //  echo '<div class="input-group input-group-sm">'; 
                              
                              // Html::button('Обновить!', ['class' => 'hidden', 'id' => 'refreshButton']) ;
                             //  echo $basket['color'];
                            //   echo    Html::input('type: text', 'id', $goods->id, ['class' => 'form-control' ] );
                            //    Html::input('type: text', 'color', $basket['color'], ['class' => 'form-control' ] );
                            //    Html::input('type: text', 'size', $basket['size'], ['class' => 'form-control' ] );*/
                                 
                                   /*  $form = ActiveForm::begin();
                                 
                                echo  $form->field($modelGood, 'id', [
                                                                    'inputOptions' => [
                                                                     'value' => $goods->id,
                                                                        'placeholder' => $goods->id
                                                                    ],
                                                                ]); 
                                 $form->field($modelGood, 'listColor'); 
                                 $form->field($modelGood, 'listSize');
                                 echo $form->field($modelGood, 'quantity', [
                                                                    'inputOptions' => [                                                                    
                                                                        'placeholder' => $basket['qty']
                                                                    ],
                                                                ] )->widget(MaskedInput::className(),[                                                                                                        
                                                                                                         'mask' => '9',
                                                                                                         'clientOptions' => ['repeat' => 10, 'greedy' => false], 
                                                                                                         'options' => ['class' => 'btn btn-default'], 
                                                                                                                  
                                                                                             ])->label(false);;
                                 */ 
                                ActiveForm::begin(
                                    [
                                        'action' => ['basket'],
                                        'method' => 'post' ,
                                         'options' => [
                                            'class' => 'navbar-form navbar-right'
                                        ]                                     
                                    ]
                                );
                                echo '<div class="input-group input-group-sm">';
                                echo Html::input(
                                    'type: text',
                                    'id',
                                    $basket['id'] ,
                                    [                                       
                                        'class' => 'hidden',
                                        
                                    ]
                                );
                                
                                
                                 echo Html::input(
                                    'type: text',
                                    'color',
                                    $basket['color'] ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'size',
                                    $basket['size'] ,
                                    [
                                         'class' => 'hidden',
                                       
                                    ]
                                );
                                //onmouseout="addId_goods()
                                
                              echo    '  <span class="input-group-btn"> ';                  
                    
                           ?> 
                           
                        <input type="number" name="qty"  class="btn btn-default" style="height:40px;  font-size: 18px;" pattern="[0-9]{,3}" onmouseout="addId_goods()"   min=1  step=1 value="<?=$basket['qty']?>" id="<?=$basket['id']?>"/>
                           
                            <?php    echo '</span>';
                            $tieam="submit".$basket['id'];                          
                             echo Html::submitButton('Добавить в корзину',['class' => 'hidden', id => $tieam]);
                            ActiveForm::end();    ?>
                                          
                                
                                
                                   
                                          
                                          
                                          
                                         <!--  <input type="text" class="form-control" value="1" placeholder="Quantity" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </span> -->
                                        </div>
                                    </div>
                                </td>
                                <td><div class="subtotal"><?php echo $basket['qty']*$goods['price'];?> </div></td>
                               
                                <td>
                                
                             <!--   <button class="btn btn-default custom-button"><i class="glyphicon glyphicon-remove"></i>   </button>-->
                               
                            <?php  
                            //удаление товара с корзины
                               ActiveForm::begin(
                                    [
                                        'action' => ['del_basket'],
                                        'method' => 'post',
                                       
                                    ]
                                );
                              
                                echo Html::input(
                                    'type: text',
                                    'id',
                                    $basket['id'] ,
                                    [                                       
                                        'class' => 'hidden',
                                        
                                    ]
                                );
                                
                                
                                 echo Html::input(
                                    'type: text',
                                    'color',
                                    $basket['color'] ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'size',
                                    $basket['size'] ,
                                    [
                                         'class' => 'hidden',
                                       
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'quantity',
                                    $basket[' qty'] ,
                                    [
                                         'class' => 'hidden',
                                       
                                    ]
                                );
                                echo Html::submitButton('<i class="glyphicon glyphicon-remove"></i> ',['class' => 'btn btn-default custom-button']);
                            ActiveForm::end();    ?>
                               
                                </td>
                            </tr>
                            
                            <?php }
                                }
                   }
                   
                  }  ?>
                            
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td></td>
                                <td> <div class="price"> К оплате:</div> </td>
                                <td> <div class="subtotal"> <?=$_SESSION['total_sum']?></div> </td>
                            </tr>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            
           
            
            
            <div class="clearfix"></div>
            <div class="row">
               <div class="col-sm-3 margin-top">
                <div class="col-sm-6 margin-top">  
                    <?php 
                    
                    if ($_SESSION['total_sum']!=0) echo   Html::a('Оформить заказ',Url::to(['site/order']),['class' =>'btn btn-default btn-lg custom-button pull-left', ]);
                    ?>
                    <div class="spacer"></div>
                </div>
            </div>  
            
        </div>
    </section>
    
    
 
    
</body>


 

  <script>
  $(document).ready(function(){
         
      
  });
  
 //добавление товара в корзину
 
 function addId_goods ()
 {
   // var id =$(this).attr("id");
    id_g = event.target.id;
//   alert ("#submit"+id_g);
    
   // alert(event.target.id);
   
   $("#submit"+id_g).click();
  //   alert ("2-"+id_g);
 }
  
  </script>


</html>
