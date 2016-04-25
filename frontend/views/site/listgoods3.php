<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Интернет магазин</title>
<!--  
 <script type="text/javascript" src="Views/js/functions.js"></script>
-->
<script type="text/javascript" src="<?=VIEW?>js/functions.js"></script>
<script type="text/javascript" src="<?=VIEW?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=VIEW?>js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="<?=VIEW?>js/jquery.cookie.js"></script>
<!--<script type="text/javascript" src="<?=VIEW?>js/workscripts.js"></script>-->

 
<link href="<?=VIEW?>include/style.css" rel="stylesheet">
</head>
<body> 

<div class="bar"  style="float:left;  width:59%; margin-left:5px;">         
        
     <div class="kroshka">
		<a href="#">Мобильные телефоны</a> / <a href="#">LG</a> / <span>Слайдеры</span>
	</div> <!-- .kroshka -->
    <div class="vid-sort">
		Вид: 
			<a href="#" id="grid" class="grid_list"><img src="Views/img_sait/vid-tabl.gif" alt="табличный вид" /></a> 
			<a href="#" id="list" class="grid_list"><img src="Views/img_sait/vid-line.gif" alt="линейный вид" /></a>  
			&nbsp;&nbsp; 
		Сортировать по:&nbsp;    
			<a href="#" class="sort-top-act">цене</a>  &nbsp;|&nbsp;     
			<a href="#" class="sort-top">названию</a>  &nbsp;|&nbsp;     
			<a href="#" class="sort-bot">датa добавления</a>
	</div> <!-- .vid-sort -->

<?php if($products): // если получены товары категории ?>
<?php foreach($products as $product): ?>
<?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'): // если вид - сетка ?>
<!-- Табличный вид продуктов -->				
<div class="product-table">
	<h2><a href="?view=product&goods_id=<?=$product['id']?>"><?=$product['name']?></a></h2>
	<div class="product-table-img">
		<a href="?view=product&goods_id=<?=$product['id']?>"><img src="Views/img/<?=$product['img']?>" alt="" width="150" height="150" /></a>        
       	 <div> <!-- Иконки -->
            <?php if($product['hits']) echo '<img src="Views/img_sait/lider-nav.jpg"  alt="лидеры продаж" />'; ?>
            <?php if($product['new']) echo '<img src="Views/img_sait/new-nav.jpg" alt="новинка" />'; ?>
            <?php if($product['sale']) echo '<img src="Views/img_sait/sale-nav.jpg" alt="распродажа" />'; ?>							
		</div>  <!-- Иконки -->
	</div>
	<p>Цена :  <span><?=$product['price']?></span></p>
   <input type="number" name="quantity"  class="btn btn-default" style="height:40px;  font-size: 18px;"  onmouseout="addId_goods()"   min=1  step=1 value="1" id="222"/>
	<a href="#" id="<?=$product['id']?>" class="button" onclick="addId_goods()">Добавить в корзину</a>
</div> <!-- .product-table -->
<!-- Табличный вид продуктов -->
<?php else: // если линейный вид ?>
<!-- Линейный вид продуктов -->
<div class="product-line">					
	<div class="product-line-img">
			<a href="?view=product&goods_id=<?=$product['id']?>"><img src="Views/img/<?=$product['img']?>" alt="" width="150" height="150" /></a>
	</div>
	<div class="product-line-price">
		<p>Цена :  <span><?=$product['price']?></span></p>
        <br />
			<a href="#" id="<?=$product['id']?>" class="button" onclick="addId_goods()">Добавить в корзину</a>
	<!--	<a href="?goods_id=<?=$product['goods_id']?>">-->
        
   </div>	
	<div class="product-line-opis">
		<h2><a href="?view=addtocart&goods_id=<?=$product['id']?>"><?=$product['name']?></a>
               
	        <?php if($product['hits']) echo '<img src="Views/img_sait/lider-nav.jpg"  alt="лидеры продаж" />'; ?>
            <?php if($product['new']) echo '<img src="Views/img_sait/new-nav.jpg" alt="новинка" />'; ?>
            <?php if($product['sale']) echo '<img src="Views/img_sait/sale-nav.jpg" alt="распродажа" />'; ?>
        		
        </h2>
		<div style="width: 90%; padding-left: 10px; padding-right: 5px;"><?=$product['short_description']?></div>
        
	</div>	
</div>

<!-- Линейный вид продуктов -->
<?php endif; // конец условия переключателя видов  ?>
<?php endforeach; ?>
<?php else: ?>
    <p>Здесь товаров пока нет!</p>
<?php endif; ?>				
</div> <!-- .catalog-index -->
        
        
        

</div>


</body>


 

  <script>
  $(document).ready(function(){
     
    var dd="dd";
    /* ===Переключатель вида изображения товаров=== */
   
    if($.cookie("display") == null){
        $.cookie("display", "grid",{ path: '/' });
    }
      
    $(".grid_list").click(function(){
        var display = $(this).attr("id"); // получаем значение переключателя вида
        display = (display == "grid") ? "grid" : "list"; // допустимые значения      
   // alert (display);
        if(display == $.cookie("display")){            
            // если значение совпадает с кукой - ничего не делаем
            return false;   
        }else{
            
            // иначе - установим куку с новым значением вида
            $.cookie("display", display);          
           // location.reload()
          // window.location = "?<?=$_SERVER['QUERY_STRING']?>";           
            return false;
        }
    });
    
    /* ===Переключатель вида=== */
    
  
      
  });
  
 //добавление товара в корзину
 
 function addId_goods ()
 {
   // var id =$(this).attr("id");
    id_g = event.target.id;
   alert (id_g);
    $.cookie("id_flag","true",{ path: '/' });
    $.cookie("goods_id",id_g ,{ path: '/' });    
 }
  
  </script>


</html>
