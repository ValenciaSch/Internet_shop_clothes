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

 <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="checkout-form" method="post" action="#">
                        <div class="panel-group" id="accordion">                           
                            
                            
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <span class="step-count"></span> <h2> Оформление заказа</h2>
                                        </a>
                                    </h4>
                                </div>
                                
                                <?php if(!$save_goods) { ?>
                                
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                      
                                       
                                        <div class="row">
                                            <div class="col-sm-6">                                               
                                             <?php if (Yii::$app->user->isGuest)
                                           {
                                                 
                                                $form=\yii\bootstrap\ActiveForm::begin();
                                              
                                                if (!$error) echo "<h1 style='color:read;'> Ведите правильно все данные!!! </> ";
                                               
                                                     echo $form->field($model, 'lastname' );
                                                   
                                                     echo $form->field($model, 'firstname' );
                                                    
                                                     echo $form->field($model, 'patronymic' );
                                                   
                                                     echo $form->field($model, 'telephone' )->widget(MaskedInput::className(),[
                                                                 'name' => 'telephone',
                                                                 'mask' => '(999) 99-99-999'
                                                      ]);
                                                      $items = ArrayHelper::map($deliv,'id','name');
                                                      echo $form->field($model, 'delivery' )->radioList($items)->label('Способ доставки:');
                                                     
                                                     echo $form->field($model, 'addressDelivery' )->textarea(array('rows'=>2,'cols'=>5))->label('Адрес доставки:');
                                                    
                                                      $items1 = ArrayHelper::map($paym,'id','name'); //->label(false)
                                                      echo $form->field($model, 'payment' )->radioList($items1)->label('Способ оплаты:');
                                                      echo $form->field($model, 'comments' )->textarea(array('rows'=>2,'cols'=>5))->label('Комментарии:');
                                                    
                                                    echo  '<br /> <br /> <br />';      
                                                 
                                                
                                                echo Html::submitButton('Оформить заказ',['class' => 'btn btn-default custom-button btn-lg']);                                                 
                                                  
                                                 ActiveForm::end();
                                                  }
                                               else {
                                                
                                                 $form=\yii\bootstrap\ActiveForm::begin();
                                              
                                                echo "zareg";
                                               
                                                     echo $form->field($model, 'lastname' ,[
                                                                    'inputOptions' => [
                                                                     'value' => Yii::$app->user->identity->lastname,
                                                                        
                                                                    ]] );
                                                   
                                                     echo $form->field($model, 'firstname',[
                                                                    'inputOptions' => [
                                                                     'value' => Yii::$app->user->identity->firstname,
                                                                        
                                                                    ]] );
                                                    
                                                     echo $form->field($model, 'patronymic',[
                                                                    'inputOptions' => [
                                                                     'value' => Yii::$app->user->identity->patronymic,
                                                                        
                                                                    ]] );
                                                   
                                                     echo $form->field($model, 'telephone', [
                                                                    'inputOptions' => [
                                                                     'value' => Yii::$app->user->identity->telephone,
                                                                        
                                                                    ]] )->widget(MaskedInput::className(),[
                                                                 'name' => 'telephone',
                                                                 'mask' => '(999) 99-99-999'
                                                      ]);
                                                      $items = ArrayHelper::map($deliv,'id','name');
                                                      echo $form->field($model, 'delivery' )->radioList($items)->label('Способ доставки:');
                                                     
                                                     echo $form->field($model, 'addressDelivery' )->textarea(array('rows'=>2,'cols'=>5))->label('Адрес доставки:');
                                                    
                                                      $items1 = ArrayHelper::map($paym,'id','name'); //->label(false)
                                                      echo $form->field($model, 'payment' )->radioList($items1)->label('Способ оплаты:');
                                                      echo $form->field($model, 'comments' )->textarea(array('rows'=>2,'cols'=>5))->label('Комментарии:');
                                                    
                                                   echo  ' <br /> <br /> <br /> ';     
                                                 
                                                 
                                                echo Html::submitButton('Оформить заказ',['class' => 'btn btn-default custom-button btn-lg']);                                                 
                                                  
                                                 ActiveForm::end();
                                                
                                                
                                               }   
                                                  
                                                  ?>  
                                            </div>
                                            <div class="col-sm-6">
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                           
                          
              <?php } 
 else{
    
    echo ' <h1 style="color:red">Ваш заказ принят </h1>';
 }  ?>
                            
                            
                            
                        </div>
                    </form>
                </div>
            </div>
      
        
        
        </div>
    </section>