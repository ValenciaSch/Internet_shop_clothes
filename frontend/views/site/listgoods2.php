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

<?php Pjax::begin(); ?>
    <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <div class="filter-bar">
                        <div class="half">
                            <button class="btn btn-default btn-sm custom-button pull-left">Compare</button>
                            <div class="sort-wrap pull-right">
                                <label for="sort-by">Sort by: </label>
                                <select name="sort-by" id="sort-by" class="chosen-select">
                                    <option value="default">Default</option>
                                    <option value="price-asc">Price Asc</option>
                                    <option value="price-desc">Price Desc</option>
                                    <option value="Size">Size</option>
                                </select>
                            </div>
                        </div>
                        <div class="half">
                            <div class="range-wrap custom-range pull-left">
                          
                             <?php  $form = ActiveForm::begin();?>                                            
                                <label for="range-price">Цена: </label>
                                <input id="range-price" type="text" class="col-sm-8 col-md-7 col-xs-6 range-slider" name="price"  onmouseup="price()" value="" data-slider-value="[180,3000]" />
                             <?php  echo  Html::submitButton('Size',[ 'id' => 'refreshButtonPrice']); //'class' => 'hidden',
                                ActiveForm::end();
                              ?>
                              
                          </div>
                            <button class="btn btn-default btn-sm custom-button pull-right">Clear</button>
                        </div>
                    </div>

                    <div class="main-bottom">
                        <div class="half text-left">
                            <div class="page-counter pull-left">
                                <div class="type-selector">
                                    <span>View as: </span>
                                    <button class="btn btn-default custom-button no-border"><i class="icon-th-large"></i></button>
                                    <button class="btn btn-default custom-button no-border"><i class="icon-align-justify"></i></button>
                                </div>
                            </div>
                            <div class="show-wrap pull-right text-left">
                                <label for="show-no">Sort by: </label>
                                <select name="show-no" id="show-no" class="chosen-select">
                                    <option value="default">15</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </div>
                        <div class="half text-right">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                    <?php foreach ($goods as $good) {?>

                        <article class="category-article category-grid col-sm-4">
                            <figure>
                            <?php if ($good->sale==1) echo ' <div class="corner-sign red">Sale</div>'; ?>
                              <?php if ($good->new==1) echo ' <div class="corner-sign">New</div>'; ?>
                              <img src="/../advanced_3/frontend/web/img_goods/<?=$good->img?>" alt=""/>
                             <!-- <a href="/advanced_3/frontend/web/site/goods?id=<?=$good->id?>">ccc</a> -->
                                <div class="figure-overlay">
                                   <!-- <div class="rating-line">
                                        <div class="stars-white" data-number="5" data-score="4"></div>
                                    </div>-->
                                    <div class="excerpt">
                                       <br />  <br />  <br /> 
                                        <p>
                                         <?=$good->short_description?>  
                                        </p>
                                    </div>
                                    <button class="btn btn-default custom-button"> <?=Html::a('Подробно',Url::to(['site/goods', 'id' =>$good->id, ]));?></button>
                                  
                                    <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                                    <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                                </div>
                            </figure>
                            <div class="figcaption">
                                <?php   $slider=explode("; ", $good->img_clothers);                          
                                foreach ($slider as $img_sl) {                           
                                ?>
                               <img src="/../advanced_3/frontend/web/img_goods/<?=$img_sl?>" alt=""  width="30" height="40" />
                            <?php } ?>    
                            </div>
                            <div class="text">
                                <h2><?=Html::a($good->name,Url::to(['site/goods', 'id' =>$good->id]));?>   </h2>
                                <div class="price">
                                    <span class="new-price"><?=$good->price?> грн.</span>
                                </div>
                            </div>
                        </article>
                        
                     <?php }?>  
                  </div>
         
                   
             
                   
                   
                   
                   

                    <div class="main-bottom">
                        <div class="half text-left">
                            <div class="page-counter pull-left"> Page 1 of 8 total </div>
                            <div class="show-wrap pull-right text-left">
                                <label for="show-no-bottom">Sort by: </label>
                                <select name="show-no" id="show-no-bottom" class="chosen-select">
                                    <option value="default">15</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </div>
                        <div class="half text-right">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <aside class="col-sm-4">
                    <div class="widget">
                        <div class="widget-title">
                            <h2>Categories</h2>
                        </div>
                        <div class="widget-content">
                            <div class="accordion">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    Woman
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li>
                                                        <a href="#">Shoes</a>
                                                        <ul>
                                                            <li><a href="#">Casual shoes</a></li>
                                                            <li><a href="#">Formal shoes</a></li>
                                                            <li><a href="#">Sandals</a></li>
                                                            <li><a href="#">Boots</a></li>
                                                            <li><a href="#">Slippers</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Sportwear</a></li>
                                                    <li><a href="#">Maternity</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    Men
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Sportwear</a></li>
                                                    <li><a href="#">Maternity</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    Girls
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Sportwear</a></li>
                                                    <li><a href="#">Maternity</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Boys
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Sportwear</a></li>
                                                    <li><a href="#">Maternity</a></li>
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
                                                   
                                                   // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                                $items = ArrayHelper::map($color,'id','name');
                                                   
                                               //   $color_list=Html::listData($color,'id','name');
                                                
                                            //----------****------------
                                            //   $options = ArrayHelper::map($color, 'id', 'name');
                                              //  $event->m_requirement = $selectors;
                                                
                                            echo  $form->field($modelColor, 'checkboxListColor')->checkboxList($items);
                                              //  --------------****-------------
                                               
                                          
                                              /*  $color1=[];
                                               for($i=0; $i< sizeof( $color);$i++)
                                                {
                                                    $color1[$i]=$color[$i]->name;
                                                    echo  $color1[$i] ;
                                                };
                                                
                                                 $form->field($modelColor, 'checkboxListColor')->checkboxList( $color1);
                                                */ 
                                                
                                               echo Html::submitButton('Color',['class' => 'hidden', 'id' => 'refreshButtonColor']);
                                                   ActiveForm::end();
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
                                                    <span class="border">Size Filter</span>
                                                </a>
                                            </h4>
                                        </div>  
                                        <div id="collapse-size" class="panel-collapse collapse">
                                            <div class="panel-body">
                                            
                                             <div class="funkyradio">
                                                  <div class="funkyradio-default">
                                             <?php  $form = ActiveForm::begin();
                                                  
                                                   // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                                                $items1 = ArrayHelper::map($size,'id','name');
                                                
                                                echo  $form->field($modelColor, 'checkboxListSize')->checkboxList($items1);                                  
                                          
                                               echo  Html::submitButton('Size',['class' => 'hidden', 'id' => 'refreshButtonSize']);
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
                    <div class="widget">
                        <div class="widget-title">
                            <h2>Featured</h2>
                            <div class="slider-controls featured-slider-controls">
                                <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="featured-slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>

                                                    <img src="img/product01.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Black puplum waist-tie kudu dress</h2>
                                                    <span class="price">$478.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>
                                                    <div class="corner-sign red">-50%</div>
                                                    <img src="img/product02.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>
                                                    <div class="corner-sign">new</div>
                                                    <img src="img/product03.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/product01.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Black puplum waist-tie kudu dress</h2>
                                                    <span class="price">$478.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/product02.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="#">
                                                <figure>
                                                    <img src="img/product03.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-content">
                            <div class="promo-slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="promo-item">
                                            <figure>
                                                <img src="img/promo01.jpg" alt=""/>
                                                <figcaption>
                                                    <h3><a href="#">Our New <br /> Arrivals</a></h3>
                                                    <div class="separator"></div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="promo-item">
                                            <figure>
                                                <img src="img/promo02.jpg" alt=""/>
                                                <figcaption>
                                                    <h3><a href="#">Sale</a></h3>
                                                    <h4>Many items</h4>
                                                    <div class="separator"></div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="promo-item">
                                            <figure>
                                                <img src="img/promo03.jpg" alt=""/>
                                                <figcaption>
                                                    <h3><a href="#"><span class="red">Free</span> <br /> <span class="grey">Shipping</span></a></h3>
                                                    <div class="separator"></div>
                                                    <h4><a href="#"><span class="black"></span>On All Orders!</a></h4>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>


<?php Pjax::end(); ?>

</body>


 

  <script>
  $(document).ready(function(){
         
    
  });
  
 //добавление товара в корзину
 
 function price ()
 {
   // var id =$(this).attr("id");
    id_g = event.target.id;
   alert ("prise"+id_g);
    
   // alert(event.target.id);
   
   
  //   alert ("2-"+id_g);
 }
  
  </script>


</html>
