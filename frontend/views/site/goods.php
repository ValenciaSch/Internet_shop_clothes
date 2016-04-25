<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;


use kartik\select2\Select2;
use kartik\widgets;

use yii\widgets\Pjax;

$this->title = 'Cale';
$this->params['breadcrumbs'][] = $this->title;

if ($model=='Такого товара нету')
{
    
    echo "<h1> Такого товара нету </h1>";
}
else {   
    ?>
    
    
 <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vigo Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" type="image/png" href="/../advanced_3/frontend/web/img/favicon.png">

      
    </head>
    <body>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327963893924647";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

   

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                         <li><?=Html::a('Главная',Url::to(['/../web/']));?></li>                        
                         <li> <?=Html::a($model[0]['nameCategory1'].": ".$model[0]['nameCategory2'],Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => $model[0]['id_category1'], 'id_category2' =>$model[0]['id_category2'],'id_category3' =>$model[0]['id_category3'] ]
                                                                                                        ]
                                                                                                    ])?>
                         </li>
                        <li class="active"><?=$model[0]['name']?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id='main'>
        <div class="container">
        
       
        
            <div class="row">
                <div class="col-sm-6">
                    <div class="product-slider-small">
                        <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                        
                          <?php
                          $slider=explode("; ", $model[0]['img_slide']);
                          
                           foreach ($slider as $img_sl) {                           
                            ?>
                            <li><a href="#" rel='/../advanced_3/frontend/web/img_goods/<?php echo $model[0]['nameCategory1']."/".$img_sl;?>'><img src="/../advanced_3/frontend/web/img_goods/<?php echo $model[0]['nameCategory1']."/".$img_sl;?>" alt=""/></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="product-image-big" style="background-image: url('/../advanced_3/frontend/web/img_goods/<?php echo $model[0]['nameCategory1']."/".$model[0]['img'];?>');"></div>
                </div>
                <div class="col-sm-6">
                    <div class="product-details">
                        <h1>  <?=$model[0]['name']?> </h1>
                        <hr />
                       
                        <hr />
                        <br />  
                        <br />
                        <div class="details">                          
                            <span class="detail-line"><strong>Код товара:</strong> <?=$model[0]['id']?></span>
                            <?php if ($model[0]['id_brands']!=0) echo '<span class="detail-line"><strong>Бренд: </strong>'. $model[0]['nameBrands'].'</span>';    ?>                       
                        </div>
                         
                         <div class="description">
                                  <?=$model[0]['short_description']?>                              
                         </div>
                        <div class="buttons">
                            <div class="row">
                                <div class="col-sm-6">
                                   
                                   <?php
                                    $listColor1=explode("; ", $model[0]['id_color']);
                                    $listImg1=explode("; ", $model[0]['img_clothers']);
                                    $listSize1=explode("; ", $model[0]['id_size']);
                                    
                                     echo ' <div>';
                                    foreach( $listImg1 as $listImg)
                                    {  
                                        echo '<img src="/../advanced_3/frontend/web/img_goods/'.$model[0]['nameCategory1']."/".$listImg.'"  width="30" height="40"  alt=""/> ';
                                        
                                    }; 
                                    echo ' </div>';
                                                                   
                            $form = ActiveForm::begin();
                           
                          echo '<div class="col-sm-6">';
                            $params = [
                                'prompt' => 'Выберите цвет...',
                                'class' => 'btn btn-default' 
                            ];
                             echo $form->field($modelGood, 'listColor')->dropDownList($listColor1, $params);
                            
                            ?>
     
                                  </div>  
                              </div>
                                <div class="col-sm-4">
                                   
                                    <?php  $params1 = [
                                        'prompt' => 'Выберите размер...',                                       
                                        'class' => 'btn btn-default' ];
                                     echo $form->field($modelGood, 'listSize')->dropDownList($listSize1, $params1);
                           
                                        
                                        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                       // $items = ArrayHelper::map($geography,'img','color');
                                  ?>
                                  
                                   
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                    
                                     <?
                                       echo $form->field($modelGood, 'quantity' )->widget(MaskedInput::className(),[                                                                                                        
                                                                                                         'mask' => '9',
                                                                                                         'clientOptions' => ['repeat' => 10, 'greedy' => false], 
                                                                                                         'options' => ['class' => 'btn btn-default'], 
                                                                                                         'value' => '1',          
                                                                                              ]);
                                                                                           
                                       /*  echo   $form->field($model, 'quantity')->input('number', ['min'=>1, 'max'=>5,  'value' => '1']) ?>                                                    
                                                                                              
                                                                                                            
                                         */  
                                          ?>
 
                                       <!-- <input type="text" class="form-control" value="1" placeholder="Quantity" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            
                                        </span>
                                        -->
                                                                              
                                    </div>                           
                              
                                </div>
                            </div>
                        </div>
                        <div class="price-line">
                            <div class="price">Цена: <?=$model[0]['price']?> грн.</div>
                            
                           <!-- <button class="btn btn-default custom-button custom-button-inverted">Добавить в корзину</button>-->
                            
                             <? 
                                 echo Html::submitButton('Добавить в корзину',['class' => 'btn btn-default custom-button custom-button-inverted']);
                            
                            
                            if (!empty($addGoods)) 
                            {
                                echo "<h1 style= 'color:red'>Товар добавлен в корзину</h1>";
                            } 
                            
                            
                            
                            ?>   
                            <div class="small-buttons">
                               
                            </div> 
                            
                            
                            <?php   ActiveForm::end();
                                        ?>
                        </div>
                        <hr />
                        <div class="share-line">
                            <span class="title">  </span>
                          <h1> </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="product-collapse">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Подробно
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            <?=$model[0]['full_description']?> 
                                        </p>
                                    </div>
                                </div>
                            </div>                                                    
                            
                        </div>
                    </div>
                </div> 
                <aside class="col-sm-6">
                    <div class="widget">
                        <div class="widget-title">
                            <h2>Отзывы</h2>
                            <div class="slider-controls latest-comments-controls">
                                <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="widget-content">                           
                          
                            <div class="flexslider comments-slider">
                                <ul class="slides">
                                  <?php 
                                   if (!empty($reviews)){
                                   for($i=0; $i<=count($reviews); $i+=2)
                                   {
                                   ?>
                                    <li>
                                        <div class="comments-widget">
                                           
                                           
                                            <div class="comment-box">
                                                     <div class="avatar-line">                                                        
                                                        <div >                                                          
                                                           <h2> <?php if (!empty ($reviews[$i]['nameUser'])) echo $reviews[$i]['nameUser'];
                                                                      else  echo  $reviews[$i]['name_user'];
                                                                ?>
                                                           
                                                           </h2> 
                                                           <p> <?=$reviews[$i]['message']?> </p> 
                                                           <div align="right"> <?=$reviews[$i]['date1']?></div> 
                                                        </div>
                                                   </div> 
                                                   
                                            </div>
                                            <?php if (($i+1)<count($reviews))
                                             {?>
                                            <div class="comment-box">
                                                     <div class="avatar-line">                                                        
                                                        <div >                                                          
                                                           <h2><?php if (!empty ($reviews[$i+1]['nameUser'])) echo $reviews[$i+1]['nameUser'];
                                                                      else  echo  $reviews[$i+1]['name_user'];
                                                                ?>
                                                           </h2> 
                                                           <p> <?=$reviews[$i+1]['message']?> </p> 
                                                           <div align="right"> <?=$reviews[$i+1]['date1']?></div> 
                                                        </div>
                                                   </div>                                                    
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </li>
                                    
                                    <?php
                                     } 
                                    }  ?>
                                   
                                </ul>
                            </div>
                         
                    
                          
                          
                         
                            <div class="row">
                            <div class="widget-title">
                            
                               <h2>Добавить отзыв</h2>
                               </div>
                              <div class="col-sm-6">
                            <?php
                             $form = ActiveForm::begin();
                                   
                                  if (Yii::$app->user->isGuest)
                                  { echo $form->field($modelReviews, 'name_user' )->label('Имя*:');  
                                  }
                                    
                             
                                 echo $form->field($modelReviews, 'message' )->textarea(array('rows'=>2,'cols'=>5))->label('Отзыв*:');
                               
                               
                               echo  Html::submitButton('Добавить',['class' => 'btn btn-default custom-button']); //,
                              ActiveForm::end();
                              ?>  
                           
                             
                            </div>
                          </div>
                       
                          
                        </div>
                    </div>
                </aside>
            </div>
           
            
        </div>
    </section>

  
    </body>
</html>
 
  
  
  
    
    
    
    
<?php } ?>