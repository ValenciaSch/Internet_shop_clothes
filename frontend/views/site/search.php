<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use yii\widgets\Pjax;

use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>
 
    <section id='main'>
        <div class="container">
            <div class="row">
            
               <?php if (!empty($model)) { ?>
               
               <div class="col-sm-1"> </div>
                <div class="col-sm-9">
                <br />
                <div class="inner">
                  <h1 class='alternate'> <p><?=$search1?> </p></h1>
                  </div>
               
                <hr /> 
                <br />
           <div class="row">
                  
                    <?php foreach ($model as $good) {?>
                                                
                        <article class="category-article category-grid col-sm-4">
                            <figure>
                            <?php if ($good[sale]==1) echo ' <div class="corner-sign red">Sale</div>'; ?>
                            <?php  if ($good[new1]==1) echo ' <div class="corner-sign">New</div>'; ?>
                            <?php if ($good[hits]==1) echo ' <div class="corner-sign">Hit</div>'; ?>
                              <img src="/../advanced_3/frontend/web/img_goods/<?php echo $good['nameCategory1']."/".$good['img'];?>" alt=""/>
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
                               <img src="/../advanced_3/frontend/web/img_goods/<?php echo  $good['nameCategory1']."/".$img_sl?>" alt=""  width="30" height="40" />
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


               </div>
               <?php }

else
{ echo '<br/><br/><br/>';
    echo "<div style='text-align: center; font: 24pt Tahoma; height: 600px;'> Такого товара нету </div>";}

?>
            </div>
        </div>
    </section>
