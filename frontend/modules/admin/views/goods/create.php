<?php

use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model frontend\models\Goods */


$this->title = 'Create Goods';
 
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-create">
<div style="width:80%; margin-left:10%;">
    <h1><?= Html::encode($this->title) ?></h1>

    <?//= $this->render('_form', [
      //  'model' => $model,
   // ]) 
   ?>
    
   <?php
  //  $form = ActiveForm::begin();

  $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
   
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    $items1 = ArrayHelper::map($category1,'id','name');
   
    echo $form->field($model, 'id_category1')->widget(Select2::classname(), [
    'data' => $items1,
    'language' => 'ru',
    'options' => ['placeholder' => 'Выберите категорию ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    
    
    $items2 = ArrayHelper::map($category2,'id','name');
   
    echo $form->field($model, 'id_category2')->widget(Select2::classname(), [
    'data' => $items2,
    'language' => 'ru',
    'options' => ['placeholder' => 'Выберите категорию  ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

$items3 = ArrayHelper::map($category3,'id','name');
   
    echo $form->field($model, 'id_category3')->widget(Select2::classname(), [
    'data' => $items3,
    'language' => 'ru',
    'options' => ['multiple' => true,'placeholder' => 'Выберите категорию  ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); 


$item_br = ArrayHelper::map($brands,'id','name');
   
    echo $form->field($model, 'id_brands')->widget(Select2::classname(), [
    'data' => $item_br,
    'language' => 'ru',
    'options' => ['placeholder' => 'Выберите категорию ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

  echo $form->field($model, 'name');
  
  echo $form->field($model, 'id_color')->hint('Например: красный; синий; желтый');
  echo $form->field($model, 'id_size')->hint('Например: 44; 46; 48');
  
  echo $form->field($model, 'short_description')->textArea([
    'id' => 'short_description', 
    'placeholder' => 'Краткое описание товара...', 
    'rows' => 4
]);
  echo $form->field($model, 'full_description')->textArea([
    'id' => 'full_description', 
    'placeholder' => 'Полное описание товара...', 
    'rows' => 4
]);
  
 /* echo $form->field($model, 'img_clothers[]')->widget(FileInput::classname(),[
   // 'name' => 'input-ru[]',
    'language' => 'ru',
    'options' => ['multiple' => true, 'accept' => 'image/*'],
    'pluginOptions' => [   
    'allowedFileExtensions' =>  ['jpg'],
     
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ', 
        
        'previewFileType' => 'any', 
         'overwriteInitial' => false,
        'showUpload' => false,
        'uploadUrl' => Url::to(['create']),]
]);*/

echo $form->field($model, 'img_clothers[]')->fileInput(['multiple' => true, 'input' => 'btn btn-success' ]);


 /* echo $form->field($model, 'img_clothers')->widget(\kartik\file\FileInput::classname(),[
            'options' => [
               'multiple' => true,
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['create']),
                
                'allowedFileExtensions' =>  ['jpg'],
               // 'initialPreview' => $image,
                'showUpload' => false,
              //  'showRemove' => false,
               // 'dropZoneEnabled' => false
            ]
        ]);
       





*/

echo $form->field($model, 'img_slide[]')->fileInput(['multiple' => true, 'input' => 'btn btn-success' ]);

/*  echo $form->field($model, 'img_slide')->widget(FileInput::classname(),[
   // 'name' => 'input-ru[]',
    'language' => 'ru',
    'options' => ['multiple' => true, 'accept' => 'image/*'],
    'pluginOptions' => [    
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ', 
        
        'previewFileType' => 'any', 
         'overwriteInitial' => false,
          'showUpload' => false,
        'uploadUrl' => Url::to(['/site/file-upload']),]
]);*/


 echo $form->field($model, 'visible')->hint('1 или 0');
 echo $form->field($model, 'hits')->hint('1 или 0');
 echo $form->field($model, 'new1')->hint('1 или 0');
 echo $form->field($model, 'sale')->hint('1 или 0');
 echo $form->field($model, 'price');
 
 echo Html::submitButton('Добавить ',['class' => 'btn btn-success']);
    ActiveForm::end();





?>
</div>
</div>
