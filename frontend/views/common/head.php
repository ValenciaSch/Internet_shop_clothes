 <?php
 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\web\YiiAsset;

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
            <li class="active"> <!--<a href="index.html"><span class='glyphicon glyphicon-home'></span> Главная</a>-->
           <?=Html::a(" <span class='glyphicon glyphicon-home'></span>Главная",Url::to(['/../web/']));?>
            </li>
           
                <?php if (!Yii::$app->user->isGuest)
                   {  echo " <li> <a href='#'><span class='glyphicon glyphicon-user'></span>".Yii::$app->user->identity->login."</a> </li>"; 
                     // echo "<li> <a href='/advanced_3/frontend/web/site/logout'><span class='glyphicon glyphicon-briefcase'></span> ВЫХОД</a> </li>"; 
                       if (Yii::$app->user->identity->admin==20)
                      {
                        
                      echo "<li>";                     
                      echo Html::a("<span class='glyphicon glyphicon-briefcase'></span>   Администратор",Url::to(['admin/goods/index']),['data-method'=>'post'] );
                      echo "</li>";
                      }
                      
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
                     
                      if (empty($_SESSION['total_quantity'])){
                        echo $_SESSION['total_quantity'];
                       echo  " <a href='#' style='color: white;'><span class='glyphicon glyphicon-shopping-cart'></span> МОИ ТОВАРЫ: 0  ТОВАР(А)</a>";
                      }  else 
                       { echo " <a href='/advanced_3/frontend/web/site/basket'style='color: white;' ><span class='glyphicon glyphicon-shopping-cart'></span>  МОИ ТОВАРЫ:   ".$_SESSION['total_quantity']." ТОВАР(А)  НА СУММУ:  ".$_SESSION['total_sum']." </a>";
                        // $team= "<span class='glyphicon glyphicon-shopping-cart'></span>  МОИ ТОВАРЫ:   ".$_SESSION['total_quantity']." ТОВАР(А)  НА СУММУ:  ".$_SESSION['total_sum'];
                          //echo Html::a($team,Url::to(['site/basket']));
                       }
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
                <div class="phone">
                    <div class="box-contacts">
                        <div class="phone_number"><b>
                            <span>(062)</span>
                            " 386-38-58"
                        </b>
                        <b>
                            <span> &nbsp; &nbsp; (095)</span>
                            " 208-45-45"
                        </b></div>
                        <p>Call-центр: пн.-вс.: 9:00-20:00</p>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <h1 class='brand'>Cale  </h1>
                </div>
            </div>

      
           
           
              
                <div  class="col-sm-13" >              
              <div class="row-menu" > 
                     <div class="wrapper-block"> 
                     
                        <div class="row">
                            <div class="col-sm-10">
                                <nav role='main-nav'>
                                    <ul class='main-nav'>
                                        <li > <!--class='active'-->
                                                  
                                                  <a href="#" class="has-dropdown">Женщины</a>                                              
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
                                        <li> <a href="#" class="has-dropdown">Мужчины</a>          
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
                                                <li><a href="#">Девочки</a>
                                                               <ul>
                                                                        <li><a href="#">Блузки</a></li>
                                                                        <li><a href="#">Блузы</a></li>
                                                                        <li><a href="#">Жилеты</a></li>
                                                                        <li><a href="#">Комплекты</a></li>
                                                                        <li><a href="#">Куртки и плащи</a></li>
                                                                        <li><a href="#">Брюки</a></li>
                                                                        <li><a href="#">Юбки</a></li>
                                                                        <li><a href="#">Платье</a></li>
                                                                    </ul>
                                                
                                                </li>
                                                <li><a href="#">Мальчики</a>
                                                                  <ul>
                                                                        <li><a href="#">Блузки</a></li>
                                                                         <li><a href="#">Комплекты</a></li>
                                                                        <li><a href="#">Футболки</a></li>
                                                                        <li><a href="#">Куртки и плащи</a></li>
                                                                        <li><a href="#">Брюки</a></li>
                                                                        <li><a href="#">Свитера</a></li>                                                                        
                                                                    </ul>
                                                
                                                </li>
                                                <li><a href="#">Младенцы</a>
                                                                 <ul>
                                                                        <li><a href="#">Детское белье</a>
                                                                              <ul>
                                                                                    <li><a href="#">Девочки</a></li>
                                                                                    <li><a href="#">Мальчики</a></li>                                                                                   
                                                                               </ul>
                                                                        </li>
                                                                                                                                      
                                                                    </ul>
                                                </li>                                              
                                            </ul>
                                        </li>
                                        <li><a href="shopping-cart.html" class="has-dropdown">Обувь</a>
                                            <ul>
                                               <li><a href="#">Женская обувь</a>
                                                    <ul>
                                                                        <li><a href="#">Балеринки</a></li>
                                                                        <li><a href="#">Босоножки</a></li>
                                                                        <li><a href="#">Ботинки</a></li>
                                                                        <li><a href="#">Лодочки</a></li>
                                                                        <li><a href="#">Сапоги</a></li>
                                                     </ul>
                                               </li>
                                               <li><a href="#">Мужская обувь</a></li>
                                               <li><a href="#">Детская обувь</a></li>                                              
                                            </ul>
                                        </li>
                                        <li><a href="shopping-cart.html" class="has-dropdown">Аксессуары</a>
                                            <ul>
                                               <li><a href="#">Бижутерия</a></li>
                                               <li><a href="#">Ремни</a></li>
                                               <li><a href="#">Шали и платки</a></li>
                                               <li><a href="#">Сумки</a></li>
                                               <li><a href="#">Часы</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li>
                                           <?=Html::a('Контакты',Url::to(['site/contact'], ['class' => 'has-dropdown']));?>
                                        </li>
                                        <li>
                                            <?=Html::a('Таблицы размеров',Url::to(['site/size_table'], ['class' => 'has-dropdown']));?>
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-2">
                                
                                  <!--  <input type="text" class="form-control" placeholder="Search here">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button"><span class='glyphicon glyphicon-search'></span></button>
                                    </span>-->
                                    
                                       <?php   ActiveForm::begin(
                                    [
                                        'action' => ['search'],
                                        'method' => 'post',
                                        
                                    ]
                                );
                              echo '<div class="input-group search-block">';
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