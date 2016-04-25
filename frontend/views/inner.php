<?
use yii\helpers\Html;
use yii\bootstrap\Nav;
\frontend\assets\MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$this->title ?> </title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?=Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>

<body style="background: #3366CC;" >
<?php $this->beginBody() ?>

<?=$this->render("//common/head") ?>


<?=$content ?>



<?=$this->render("//common/footer") ?>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>