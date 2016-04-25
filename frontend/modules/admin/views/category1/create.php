<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Category1 */

$this->title = 'Create Category1';
$this->params['breadcrumbs'][] = ['label' => 'Category1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
