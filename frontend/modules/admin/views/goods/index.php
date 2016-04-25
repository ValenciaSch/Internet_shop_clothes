<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Search\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">
<br />
    <h1 style="text-align:  center;"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div style="width: 25%; margin-left: 20px;">
    <p>
        <?= Html::a('добавить строку в Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<br />
    <p>
    <?php $form = ActiveForm::begin([ 'action' => 'upload','options' => ['enctype' => 'multipart/form-data']]) ?>

    <?//=$form->field($tableModel, 'file' )->fileInput(['style' => 'color:red','input' =>'background-color: #ffe;'])->label('Добавление данных в таблицу из файла')
    ?>
    
    <?=$form->field($tableModel, 'file' )->widget(FileInput::classname(), [
    'options' => [ 'accept' => 'xml/*'],
    'pluginOptions' => [    
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',  
    ]
])->label('Добавление данных в таблицу из файла')
    ?>
     <?=$form->field($tableModel, 'file_id' )->widget(FileInput::classname(), [
    'options' => [ 'accept' => 'xml/*'],
    'pluginOptions' => [    
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ', 
            ]
        ])->label('Редактирование  цены по id товара')
    ?>

   <?php ActiveForm::end() ?>
    </p>
    <?php if ($uploadFile) echo '<p style="color:red">Даннные успешно добавлены </p>'; ?>
    </div>
<br />

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'id_brands',
            'id_category1',
            'id_category2',
            'id_category3',
            'img',
            'id_color',
            'img_clothers',
            'id_size',
            'short_description:ntext',
            'full_description:ntext',
            'visible',
            'hits',
             'new1',
             'sale',
             'price',            
            'img_slide', 
             'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
