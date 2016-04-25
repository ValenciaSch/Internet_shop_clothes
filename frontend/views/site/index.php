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
?>
 
 
 <section class="homepage-slider typeOne hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sliderTypeOne flexslider">
                        <div class="slider-controls sliderTypeOne-controls">
                            <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
                        <ul class="slides">
                        
                         <li style="background-image: url('img/homepage-slider03.jpg');">
                                <div class="slide-content">
                                    <div class="inner">
                                        <h1 class='alternate'>Summer in the sity.</h1>
                                        <div class="clearfix"></div>
                                        <div class="small-separator"></div>
                                        <div class="clearfix"></div>
                                        <p>porttitor adipiscing purus. Sed nibh mauris, sodalestincidunt eget, condimentum sit amet lorem. Fusce quisturpis. Vestibulum auctor metus arcu.</p>
                                        <div class="clearfix"></div>
                                     <!--   <a href="category-grid.html" class='btn btn-default btn-lg custom-button'>Take a Look</a>-->
                                        <?=Html::a('Посмотреть',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 1, 'id_category2' =>8,'id_category3' =>'NULL' ],
                                                                                                             
                                                                                                        ],
                                                                                                'class'=>'btn btn-default btn-lg custom-button'
                                                                                                    ])?>
                                        
                                    </div>
                                </div>
                            </li>
                            <li style="background-image: url('img/105226033_1.jpg');">
                                <div class="slide-content all-white">   <br /> <br />                               
                                   <div class="inner" >
                                        <h1> Мужская одежда</h1>
                                        <div class="clearfix"></div>
                                        <div class="small-separator"></div>
                                        <div class="clearfix"></div>
                                        <p>Костюмы, пиджаки , рубашки, жилетки, свитера</p>
                                        <div class="clearfix"></div>
                                         <?=Html::a('Посмотреть',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' =>2, 'id_category2' =>9,'id_category3' =>'NULL' ],
                                                                                                             
                                                                                                        ],
                                                                                                'class'=>'btn btn-default btn-lg custom-button'
                                                                                                    ])?>
                                    </div>
                                </div>
                            </li>
                            <li style="background-image: url('img/detskaya-moda-1024x768.jpg');">
                               <div class="slide-content all-white">                                 
                                 <br />
                                   <div class="inner" >
                                        <h1>Детская одежда</h1>
                                        <div class="clearfix"></div>
                                        <div class="small-separator"></div>
                                        <div class="clearfix"></div>
                                        <p></p>
                                        <div class="clearfix"></div>
                                        <?=Html::a('Посмотреть',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 3, 'id_category2' =>7,'id_category3' =>'NULL' ],
                                                                                                             
                                                                                                        ],
                                                                                                'class'=>'btn btn-default btn-lg custom-button'
                                                                                                    ])?>
                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id='main'>
        <div class="container">
            <div class="row">
                <div class="presentation-boxes">
                    <div class="col-sm-4">
                        <figure class="big-image center-content">
                            <img src="img/homepage-categ01.jpg" alt=""/>
                            <figcaption>
                                <div class="content">
                                    <h2><?=Html::a('New Men Collection',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 2, 'id_category2' =>9,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                    </h2>
                                  
                                    <?=Html::a('Посмотреть сейчас',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 2, 'id_category2' =>9,'id_category3' =>'NULL' ]
                                                                                                        ],
                                                                                                     [' class'=>'image-link' ] 
                                                                                                    ])?>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-4">
                        <figure class="big-image center-content">
                            <img src="img/mango-fall-2010-lookbook-20.jpg" alt=""/> <!--homepage-categ02.jpg-->
                            <figcaption>
                                <div class="content">
                                    <h2><?=Html::a('Наши новинки',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 1 ] ]])?>
                                    </h2>                                    
                                    <?=Html::a('Посмотреть сейчас',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 1 ] ],  [' class'=>'image-link' ] ])?>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-4">
                        <div class="combined-boxes">
                            <figure class="big-image center-content">
                                <img src="img/homepage-categ03.jpg" alt=""/>
                                <figcaption>
                                    <div class="content">
                                        <h3> <?=Html::a('Самые низкие цены!!!',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 3 ] ]])?></h3>
                                        <h1> <?=Html::a('SALE',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 3 ] ]])?>  </h1>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class="big-image center-content">
                                <img src="img/homepage-categ04.jpg" alt=""/>
                                <figcaption>
                                    <div class="content">
                                        <h2>
                                        <?=Html::a('Girls',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 3, 'id_category2' =>7,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                        </h2>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
           
            
            
          
          
            
            
            <div class="row">
                <div class="col-sm-12">                    
                    <div class="main-widget">
                        <div class="widget-title">
                            <h2>Производители</h2>
                            <div class="slider-controls logo-slider-controls">
                                <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="logo-slider">
                                <ul class="slides">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo1.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo2.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo3.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo4.png" alt=""/>
                                                </figure>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo3.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo4.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo1.png" alt=""/>
                                                </figure>
                                            </div>
                                            <div class="col-sm-3">
                                                <figure>
                                                    <img src="img/logo2.png" alt=""/>
                                                </figure>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>

        </div>
    </section>