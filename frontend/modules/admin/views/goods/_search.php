<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Search\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'id_brands') ?>

    <?= $form->field($model, 'id_category1') ?>

    <?= $form->field($model, 'id_category2') ?>

    <?php // echo $form->field($model, 'id_category3') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'id_color') ?>

    <?php // echo $form->field($model, 'img_clothers') ?>

    <?php // echo $form->field($model, 'id_size') ?>

    <?php // echo $form->field($model, 'short_description') ?>

    <?php // echo $form->field($model, 'full_description') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'new1') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'img_slide') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
