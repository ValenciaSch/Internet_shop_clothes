<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'Cale';
?>


 <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><?=Html::a('Главная',Url::to(['/../web/']));?></li>
                        <li class="active">Контакты</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id='main'>
        <div class="container">
            <div class="row"> 
                 <div class="col-sm-12">
                       <div style=" padding: 5px;   margin-left:30px;   ">
                           <h1>  Контакты</h1>
                            <hr />
                      </div>
                   </div>
                <div class="col-sm-8">
                    <div class="contact-form">
                       
                        <div class="input-group">
                            <br />  
                        <h3>Вы всегда можете связаться с нашим интернет-магазином!</h3>
                        <h3> <span class="required">Время работы операторов call-центра: </span> ежедневно с 9:00 до 20:00 (время Московское). </h3>
                        <br /> <br />    <br />    <br />
                          <h4>Адрес нашего офиса: улица Артема 120,  Ворошиловский район, г. Донецк.  </h4>
             
                    </div>
                </div>
               </div>
                <aside class="col-sm-4">
                    <div class="widget">
                        <div class="widget-title">
                            <h2 class="contact-widget">Контактная информация</h2>
                        </div>
                        <div class="widget-content">
                            <div class="contact-line">
                                <div class="figure">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="text">
                                    <span class="line">(062) 386-38-58</span>
                                    <span class="line">0203 478 1296</span>
                                </div>
                            </div>
                            <div class="contact-line">
                                <div class="figure">
                                    <i class="icon-mobile-phone"></i>
                                </div>
                                <div class="text">
                                    <span class="line">095 208-45-45</span>
                                    <span class="line">093 228-45-45</span>
                                </div>
                            </div>
                            <div class="contact-line">
                                <div class="figure">
                                    <i class="icon-envelope"></i>
                                </div>
                                <div class="text">
                                    <span class="line">cale_shop@gmail.com</span>
                                    <span class="line">cale@hotmail.com</span>
                                </div>
                            </div>
                            <div class="contact-line">
                                <div class="figure">
                                    <i class="icon-skype"></i>
                                </div>
                                <div class="text">
                                    <span class="line">cale_shop_contact</span>
                                    <span class="line">cale_support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                
                
                
                
                <div class="col-sm-12">
              
               
                    <div class="map-container">
                      
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2668.18010711857!2d37.78817981556642!3d48.029548066657895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e090099f1ddcd7%3A0x22c3326081772e7a!2z0LLRg9C7LiDQkNGA0YLQtdC80LAsIDEyMCwg0JTQvtC90LXRhtGM0LosINCU0L7QvdC10YbRjNC60LAg0L7QsdC70LDRgdGC0Yw!5e0!3m2!1sru!2sua!4v1457555707148" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

				   </div>
                </div>
                
            </div>
        </div>
    </section>