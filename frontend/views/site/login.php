  <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
  
  <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">  
                <div class="checkout-form">
                  <? 
                $form=\yii\bootstrap\ActiveForm::begin();
                ?>
                
                <!--    <form class="checkout-form" method="post" action="#">-->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <span class="step-count"></span> ВХОД
                                        </a>                                         
                                    </h4>
                                </div>                                
                                
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                          <div class="col-sm-1">   </div>
                                            <div class="col-sm-10">  
                                           <h2>Вход</h2>
                                                                                             
                                                <div class="form-space"></div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                      <?
                                                      echo $form->field($model, 'login' );
                                                      ?>
                                                </div>
                                                <div class="input-group">                                                    
                                                    <?
                                                    echo '<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
                                                    echo  $form->field($model, 'password' )->passwordInput();
                                                    ?>
                                                </div>                                           
                                                
                                                
                                                 <div class="form-space">
                                                <?= $form->field($model, 'rememberMe', [
                                                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                                  ])->checkbox() ?>
                                                 
                                                 </div>
                                               
                                               
                                                <div class="form-space"></div>
                                                <? 
                                                echo Html::submitButton('ВХОД',['class' => 'btn btn-default custom-button btn-lg']);
                                                ?>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                           
                                            
                                            <a href="/advanced_3/frontend/web/site/reg"> <span class="step-count"></span>  РЕГИСТРАЦИЯ </a>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                          
                          
                          
                            </div>
                        </div>
                        
                        
               <? 
                \yii\bootstrap\ActiveForm::end();
                ?>
                        
                   <!-- </form>--></div>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="total-box checkout">
                    <div class="table-responsive">
                       <br />   <br />   <br />
                         <br />   <br />   <br />
                           <br />   <br />   <br />
                    </div>
                   
                </div>
            </div>
        </div>
       
    </section>