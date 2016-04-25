<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\web\YiiAsset;
?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){
        $('#refreshButton').click();
    }, 3000);
});
JS;
$this->registerJs($script);
?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327963893924647";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
       <ul class="nav navbar-nav" style=" margin-right:40px;   float:right;">
            <li > 
     <?php echo Html::a("<span class='glyphicon glyphicon-edit'></span>   ВЫХОД",Url::to(['default/logout']),['data-method'=>'post'] );  ?></li>
       </li>
                 </ul>
      <div class="container">  
        <div class="navbar-collapse collapse">
         <ul class='main-nav'>
            <li > <a href="#"><span class='glyphicon glyphicon-home'></span> ТАБЛИЦЫ: </a>  </li>
            <li><?=Html::a('GOODS',Url::to(['goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li ><?=Html::a('USER',Url::to(['user1/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li><?=Html::a('ORDER',Url::to(['order/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li ><?=Html::a('ORDER_GOODS',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li ><?=Html::a('REVEWS',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li><?=Html::a('CATEGORY',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?>
                 <ul>
                         <li class="active"><?=Html::a('Category1',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
                         <li class="active"><?=Html::a('Category2',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
                         <li class="active"><?=Html::a('Category3',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
                 </ul>
            </li>           
            <li ><?=Html::a('DELIVERY',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li ><?=Html::a('PAYMENT',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li > <?=Html::a('COLOR',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>
            <li > <?=Html::a('SIZE',Url::to(['order_goods/index'] ), [ 'data' => ['method' => 'post'  ]  ])?></li>           
            
         </ul> 
                  
        </div>
        
      </div>
      
    </div>

  