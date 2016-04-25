<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vigo Shop</title>
       
    </head>
    <body>
<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;


use kartik\select2\Select2;
use kartik\widgets;

use yii\widgets\Pjax;

$this->title = 'Cale';
$this->params['breadcrumbs'][] = $this->title;

 
    ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327963893924647";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>



   <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><?=Html::a('Главная',Url::to(['/../web/']));?></li>                        
                         <li> Корзина  </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    

    <section id='main'>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive shopping-cart">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="41%"><div class="title-wrap">Product Name</div></th>
                                <th width="14%"><div class="title-wrap">Product Code</div></th>
                                <th width="14%"><div class="title-wrap">Unit Price</div></th>
                                <th width="14%"><div class="title-wrap">Quantity</div></th>
                                <th width="14%"><div class="title-wrap">Subtotal</div></th>
                                <th width="3%"><div class="title-wrap"><i class="glyphicon glyphicon-remove"></i></div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <figure>
                                            <img src="img/product01.jpg" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <h2><a href="product.html">Black and white dust sweaterdress</a></h2>
                                            <div class="details">
                                                <span class="detail-line">
                                                    <strong>Color: </strong> Black
                                                </span>
                                                <span class="detail-line">
                                                    <strong>Size: </strong> XS
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="product-code">MP125984154</div></td>
                                <td><div class="price">$187.00</div></td>
                                <td>
                                    <div class="quantity">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="1" placeholder="Quantity" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="subtotal">$187.00</div></td>
                                <td><button class="btn btn-default custom-button"><i class="glyphicon glyphicon-remove"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <figure>
                                            <img src="img/product02.jpg" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <h2><a href="product.html">Pale pink and black buttoneddress</a></h2>
                                            <div class="details">
                                                <span class="detail-line">
                                                    <strong>Color: </strong> White
                                                </span>
                                                <span class="detail-line">
                                                    <strong>Size: </strong> XS
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="product-code">SD148795141</div></td>
                                <td><div class="price">$201.00</div></td>
                                <td>
                                    <div class="quantity">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="2" placeholder="Quantity" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="subtotal">$402.00</div></td>
                                <td><button class="btn btn-default custom-button"><i class="glyphicon glyphicon-remove"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cart-product">
                                        <figure>
                                            <img src="img/product03.jpg" alt=""/>
                                        </figure>
                                        <div class="text">
                                            <h2><a href="product.html">Black puplum waist-tie kududress</a></h2>
                                            <div class="details">
                                                <span class="detail-line">
                                                    <strong>Color: </strong> Blue
                                                </span>
                                                <span class="detail-line">
                                                    <strong>Size: </strong> XS
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="product-code">ND157964823</div></td>
                                <td><div class="price">$305.00</div></td>
                                <td>
                                    <div class="quantity">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="2" placeholder="Quantity" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="subtotal">$610.00</div></td>
                                <td><button class="btn btn-default custom-button"><i class="glyphicon glyphicon-remove"></i></button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="total-cost-selectors">
                        <div class="row">
                            <div class="col-sm-5">
                                <ul id="myTab" class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#shipping" data-toggle="tab">Estimate Shipping &Taxes</a></li>
                                    <li class=""><a href="#discount" data-toggle="tab">Discount Code</a></li>
                                    <li class=""><a href="#voucher" data-toggle="tab">Gift Voucher</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-7">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="shipping">
                                        <p class="info">Enter your destination to get a shipping estimate</p>
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="country" class="col-lg-3 control-label">Country<span class="required">*</span></label>
                                                <div class="col-lg-9">
                                                    <select name="country" id="country" class="chosen-select full-width">
                                                        <option value="default">--Please Select--</option>
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="region" class="col-lg-3 control-label">Region/State<span class="required">*</span></label>
                                                <div class="col-lg-9">
                                                    <select name="region" id="region" class="chosen-select full-width">
                                                        <option value="default">--Please Select--</option>
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPostCode" class="col-lg-3 control-label">Post Code<span class="required">*</span></label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" id="inputPostCode" placeholder="Post code">
                                                </div>
                                                <div class="col-lg-4">
                                                    <input class="btn btn-default custom-button btn-block" type="submit" value="Get Quotes" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="discount"></div>
                                    <div class="tab-pane fade" id="voucher"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total-box">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><div class="strong">Subtotal:</div></td>
                                    <td><div class="price">$434.50</div></td>
                                </tr>
                                <tr>
                                    <td><div class="strong">Shipping:</div></td>
                                    <td><div class="price">$6.00</div></td>
                                </tr>
                                <tr>
                                    <td><div class="strong">Tax (0%):</div></td>
                                    <td><div class="price">$0.00</div></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <td><div class="strong">Total:</div></td>
                                    <td><div class="price">$440.50</div></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-12 margin-top">
                    <a href="#" class="btn btn-default btn-lg custom-button pull-left">Continue Shopping</a>
                    <a href="#" class="btn btn-default btn-lg custom-button pull-right">Checkout</a>
                    <div class="spacer"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h1>Also Purchased</h1>
                    </div>
                </div>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product01.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="4"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black and white dust sweater dress</a></h2>
                        <div class="price">
                            <span class="new-price">$187.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product02.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="2"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">

                    </div>
                    <div class="text">
                        <h2><a href="#">Pale pink and black buttoned dress</a></h2>
                        <div class="price">
                            <span class="old-price">$250.00</span>
                            <span class="new-price">$201.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product03.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="5"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color" style="border-color: white; background-color: #eedbd9">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black puplum waist-tie kududress</a></h2>
                        <div class="price">
                            <span class="new-price">$305.00</span>
                        </div>
                    </div>
                </article>
                <article class="category-article category-grid col-sm-3">
                    <figure>
                        <img src="img/product03.jpg" alt=""/>
                        <div class="figure-overlay">
                            <div class="rating-line">
                                <div class="stars-white" data-number="5" data-score="5"></div>
                            </div>
                            <div class="excerpt">
                                <p>
                                    Sed sapien sed eros dignissimvehicula hendrerit at tellus. Nunc mollis magna ac felis tempor, vel malesuada dui tristique.
                                </p>
                            </div>
                            <button class="btn btn-default custom-button">Add to Bag</button>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-heart'></i></span></a>
                            <a href="#"><span class="wrap-icon"><i class='glyphicon glyphicon-ok'></i></span></a>
                        </div>
                    </figure>
                    <div class="figcaption">
                        <button class="color-selector">
                            <span class="real-color" style="border-color: white; background-color: #eedbd9">Color</span>
                        </button>
                        <button class="color-selector" >
                            <span class="real-color" style="border-color: #d9d9d9; background-color: #3f3f3f">Color</span>
                        </button>
                    </div>
                    <div class="text">
                        <h2><a href="#">Black puplum waist-tie kududress</a></h2>
                        <div class="price">
                            <span class="new-price">$305.00</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h1>Most favorite</h1>
                            <div class="slider-controls most-favorite-controls">
                                <button class="next"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button class="prev"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="footer-most-favorite flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="favorite-item">
                                            <a href="product.html">
                                                <figure>
                                                    <img src="img/product01.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Black puplum waist-tie kudu dress</h2>
                                                    <span class="price">$478.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="product.html">
                                                <figure>
                                                    <img src="img/product06.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="favorite-item">
                                            <a href="product.html">
                                                <figure>
                                                    <img src="img/product03.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Black puplum waist-tie kudu dress</h2>
                                                    <span class="price">$478.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="favorite-item">
                                            <a href="product.html">
                                                <figure>
                                                    <img src="img/product02.jpg" alt=""/>
                                                </figure>
                                                <div class="favorite-text">
                                                    <h2>Pale pink and black buttoned dress</h2>
                                                    <span class="old-price">$250.00</span>
                                                    <span class="price">$180.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h1>Quick Contact</h1>
                        </div>
                        <div class="widget-content">
                            <div class="alert alert-success footer-success">Message sent!</div>
                            <div class="alert alert-danger footer-error">The message couldn't be sent!</div>
                            <form action="#" class="footer-form">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="footer-name" type="text" name="name" placeholder="enter your name" class="form-control"/>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="footer-email" type="email" name="email" placeholder="enter your e-mail" class="form-control"/>
                                </div>
                                <textarea id="footer-message" name="message" cols="30" rows="10" placeholder="enter your message" class="form-control"></textarea>
                                <input id="send_message" type="submit" class="btn custom-submit" value="Send Message" name="submit" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h1>Facebook</h1>
                        </div>
                        <div class="widget-content">
                           <div class="fb-like-box" data-href="http://www.facebook.com/teothemes" data-width="The pixel width of the plugin" data-height="430" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="separator middle footer-separator"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Information</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li><a href="#">New Products</a></li>
                                <li><a href="#">Top Sellers</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our Stores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>My Account</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li><a href="#">New Products</a></li>
                                <li><a href="#">Top Sellers</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our Stores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Customer Service</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li><a href="#">New Products</a></li>
                                <li><a href="#">Top Sellers</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our Stores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h2>Contact Info</h2>
                        </div>
                        <div class="widget-content">
                            <address>
                                Vigo Shop Ltd <br />
                                United Kingdom <br />
                                London 02587 <br />
                                Oxford Street 48/188 <br />
                                Working days: Mon. - Sun. <br />
                                Working hours: 9 AM - 8 PM
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="separator footer-separator">
                        <button class='scroll-top'>Scroll top</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; 2013. Developed by <a href="http://teothemes.com/">TeoThemes</a>&trade;. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            <li><a href="#" class="facebook">facebook</a></li>
                            <li><a href="#" class="twitter">twitter</a></li>
                            <li><a href="#" class="rss">rss</a></li>
                            <li><a href="#" class="digg">digg</a></li>
                            <li><a href="#" class="linkedin">linkedin</a></li>
                            <li><a href="#" class="flickr">flickr</a></li>
                            <li><a href="#" class="skype">skype</a></li>
                            <li><a href="#" class="email">email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scripts">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/vendor/jquery.flexslider-min.js"></script>
        <script src="js/vendor/jquery.jcarousel.min.js"></script>
        <script src="js/vendor/jquery.placeholder.min.js"></script>
        <script src="js/vendor/tinynav.min.js"></script>
        <script src="js/vendor/jquery.raty.min.js"></script>
        <script src="js/vendor/chosen.jquery.min.js"></script>
        <script src="js/vendor/bootstrap-slider.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </div>
    </body>
</html>
