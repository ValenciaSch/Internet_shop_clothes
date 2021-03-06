<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Goods */

$this->title = 'Update Goods: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goods-update">
 <div style="width:80%; margin-left:10%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

 </div>
</div>
