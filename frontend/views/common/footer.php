<?php 

use yii\helpers\Html;
use yii\helpers\Url;
?>
 <footer>
        <div class="container">
          
            <div class="row">
                <div class="col-sm-12">
                    <div class="separator middle footer-separator"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Информация</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li>
                                   <?=Html::a('Новинки',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 1 ] ]])?>
                                </li>
                                <li>
                                  <?=Html::a('Хиты продаж',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 2 ] ]])?>
                                </li>
                                <li>
                                  <?=Html::a('Распродажа',Url::to(['site/new_hits_sale']),[ 'data' => ['method' => 'post',  'params' => ['n_h_s' => 3 ] ]])?>
                                </li>
                               <li>
                                  <?=Html::a('Таблицы размеров',Url::to(['site/size_table'], ['class' => 'has-dropdown']));?>
                               </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Наши предложения</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li>
                                  <?= Html::a('Женщина', Url::to(['site/listgoods']), [ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => '1', 'id_category2' =>'7','id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                </li>
                                <li>
                                   <?=Html::a('Мужщина',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 2, 'id_category2' =>9,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                </li>
                                <li>
                                 <?=Html::a('Девочки',Url::to(['site/listgoods']),[ 'data' => ['method' => 'post',
                                                                                                           'params' => [ 'id_category1' => 3, 'id_category2' =>7,'id_category3' =>'NULL' ]
                                                                                                        ]
                                                                                                    ])?>
                                </li>
                                <li><a href="#">Мальчики</a></li>
                                <li><a href="#">Обувь</a></li>
                                <li><a href="#">Аксессуары</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Контактная информация</h2>
                        </div>
                        <div class="widget-content">
                            <address>
                                CALE <br />
                                Украина <br />
                                Донецкая область <br />
                                ул. Артема, 120 <br />
                                Работаем : пн.-вс.: 9:00-20:00 <br />
                            
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="separator footer-separator">
                        <button class='scroll-top'>Scroll top</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; 2013. Developed by <a href="http://teothemes.com/">TeoThemes</a>&trade;. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li><a href="#" class="facebook">facebook</a></li>
                            <li><a href="#" class="twitter">twitter</a></li>
                            <li><a href="#" class="rss">rss</a></li>
                            <li><a href="#" class="digg">digg</a></li>
                            <li><a href="#" class="linkedin">linkedin</a></li>
                            <li><a href="#" class="flickr">flickr</a></li>
                            <li><a href="#" class="skype">skype</a></li>
                            <li><a href="#" class="email">email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>