<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lastname',
            'firstname',
            'patronymic',
            'login',
            'password',
            'telephone',
            'email:email',
            'admin',
            'status',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'created_at',
            'updated_at',
            'date',
        ],
    ]) ?>

</div>
