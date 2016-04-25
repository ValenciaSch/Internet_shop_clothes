<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Search\User1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user1-index">
   <div style="width:80%; margin-left:10%;">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  </div>
    <p>
        <?= Html::a('Create User1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lastname',
            'firstname',
            'patronymic',
            'login',
            // 'password',
             'telephone',
             'email:email',
             'admin',
            'status',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'created_at',
            // 'updated_at',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
