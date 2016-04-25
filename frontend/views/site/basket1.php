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



<section >
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Корзина</h1>
                </div>
              
            </div>
        </div>
    </section>

 <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive shopping-cart">
                    
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="41%"><div class="title-wrap">Название товара</div></th>
                                <th width="14%"><div class="title-wrap">Код</div></th>
                                <th width="14%"><div class="title-wrap">Цена </div></th>
                                <th width="14%"><div class="title-wrap">Колличество</div></th>
                                <th width="14%"><div class="title-wrap">Общая сумма</div></th>
                                <th width="3%"><div class="title-wrap"><i class="glyphicon glyphicon-remove"></i></div></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                              <?php
                   
                  // echo count($model);
                   
                  print_r($_SESSION['basket']);
                   echo " ________ <br />\n";
                    
                    
                   foreach($_SESSION['basket'] as $basket){
                          echo $basket['id']." bbb  <br />\n";
                            foreach ($model as $goods) { 
                                
                                 if ($goods->id==$basket['id'])         
                                {echo $goods->id." yyyy <br />\n";
                                echo $goods->id_color." yyyy <br />\n";
                               ?> 
                            
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <figure>
                                            <img src="/../advanced_3/frontend/web/img_goods/<?=$goods->img?>" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <h2><a href="#"><?=$goods->name?></a></h2>
                                            <div class="details">
                                                <span class="detail-line">
                                                <?php 
                                                 $listColor1=explode("; ", $goods->id_color);
                                                $listImg1=explode("; ", $goods->img_clothers);
                                                $listSize1=explode("; ", $goods->id_size);
                                               
                                                
                                                ?>
                                                    <strong>Цвет: </strong> <?=$listColor1[$basket['color']]?>
                                                </span>
                                                <span class="detail-line">
                                                    <strong>Размер: </strong> <?=$listSize1[$basket['size']]?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="product-code"><?=$goods->id?></div></td>
                                <td><div class="price"><?=$goods->price?></div></td>
                                <td>
                                    <div class="quantity">
                                        <div class="input-group">
                                           <?php                                           
                                           
                                            ActiveForm::begin( ['method' => 'post',] );//form-control bfh-number
                              //  echo '<div class="input-group input-group-sm">';    
                              echo    '  <span class="input-group-btn"> ';                  
                    
                           ?> 
                           
                            <input type="number" name="quantity"  class="btn btn-default" style="height:40px;  font-size: 18px;"  onmouseout="addId_goods()"   min=1  step=1 value="<?=$basket['qty']?>" id="<?=$basket['id']?>"/>
                           
                            <?php    echo '</span>';
                             echo Html::submitButton('Добавить в корзину',['class' => 'hidden', id =>$basket['id']]);
                            ActiveForm::end();    ?>
                                          
                                          
                                          
                                          
                                          
                                         <!--  <input type="text" class="form-control" value="1" placeholder="Quantity" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </span> -->
                                        </div>
                                    </div>
                                </td>
                                <td><div class="subtotal"><?php echo $basket['qty']*$goods->price;?> </div></td>
                                <td><button class="btn btn-default custom-button"><i class="glyphicon glyphicon-remove"></i></button></td>
                            </tr>
                            
                            <?php }
                                }
                   }
                    ?>
                            
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
                    <a href="#" class="btn btn-default btn-lg custom-button pull-left">Оформить заказ</a>
                 
                    <div class="spacer"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h1>Also Purchased</h1>
                    </div>
                </div>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product01.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="4"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black and white dust sweater dress</a></h2>
                        <div class="price">
                            <span class="new-price">$187.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product02.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="2"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">

                    </div>
                    <div class="text">
                        <h2><a href="#">Pale pink and black buttoned dress</a></h2>
                        <div class="price">
                            <span class="old-price">$250.00</span>
                            <span class="new-price">$201.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product03.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="5"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color" style="border-color: white; background-color: #eedbd9">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black puplum waist-tie kududress</a></h2>
                        <div class="price">
                            <span class="new-price">$305.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product03.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="5"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color" style="border-color: white; background-color: #eedbd9">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black puplum waist-tie kududress</a></h2>
                        <div class="price">
                            <span class="new-price">$305.00</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    
 </body>   
    
  <script>
  $(document).ready(function(){
    
     $("input").click(function () {
 var display = $(this).attr("id");
        alert("LLL");
        
     };
    
       $(".grid_list").click(function(){
        var display = $(this).attr("id"); // получаем значение переключателя вида
        display = (display == "grid") ? "grid" : "list"; // допустимые значения      
   // alert (display);
        if(display == $.cookie("display")){            
            // если значение совпадает с кукой - ничего не делаем
            return false;   
        }else{
            
            // иначе - установим куку с новым значением вида
            $.cookie("display", display);          
           // location.reload()
          // window.location = "?<?=$_SERVER['QUERY_STRING']?>";           
            return false;
        }
    });
    
    /* ===Переключатель вида=== */
    
  
      
  });
  
 //добавление товара в корзину
 
 function addId_goods ()
 {
    // var id =$(this).attr("id");
  var  id_g = event.target.id;
   alert (id_g);
  ///  $.cookie("id_flag","true",{ path: '/' });
   /// $.cookie("goods_id",id_g ,{ path: '/' });    
 }
  
  </script>
  </html>