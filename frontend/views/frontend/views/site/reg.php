<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="frontend-views-site-reg">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'lastname') ?>
        <?= $form->field($model, 'firstname') ?>
        <?= $form->field($model, 'patronymic') ?>
        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'telephone') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'repassword') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- frontend-views-site-reg -->
