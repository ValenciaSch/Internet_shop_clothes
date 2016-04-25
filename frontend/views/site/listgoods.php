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

use yii\widgets\Pjax;

use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

use frontend\models\Category3;

use \yii\widgets\LinkPager;
use \yii\data\Pagination;

$this->title = 'Cale';
?>



<?php
$script = <<< JS
$(document).ready(function() {
  $('input').click(function()   {
alert("Индекс:  " );
});
 
    
   $('input[type=checkbox]').click(
    setInterval(function(){
             $("#refreshButtonColor").click();
             $("#refreshButtonSize").click();
         }, 3000);
    );
});
JS;
$this->registerJs($script);
?>

<?php// Pjax::begin(); ?>




 <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><?=Html::a('Главная',Url::to(['/../web/']));?></li>                        
                         <li> <?=Html::a($nameCategory1->name.": ".$nameCategory2->name,Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => $id_category1, 'id_category2' =>$id_category2,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                         </li>
                        <?php 
                    
                        $nameCategory33=Category3::find()->where(['id' => $id_category3])->one(); 
                                     
                        if ($nameCategory33->name!=null)
                        {                        
                           echo  '<li class="active">'.$nameCategory33->name.'</li>';                                              
                        }
                       
                        ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    
                   <br />
                    <div class="filter-bar">  <!---->                 
                      
                        <div class="half">
                        
                                  <?php
                                    $form = ActiveForm::begin();
                                    
                               echo   '<label for="sort-by">Сортировать по: </label>';
                               echo  '<select name="sort-by" id="sort-by" class="chosen-select">';
                               echo   ' <option value="default">....</option>';
                               echo   ' <option value="price-asc">Возрастанию цены</option>';
                               echo   ' <option value="price-desc">Убыванию  цены</option> ';                                   
                               echo  '</select>';
                                
                                
                              echo Html::input(
                                    'type: text',
                                    'id_category1',
                                    $id_category1 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                            echo Html::input(
                                    'type: text',
                                    'id_category2',
                                     $id_category2 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'id_category3',
                                     $id_category3 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                              echo  Html::submitButton('Отправить',['class' => 'hidden', 'id' => 'refreshButtonSort']); //,
                                ActiveForm::end();
                              ?>  
                                
                           
                        </div>
                        <div  >
                            <div class="range-wrap custom-range pull-left">
                             <?php  $form = ActiveForm::begin();?>                                            
                                <label for="range-price">Цена: </label>
                              <?php   if ($price1==180&&$price2==300) {?>
                                <input id="range-price" type="text" class="col-sm-8 col-md-7 col-xs-6 range-slider" name="price"  value="" data-slider-value="[180,3000]" />
                             <?php  } else
                              { 
                                echo '<input id="range-price" type="text" class="col-sm-8 col-md-7 col-xs-6 range-slider" name="price"  value="" data-slider-value="['.$price1.','.$price2.']" />';
                             };                             
                               echo Html::input(
                                    'type: text',
                                    'id_category1',
                                    $id_category1 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                            echo Html::input(
                                    'type: text',
                                    'id_category2',
                                     $id_category2 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'id_category3',
                                     $id_category3 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                              echo  Html::submitButton('Отправить',['class' => 'hidden', 'id' => 'refreshButtonPrice']); //,
                                ActiveForm::end();
                              ?>
                              
                          </div>
                          <!-- <button class="btn btn-default btn-sm custom-button pull-right">Очистить</button>-->
                           <?php  $form = ActiveForm::begin();
                           
                            echo Html::input(
                                    'type: text',
                                    'id_category1',
                                    $id_category1 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                            echo Html::input(
                                    'type: text',
                                    'id_category2',
                                     $id_category2 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                                echo Html::input(
                                    'type: text',
                                    'id_category3',
                                     $id_category3 ,
                                    [
                                         'class' => 'hidden',
                                        
                                    ]
                                );
                              echo  Html::submitButton('Очистить',['class' => 'btn btn-default btn-sm custom-button pull-right']); //,
                                ActiveForm::end();
                              ?>
                        </div>
                    </div>

                    <div class="main-bottom">
                      
                        <div style="float:right;">
                          
                         <!-- постраничного разделение данных в элемент нумерации страниц:-->
                       <?= LinkPager::widget(['pagination' => $pagination]) ?>
                          
                         
                        </div>
                    </div>
                    <div class="row">
                  
                    <?php foreach ($goods as $good) {?>
                     <?php //echo "/../advanced_3/frontend/web/img_goods/";
                            //echo $nameCategory1->name."/".$nameCategory2->name ."/".$good[img];
                            ?>
                            
                        <article class="category-article category-grid col-sm-4">
                            <figure>
                            <?php if ($good[sale]==1) echo ' <div class="corner-sign red">Sale</div>'; ?>
                            <?php if ($good[new1]==1) echo ' <div class="corner-sign">New</div>'; ?>
                              <?php if ($good[hits]==1) echo ' <div class="corner-sign">Hit</div>'; ?>
                              <img src="/../advanced_3/frontend/web/img_goods/<?php echo $nameCategory1->name."/".$good[img];?>" alt=""/>
                             <!-- <a href="/advanced_3/frontend/web/site/goods?id=<?=$good[id]?>">ccc</a> -->
                                <div class="figure-overlay">
                                   <!-- <div class="rating-line">
                                        <div class="stars-white" data-number="5" data-score="4"></div>
                                    </div>-->
                                    <div class="excerpt">
                                       <br />  <br />  <br /> 
                                        <p>
                                         <?=$good[short_description]?>  
                                        </p>
                                    </div>
                                    <button class="btn btn-default custom-button"> <?=Html::a('Подробно',Url::to(['site/goods', 'id' =>$good[id], ]));?></button>
                                  
                                    
                                </div>
                            </figure>
                            <div class="figcaption">
                                <?php   $slider=explode("; ", $good[img_clothers]);                          
                                foreach ($slider as $img_sl) {                           
                                ?>
                               <img src="/../advanced_3/frontend/web/img_goods/<?php echo $nameCategory1->name."/".$img_sl?>" alt=""  width="30" height="40" />
                            <?php } ?>    
                            </div>
                            <div class="text">
                                <h2><?=Html::a($good[name],Url::to(['site/goods', 'id' =>$good[id]]));?>   </h2>
                                <div class="price">
                                    <span class="new-price"><?=$good[price]?> грн.</span>
                                </div>
                            </div>
                        </article>
                        
                     <?php }?>  
                  </div>
                    <div class="main-bottom">
                      
                        <div class="half text-right">
                             <!-- постраничного разделение данных в элемент нумерации страниц:-->
                             <?= LinkPager::widget(['pagination' => $pagination]) ?>
                        </div>
                    </div>

                </div>
                
                
                <aside class="col-sm-3">
                    <div class="widget">
                        <div class="widget-title">
                           <br />
                            <h2>Категории</h2>
                        </div>
                        <div class="widget-content">
                            <div class="accordion">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    <?=$nameCategory1->name?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <ul>
                                                   
                                                    <li>
                                                      
                                                        <?=Html::a($nameCategory2->name,Url::to(['site/listgoods']), [ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => $id_category1, 'id_category2' =>$id_category2,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                                        
                                                        <ul>
                                                            <?
                                                            if (isset($nameCategory3))                                                              
                                                            { foreach ($nameCategory3 as $catygory3)
                                                               { echo "<li>";
                                                               
                                                                  echo Html::a($catygory3->name,Url::to(['site/listgoods']), [ 'data' => ['method' => 'post',
                                                                                                               'params' => [ 'id_category1' => $id_category1, 'id_category2' =>$id_category2, 'id_category3' =>$catygory3->id ]
                                                                                                            ]
                                                                                                        ]);
                                                                echo "</li>";
                                                                }
                                                            }
                                                           ?>   
                                                           
                                                        </ul>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                 
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-content">
                            <div class="accordion accordion-second">
                                <div class="panel-group" id="accordion-color">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-color" href="#collapse-color">
                                                    <span class="border">Цвет</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-color" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                              <?php 
                                                    $form = ActiveForm::begin();
                                                   
                                                   echo Html::input(
                                                            'type: text',
                                                            'id_category1',
                                                            $id_category1 ,
                                                            [
                                                                 'class' => 'hidden',
                                                                
                                                            ]
                                                        );
                                                    echo Html::input(
                                                            'type: text',
                                                            'id_category2',
                                                             $id_category2 ,
                                                            [
                                                                 'class' => 'hidden',
                                                                
                                                            ]
                                                        );
                                                        echo Html::input(
                                                            'type: text',
                                                            'id_category3',
                                                             $id_category3 ,
                                                            [
                                                                 'class' => 'hidden',
                                                                
                                                            ]
                                                        );                                                  
                                                   
                                                   // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                                $items = ArrayHelper::map($color,'id','name');
                                                   
                                               //   $color_list=Html::listData($color,'id','name');
                                                
                                            //----------****------------
                                            //   $options = ArrayHelper::map($color, 'id', 'name');
                                              //  $event->m_requirement = $selectors;
                                                
                                             echo  $form->field($modelColor, 'checkboxListColor')->checkboxList($items,['id'=>'color'] );
                                             
                                        ?>  
                                            
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-content">
                            <div class="accordion accordion-second">
                                <div class="panel-group" id="accordion-size">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-size" href="#collapse-size">
                                                    <span class="border">Размер</span>
                                                </a>
                                            </h4>
                                        </div>  
                                        <div id="collapse-size" class="panel-collapse collapse">
                                            <div class="panel-body">
                                            
                                             <div class="funkyradio">
                                                  <div class="funkyradio-default">
                                             <?php  
                                                  // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                                $items1 = ArrayHelper::map($size,'id','name');
                                                
                                                echo  $form->field($modelColor, 'checkboxListSize')->checkboxList($items1,['id'=>'size']);
                                              
                                               echo  Html::submitButton('Size_Color',['class' => 'hidden',  'id' => 'refreshButtonSize_Color']); //'class' => 'hidden',
                                                   ActiveForm::end();                               
                                            
                                             
                                        ?>  </div>
                                        </div>
                                                                                              
                                            </div>
                                        </div>
                                    </div>
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
