<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\web\YiiAsset;
?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){
        $('#refreshButton').click();
    }, 3000);
});
JS;
$this->registerJs($script);
?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327963893924647";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html"><span class='glyphicon glyphicon-home'></span> Главная</a></li>
           
                <?php if (!Yii::$app->user->isGuest)
                   {  echo " <li> <a href='#'><span class='glyphicon glyphicon-user'></span>".Yii::$app->user->identity->login."</a> </li>"; 
                      echo "<li> <a href='/advanced_3/frontend/web/site/logout'><span class='glyphicon glyphicon-briefcase'></span> ВЫХОД</a> </li>"; 
                     echo "<li>";
                     echo Html::a("<span class='glyphicon glyphicon-briefcase'></span>   ВЫХОД",Url::to(['site/logout']),['data-method'=>'post'] );
                      echo "</li>";
                    }
                else {echo "<li> <a href='#'><span class='glyphicon glyphicon-user'></span> Гость</a> </li>";
                      echo " <li> <a href='/advanced_3/frontend/web/site/login'><span class='glyphicon glyphicon-briefcase'></span> Вход / Регистрация</a> </li>";
                     }
                ?>        
               
          
          </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown nav-bar-dropdown">
                </li>
                <li>
                
                 <?php Pjax::begin(); 
                       
                       Html::button('Обновить!', ['class' => 'hidden', 'id' => 'refreshButton']) ;
                     
                      if (!isset($_SESSION['total_quantity'])){
                      echo  " <a href='#' style='color: white;'><span class='glyphicon glyphicon-shopping-cart'></span> МОИ ТОВАРЫ: 0  ТОВАР(А)</a>";
                      }  else 
                       {echo " <a href='/advanced_3/frontend/web/site/basket'style='color: white;' ><span class='glyphicon glyphicon-shopping-cart'></span>  МОИ ТОВАРЫ:   ".$_SESSION['total_quantity']." ТОВАР(А)  НА СУММУ:  ".$_SESSION['total_sum']." </a>";}
                       
                       
                       Pjax::end(); ?>
                    
                </li>
                
                    
                <li class="dropdown nav-bar-dropdown">
                   
                </li>
                
                
                
                
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <header>
        <div class="container">           
                
                
            <div class="row">
                <div class="col-sm-12">
                    <h1 class='brand'><a href="index.html">Cale</a></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-block">
                        <div class="row">
                            <div class="col-sm-10">
                                <nav role='main-nav'>
                                    <ul class='main-nav'>
                                        <li > <!--class='active'-->
                                                  <p class="has-dropdown"> Женщины   </p>                                                
                                            <ul>
                                                <li><?=Html::a('Блузы и футболки',Url::to(['site/listgoods'] ), [ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => '1', 'id_category2' =>'2', 'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                                </li>
                                                <li><?=Html::a('Брюки',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                                <li><?=Html::a('Жилетки',Url::to(['site/listgoods', 'id' =>'123']));?></li>                                               
                                                <li> <?= Html::a('Платья', Url::to(['site/listgoods']), [ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => '1', 'id_category2' =>'7','id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                                 </li>
                                                 <li><?=Html::a('Топ',Url::to(['site/listgoods']), [ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => '1', 'id_category2' =>'8','id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>        Мужчины
                                        <ul>
                                                <li><?=Html::a('Блузы',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                                <li><?=Html::a('Брюки',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                                <li><?=Html::a('Жилетки',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                                 <li><?=Html::a('Куртки и плащи',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                                <li><?=Html::a('Пиджаки',Url::to(['site/listgoods', 'id' =>'123']));?></li>
                                        
                                        </ul>
                                        
                                        </li>
                                      <li>
                                            <a href="blog.html" class="has-dropdown">Ребенок</a>
                                            <ul>
                                                <li><a href="blog.html">Blog Normal</a></li>
                                                <li><a href="blog-large.html">Blog large</a></li>
                                                <li><a href="blog-article.html">Single article</a></li>
                                                <li>
                                                    <?=Html::a('Блузы',Url::to(['site/goods', 'id' =>'123']));?>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Sub Menu Item #1</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Sub Menu Item #1</a>
                                                                    <ul>
                                                                        <li><a href="#">Sub Menu Item #1</a></li>
                                                                        <li><a href="#">Sub Menu Item #2</a></li>
                                                                        <li><a href="#">Sub Menu Item #3</a></li>
                                                                        <li><a href="#">Sub Menu Item #4</a></li>
                                                                        <li><a href="#">Sub Menu Item #5</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a href="#">Sub Menu Item #2</a></li>
                                                                <li><a href="#">Sub Menu Item #3</a></li>
                                                                <li><a href="#">Sub Menu Item #4</a></li>
                                                                <li><a href="#">Sub Menu Item #5</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Sub Menu Item #2</a></li>
                                                        <li><a href="#">Sub Menu Item #3</a></li>
                                                        <li><a href="#">Sub Menu Item #4</a></li>
                                                        <li><a href="#">Sub Menu Item #5</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        
                                        
                                        
                                         <li>
                                           Аксессуары
                                            <ul>
                                                <li><a href="category-grid.html">Category grid</a></li>
                                                <li><a href="category-list.html">Category-list</a></li>
                                            </ul>
                                        </li>
                                        <li>Обувь</li>
                                        <li>
                                            <a class="has-dropdown" href="product.html">Дом</a>
                                            <ul>
                                                <li><a href="product-compare.html">Product compare</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shopping-cart.html">Новинки</a></li>
                                        <li><a href="contact-us.html">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-2">
                            <?php   ActiveForm::begin(
                                    [
                                        'action' => ['search'],
                                        'method' => 'post',
                                        'options' => [
                                            'class' => 'navbar-form navbar-right'
                                        ]
                                    ]
                                );
                                echo '<div class="input-group input-group-sm">';
                                echo Html::input(
                                    'type: text',
                                    'search',
                                    '',
                                    [
                                        'placeholder' => 'Найти ...',
                                        'class' => 'form-control'
                                    ]
                                );
                                echo '<span class="input-group-btn">';
                                echo Html::submitButton(
                                    '<span class="glyphicon glyphicon-search"></span>',
                                    [
                                        'class' => 'btn btn-default',                                                                              
                                    ]
                                );
                                echo '</span></div>';
                            ActiveForm::end();    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
