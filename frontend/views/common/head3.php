 <script>
 (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327963893924647";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    
    function menu_goods()
  {
    alert('id');
    id = event.target.id;
    if (id<20) alert(id);
//	alert(id);
  //  $("#messageGoods").load("Views/controller.php","option=goods&category=id"); 
     $("#messageGoods").load("Views/controller.php",
         {
            option:"goods",
            category:id
         }
     );
    
 </script>
 
 
 
 
 <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html"><span class='glyphicon glyphicon-home'></span> Главная</a></li>
            <li><a href="#about"><span class='glyphicon glyphicon-user'></span> Гость</a></li>
            <li><a href="shopping-cart.html"><span class='glyphicon glyphicon-briefcase'></span> Контакты</a></li>
            <li><a href="shopping-cart.html"><span class='glyphicon glyphicon-briefcase'></span> Вход / Регистрация</a></li>
           
          </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown nav-bar-dropdown">
                </li>
                        
                <li>
                    <a href="shopping-cart.html"><span class='glyphicon glyphicon-shopping-cart'></span> Мои товары:  1 товар(а)</a>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <header>
        <div class="container">           
                
                
            <div class="row">
                <div class="col-sm-12">
                    <h1 class='brand'><a href="index.html">Vigo Shop</a></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-block">
                        <div class="row">
                            <div class="col-sm-10">
                                <nav role='main-nav'>
                                    <ul class='main-nav'>
                                        <li >
                                            <a class="has-dropdown" href="index.html">Home</a>
                                            <ul>
                                                <li><a href="<?= Url::to(['/users/delete', 'id_category1' => 1])?>" data-method="post">Жакеты</a></li>
                                                <li><a href=" " id="2"  onclick="menu_goods()" >Брюки</a></li>
                                                <li><a href="web/site/goods" id="3"  onclick="menu_goods()">Жакеты и блейзеры</a></li>
                                                <li><a href="web/site/goods" id="4"  onclick="menu_goods()">Жилетки</a></li>
                                                <li><a href="web/site/goods" id="5"  onclick="menu_goods()">Костюмы и комплектующие</a></li>
                                                <li><a href="web/site/goods" id="6"  onclick="menu_goods()">Купальники</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About us</a>
                                             <ul>
                                                <li><a href="web/site/goods" id="20"  onclick="menu_goods()" >Home slider v2</a></li>
                                                <li><a href="web/site/goods" id="21"  onclick="menu_goods() ">Home slider v2</a></li>
                                                <li><a href="web/site/goods" id="22"  onclick="menu_goods()">Home slider v2</a></li>
                                                <li><a href="web/site/goods" id="23"  onclick="menu_goods()">Home slider v2</a></li>
                                                <li><a href="web/site/goods" id="24"  onclick="menu_goods()">Home slider v2</a></li>
                                                <li><a href="web/site/goods" id="25"  onclick="menu_goods()">Home slider v2</a></li>
                                            </ul>
                                        
                                        
                                        
                                        </li>
                                        <li>
                                            <a href="blog.html" class="has-dropdown">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog Normal</a></li>
                                                <li><a href="blog-large.html">Blog large</a></li>
                                                <li><a href="blog-article.html">Single article</a></li>
                                                <li>
                                                    <a href="#">More dropdown</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Sub Menu Item #1</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Sub Menu Item #1</a>
                                                                    <ul>
                                                                        <li><a href="#">Sub Menu Item #1</a></li>
                                                                        <li><a href="#">Sub Menu Item #2</a></li>
                                                                        <li><a href="#">Sub Menu Item #3</a></li>
                                                                        <li><a href="#">Sub Menu Item #4</a></li>
                                                                        <li><a href="#">Sub Menu Item #5</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a href="#">Sub Menu Item #2</a></li>
                                                                <li><a href="#">Sub Menu Item #3</a></li>
                                                                <li><a href="#">Sub Menu Item #4</a></li>
                                                                <li><a href="#">Sub Menu Item #5</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Sub Menu Item #2</a></li>
                                                        <li><a href="#">Sub Menu Item #3</a></li>
                                                        <li><a href="#">Sub Menu Item #4</a></li>
                                                        <li><a href="#">Sub Menu Item #5</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                         <li>
                                            <a href="category-grid.html" class="has-dropdown">Category</a>
                                            <ul>
                                                <li><a href="category-grid.html">Category grid</a></li>
                                                <li><a href="category-list.html">Category-list</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li>
                                            <a class="has-dropdown" href="product.html">Product</a>
                                            <ul>
                                                <li><a href="product-compare.html">Product compare</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shopping-cart.html">Cart</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group search-block">
                                    <input type="text" class="form-control" placeholder="Search here">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button"><span class='glyphicon glyphicon-search'></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>