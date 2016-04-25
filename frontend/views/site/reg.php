<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegForm */
/* @var $form ActiveForm */
?>
          <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">  
                <div class="checkout-form">
                <!--    <form class="checkout-form" method="post" action="#">-->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            
                                             <a href="/advanced_3/frontend/web/site/login"> <span class="step-count"></span>  ВХОД </a>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <span class="step-count"></span> РЕГИСТРАЦИЯ
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                         <div class="col-sm-1">   </div>
                                            <div class="col-sm-10">  
                                                <h2>Персональные данные</h2>
                                                
                                                 <? 
                                                $form=\yii\bootstrap\ActiveForm::begin();
                                                ?>

                                                
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                     <?
                                                     echo $form->field($model, 'lastname' );
                                                    ?>
                                               
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                   
                                                     <?
                                                     echo $form->field($model, 'firstname' );
                                                     ?>                                                    
                                                </div>
                                                 <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <?
                                                     echo $form->field($model, 'patronymic' );
                                                    ?>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <?
                                                    echo $form->field($model, 'email' )->input('email');
                                                    ?>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                                    <?
                                                    echo $form->field($model, 'telephone' )->widget(MaskedInput::className(),[
                                                                 'name' => 'telephone',
                                                                 'mask' => '(999) 99-99-999'
                                                      ]);
                                                    ?>
                                                </div>
                                              
                                                <div class="form-space"></div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                      <?
                                                      echo $form->field($model, 'login' );
                                                      ?>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <?
                                                    echo $form->field($model, 'password' )->passwordInput();
                                                    ?>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                     <?
                                                     echo $form->field($model, 'repassword' )->passwordInput();
                                                     ?>
                                                </div>
                                                
                                                 
                                                
                                             
                                                <? 
                                                echo \yii\helpers\Html::submitButton('РЕГИСТРАЦИЯ',['class' => 'btn btn-default custom-button btn-lg']);
                                               
                                                    \yii\bootstrap\ActiveForm::end();
                                                  ?>                        
                                                
                                            </div>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                          
                          
                          
                            </div>
                        </div>
                        
                        
             
                   <!-- </form>--></div>
                </div>
            </div>
      
       
    </section>
        
        

