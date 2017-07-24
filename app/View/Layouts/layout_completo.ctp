<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0091)http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17 -->
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
    
    <head>
            <?php echo $this->Html->charset(); ?>
            <title>
                Sistema de Projeto : _Empresa_ : <?php echo $this->getVar('titulo_page'); ?>
            </title>
            
            <meta name="title" content="" />
            <meta name="url" content="" />
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <meta name="charset" content="UTF-8" />
            <meta name="autor" content="Grupo DF" />
            <meta name="company" content="Grupo DF" />
            <meta name="revisit-after" content="5" />
            <link rev="made" href="" />
            
            <?php
            echo $this->Html->meta('icon');
            //echo $this->Html->css('cake.generic');
            echo $this->Html->css('stylesheet.css');
            echo $this->Html->css('cloud-zoom.css');
            echo $this->Html->css('superfish.css');
            echo $this->Html->css('slideshow.css');
            
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery-1.7.1.min.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery-ui-1.8.16.custom.min.js') . '"></script>';
            
            echo $this->Html->css('jquery-ui-1.8.16.custom.css');
            
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.cookie.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.fancybox-1.3.4.pack.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.fancybox-1.3.4.js') . '"></script>';
            echo $this->Html->css('jquery.fancybox-1.3.4.css');
            
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.colorbox.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.jcarousel.min.js') . '"></script>';
            echo $this->Html->css('colorbox.css');
            
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/tabs.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/easyTooltip.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/common.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jQuery.equalHeights.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/cloud-zoom.1.0.2.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.prettyPhoto.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jscript_zjquery.anythingslider.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/superfish.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.bxSlider.min.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/script.js') . '"></script>';
            echo '<script type="text/javascript" src="' . $this->Html->url('/js/jquery.nivo.slider.pack.js') . '"></script>';
            
            echo $this->Html->css('livesearch.css');
            
            ?>

    </head>
    <body class="product-category">


        <div class="main-shining">
            <div class="row-1">
                <div id="header">
                    <div class="header-top">
                        <div class="wrapper">
                            <ul class="links">

                                <li><a class="" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/wishlist" id="wishlist-total">Wish list <span>(0)</span></a></li>
                                <li><a class="" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/account">My account</a></li>
                                <li><a class="" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=checkout/cart">Shopping cart</a></li>
                                <li class="last"><a class="" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=checkout/checkout">Checkout</a></li>
                            </ul>
                            <form action="http://livedemo00.template-help.com/opencart_39661/index.php?route=module/currency" method="post" enctype="multipart/form-data">

                            </form>

                            <div id="welcome">
                                Welcome visitor you can <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/login">Login</a> or <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/register">Create an account</a>                        </div>

                        </div>
                    </div>
                    <div class="header-top1">


                        <div class="clear"></div>
                    </div>

                    <div id="logo"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=common/home"><img src="./images/logo.png" title="Computers" alt="Computers"></a></div>
                    <div id="search">
                        <div class="button-search"></div>

                        <span class="search-bg"> <input type="text" name="filter_name" value="" onclick="this.value = &#39;&#39;;" onkeydown="this.style.color = &#39;#000&#39;;"></span>
                    </div>
                    <ul class="main-menu">
                        <li class="first"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=common/home">Home</a></li>
                        <li class="item-1"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=4">About</a></li>
                        <li class="item-2"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=6">Delivery</a></li>
                        <li class="item-3"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=3">Privacy Policy</a></li>
                        <li class="item-4"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=5">Terms &amp; Conditions</a></li>

                        <li class="item-5"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/special">Specials</a></li>
                        <li class="item-6"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/sitemap">Site Map</a></li>
                        <li class="item-7"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/contact">Contact Us</a></li>
                    </ul>

                </div>

            </div>
            <div id="menu">
                <script type="text/javascript">
                    $(document).ready(function(){
			   
                        $('.menu ul li').last().addClass('last');
                        $('.menu ul li li').last().addClass('last');
                    });
			
                </script>

                <ul class="menu sf-js-enabled">
                    <li class="cat_1">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=25">Laptops</a>
                    </li>
                    <li class="cat_2">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=20">Netbooks</a>
                    </li>
                    <li class="cat_3">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=18">Desktops</a>
                    </li>
                    <li class="active cat_4">
                        <a href="./Gaming PCs_files/Gaming PCs.htm">Gaming PCs</a>
                        <ul style="visibility: hidden; display: none; ">
                            <ul>
                                <li>
                                    <a class="screenshot1" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_59">Lorem ipsum dolor</a><img src="./Gaming PCs_files/3DConnexion 3d Space Explorer FMo-3SN 1.png" alt="Lorem ipsum dolor"></li>
                                <li>
                                    <a class="screenshot1" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_60">Sit amet conse </a><img src="./Gaming PCs_files/3dConnexion 3DX-700034 Spacenavigator for Notebooks 1.png" alt="Sit amet conse "></li>
                                <li>
                                    <a class="screenshot1" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_61">Ctetur adipisicing </a>
                                    <ul style="display: none; visibility: hidden; ">
                                        <li>
                                            <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_61_65">Lorem ipsum dolor</a>
                                        </li>
                                        <li class="last">
                                            <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_61_66">Incididunt ut labore</a>
                                        </li>
                                    </ul>
                                </li><li>
                                    <a class="screenshot1" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_62">Elit sed do</a><img src="./Gaming PCs_files/Apple MacBook Pro (13 2.7GHz i7) 1.png" alt="Elit sed do"></li>
                                <li class="last">
                                    <a class="screenshot1" href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_63">Eiusmod tempor</a><img src="./Gaming PCs_files/Apple Power Mac G5 Desktop 1.png" alt="Eiusmod tempor"></li>
                            </ul>
                        </ul>
                    </li>
                    <li class="cat_5">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=57">Tablets</a>
                    </li>
                    <li class="cat_6">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=69">Servers</a>
                    </li>
                    <li class="cat_7">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=70">Monitors</a>
                    </li>
                    <li class="cat_8">
                        <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=71">Projectors</a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="main-container">
                <p id="back-top" style="display: block; "> <a href="http://livedemo00.template-help.com/opencart_39661/#top"><span></span></a> </p>


                <div id="container">
                    <div id="notification"> </div>
                    <div id="column-left">
                        <script type="text/javascript">
                            (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
                            $(window).load(function(){
                                if($(".maxheight-spec").length){
                                    $(".maxheight-spec").equalHeights()}
                            })
                        </script>

                        <div class="box manufacturers">
                            <div class="box-heading"><span>Brands</span></div>
                            <div class="box-content">
                                <ul>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=5">Adipisicing elit</a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=11">Et dolore magna</a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=10">IIncididunt ut labore </a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=8">Lorem ipsum</a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=7">Sed do eiusmod </a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=9">Sit amet conse ctetur </a></li>

                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=6">Tempor </a></li>

                                    <li class="last"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer/product&amp;manufacturer_id=12">Ut enim ad mi</a></li>

                                </ul>
                            </div>
                        </div>


                    </div>

                    <div id="content">  <div class="breadcrumb">
                            <a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=common/home">Home</a>
                            » <a href="./Gaming PCs_files/Gaming PCs.htm" class="last">Gaming PCs</a>
                        </div>
                        <h1>Gaming PCs</h1>
                        <div class="category-info">
                            <div class="std">
                                <p>
                                    It seems that computer is such a <strong>revolutionary invention</strong> that we could not even <strong>realize the true</strong> extent of its significance. Some people are even afraid of such rapid and s<em>triking computer</em> expansion they state that mankind is in danger because of it. Their main <em>argument</em> is the problem of artificial intelligence. But we hope that all these problems will <em>disappear soon</em>.</p>
                                <p>
                                    So, <strong>it is natural</strong> that this sphere is one of the most popular ones and it is <em>really hard to offer</em> computer hardware because of great number of competitors. We are <strong>providing a great choice</strong> of different commodities.</p>
                                <p>
                                    We have a great number of different but <strong>grateful customers</strong> and this fact proves that our goods are of <strong>high quality</strong> and fair price. We’re sure that <strong>no one could stay</strong> indifferent because <strong>everybody wants</strong> to get <em>professionally</em> made up product and pay a fair price for that.<br>
                                        Nowadays we <em>have a problem</em> of choice because we are living in society of total consumption and <em>this process</em> gives a negative effect. Simple customer has a problem of a lack of information.</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-heading"><span>Refine Search</span></div>
                            <div class="box-content">

                                <div class="box-product box-subcat">
                                    <ul>                                                <li class="cat-height " style="height: 86px; ">
                                            <div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_59"><img src="./Gaming PCs_files/3DConnexion 3d Space Explorer FMo-3SN 1-80x80.png" alt="Lorem ipsum dolor (9)" style="border-color: rgb(223, 225, 228); "></a></div>
                                            <div class="name subcatname"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_59">Lorem ipsum dolor (9)</a></div>
                                        </li>
                                        <li class="cat-height " style="height: 86px; ">
                                            <div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_60"><img src="./Gaming PCs_files/3dConnexion 3DX-700034 Spacenavigator for Notebooks 1-80x80.png" alt="Sit amet conse  (10)" style="border-color: rgb(223, 225, 228); "></a></div>
                                            <div class="name subcatname"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_60">Sit amet conse  (10)</a></div>
                                        </li>
                                        <li class="cat-height last-in-line" style="height: 86px; ">
                                            <div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_61"><img src="./Gaming PCs_files/Acer AS5738Z-4333 15.6-Inch Laptop 1-80x80.png" alt="Ctetur adipisicing  (15)" style="border-color: rgb(223, 225, 228); "></a></div>
                                            <div class="name subcatname"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_61">Ctetur adipisicing  (15)</a></div>
                                        </li>
                                        <li class="cat-height first-in-line" style="height: 86px; ">
                                            <div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_62"><img src="./Gaming PCs_files/Apple MacBook Pro (13 2.7GHz i7) 1-80x80.png" alt="Elit sed do (10)" style="border-color: rgb(223, 225, 228); "></a></div>
                                            <div class="name subcatname"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_62">Elit sed do (10)</a></div>
                                        </li>
                                        <li class="cat-height " style="height: 86px; ">
                                            <div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_63"><img src="./Gaming PCs_files/Apple Power Mac G5 Desktop 1-80x80.png" alt="Eiusmod tempor (12)"></a></div>
                                            <div class="name subcatname"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&path=17_63">Eiusmod tempor (12)</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-filter">
                            <div class="sort"><b>Sort By:</b>
                                <select onchange="location = this.value;">
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=rating&amp;order=DESC">Rating (Highest)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=rating&amp;order=ASC">Rating (Lowest)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;sort=p.model&amp;order=DESC">Model (Z - A)</option>
                                </select>
                            </div>
                            <div class="limit"><b>Show:</b>
                                <select onchange="location = this.value;">
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;limit=12" selected="selected">12</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;limit=25">25</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;limit=50">50</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;limit=75">75</option>
                                    <option value="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/category&amp;path=17&amp;limit=100">100</option>
                                </select>
                            </div>
                            <div class="product-compare"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/compare" id="compare-total">Product Compare (0)</a></div>
                            <div class="display"><b>Display:</b> <a id="list_a" onclick="display(&#39;list&#39;);">List</a>  <div id="grid_b"></div></div>
                        </div>

                        <div class="product-grid">
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=35">Ecco enswom</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=35"><img id="img_35" src="./Gaming PCs_files/Altec Lansing FX3022 Expressionist BASS 2-Way Speaker for PC and MP3  1-150x150.png" title="Ecco enswom" alt="Ecco enswom"></a></div><div class="price">
                                    $100.00                        <span class="price-tax">Ex Tax: $100.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;35&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;35&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;35&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=41">Esse cillum dolore</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=41"><img id="img_41" src="./Gaming PCs_files/Be Quiet! Intros Dark Rock Pro CPU Cooler 1-150x150.png" title="Esse cillum dolore" alt="Esse cillum dolore"></a></div><div class="price">
                                    $100.00                        <span class="price-tax">Ex Tax: $100.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;41&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;41&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;41&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=40">Gyllamn sticba</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=40"><img id="img_40" src="./Gaming PCs_files/Be Quiet! Readies 1kW Dark Power Pro PSU 1-150x150.png" title="Gyllamn sticba" alt="Gyllamn sticba"></a></div><div class="price">
                                    $101.00                        <span class="price-tax">Ex Tax: $101.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;40&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;40&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;40&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=48">Incididunt ut</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=48"><img id="img_48" src="./Gaming PCs_files/BenQ E2220HD 1-150x150.png" title="Incididunt ut" alt="Incididunt ut"></a></div><div class="price">
                                    $100.00                        <span class="price-tax">Ex Tax: $100.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;48&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;48&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;48&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=32">Ipsum dolor</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=32"><img id="img_32" src="./Gaming PCs_files/Creative Live! Cam Optia AF webcam 1-150x150.png" title="Ipsum dolor" alt="Ipsum dolor"></a></div><div class="price">
                                    $100.00                        <span class="price-tax">Ex Tax: $100.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;32&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;32&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;32&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=30">ISpsum dolor sit amet</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=30"><img id="img_30" src="./Gaming PCs_files/Apple Wireless Keyboard MC184 1-150x150.png" title="ISpsum dolor sit amet" alt="ISpsum dolor sit amet"></a></div><div class="price">
                                    <span class="price-new">$80.00</span>
                                    <span class="price-old">$100.00</span> 
                                    <span class="price-tax">Ex Tax: $80.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;30&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;30&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;30&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=47">Lorem ipsum </a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=47"><img id="img_47" src="./Gaming PCs_files/Apple G5 PowerMac 2GHz Desktop Computer 1-150x150.png" title="Lorem ipsum " alt="Lorem ipsum "></a></div><div class="price">
                                    <span class="price-new">$90.00</span>
                                    <span class="price-old">$100.00</span> 
                                    <span class="price-tax">Ex Tax: $90.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;47&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;47&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;47&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                            <div><div class="name"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=49">Ecco enswom sucaal</a></div><div class="image"><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/product&path=17&product_id=49"><img id="img_49" src="./Gaming PCs_files/Apple magic-mouse 1-150x150.png" title="Ecco enswom sucaal" alt="Ecco enswom sucaal"></a></div><div class="price">
                                    <span class="price-new">$190.00</span>
                                    <span class="price-old">$199.99</span> 
                                    <span class="price-tax">Ex Tax: $190.00</span>
                                </div><div class="description">

                                    It seems that computer is such a revolutionary invention that we could not even realize the true extent of its significance. Some people are even afraid of such rapid and striking computer expansion they state that mankind is in danger because of it. Their main argument is the problem of arti..</div><div class="cart"><a onclick="addToCart(&#39;49&#39;);" class="button"><span>Add to Cart</span></a></div><div class="wishlist"><a class="tip" onclick="addToWishList(&#39;49&#39;);">Add to Wish List</a><span class="tooltip">Wishlist</span></div><div class="compare"><a class="tip2" onclick="addToCompare(&#39;49&#39;);">Add to Compare</a><span class="tooltip2">Compare</span></div></div>
                        </div>

                        <div class="pagination"><div class="results">Showing 1 to 8 of 8 (1 Pages)</div></div>
                    </div>
                    <script type="text/javascript"><!--
                        function display(view) {
                            if (view == 'list') {
                                $('.product-grid ').attr('class', 'product-list');
		
                                $('.product-list > div').each(function(index, element) {
                                    html  = '<div class="right">';
                                    html += '  <div class="price">' + $(element).find('.price').html() + '</div>';
                                    html += '  <div class="cart">' + $(element).find('.cart').html() + '</div>';
                                    html += '  <div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
                                    html += '  <div class="compare">' + $(element).find('.compare').html() + '</div>';
		
                                    html += '</div>';			
			
                                    html += '<div class="left">';
			
                                    var image = $(element).find('.image').html();
			
                                    if (image != null) { 
                                        html += '<div class="image">' + image + '</div>';
                                    }
			
	
					
                                    html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
                                    html += '  <div class="description">' + $(element).find('.description').html() + '</div>';
			
                                    var rating = $(element).find('.rating').html();
			
                                    if (rating != null) {
                                        html += '<div class="rating">' + rating + '</div>';
                                    }
				
                                    html += '</div>';

						
                                    $(element).html(html);
                                });		
		
                                $('.display').html('<b>Display:</b> <div id="list_b"></div> <a id="grid_a" onclick="display(\'grid\');">Grid</a>');
		
                                $.cookie('display', 'list'); 
                            } else {
                                $('.product-list').attr('class', 'product-grid');
		
                                $('.product-grid > div').each(function(index, element) {
                                    html = '';
                                    html += '<div class="name">' + $(element).find('.name').html() + '</div>';
                                    var image = $(element).find('.image').html();
			
                                    if (image != null) {
                                        html += '<div class="image">' + image + '</div>';
                                    }
			
	
			
			
                                    var price = $(element).find('.price').html();
			
                                    if (price != null) {
                                        html += '<div class="price">' + price  + '</div>';
                                    }
	
                                    html += '<div class="description">' + $(element).find('.description').html() + '</div>';
			
                                    var rating = $(element).find('.rating').html();
			
                                    if (rating != null) {
                                        html += '<div class="rating">' + rating + '</div>';
                                    }
						
                                    html += '<div class="cart">' + $(element).find('.cart').html() + '</div>';
                                    html += '<div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
                                    html += '<div class="compare">' + $(element).find('.compare').html() + '</div>';
			
                                    $(element).html(html);
                                });	
					
                                $('.display').html('<b>Display:</b> <a id="list_a" onclick="display(\'list\');">List</a>  <div id="grid_b"></div>');
		
                                $.cookie('display', 'grid');
                            }
                        }

                        view = $.cookie('display');

                        if (view) {
                            display(view);
                        } else {
                            display('list');
                        }
                        //--></script> 
                    <script type="text/javascript">
                        (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
                        $(window).load(function(){
                            if($(".cat-height").length){
                                $(".cat-height").equalHeights()}
                        })
                    </script>
                </div>
                <div class="clear"></div>
                <div class="footer-wrap">
                    <div id="footer">
                        <div class="wrapper">
                            <div class="column col-1">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=4" style="padding-left: 0px; ">About</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=6" style="padding-left: 0px; ">Delivery</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=3" style="padding-left: 0px; ">Privacy Policy</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/information&information_id=5" style="padding-left: 0px; ">Terms &amp; Conditions</a></li>
                                </ul>
                            </div>
                            <div class="column col-2">
                                <h3>Customer Service</h3>
                                <ul>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/contact" style="padding-left: 0px; ">Contact Us</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/return/insert" style="padding-left: 0px; ">Returns</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=information/sitemap" style="padding-left: 0px; ">Site Map</a></li>
                                </ul>
                            </div>
                            <div class="column col-3">
                                <h3>Extras</h3>
                                <ul>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/manufacturer" style="padding-left: 0px; ">Brands</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/voucher" style="padding-left: 0px; ">Gift Vouchers</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=affiliate/account" style="padding-left: 0px; ">Affiliates</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=product/special" style="padding-left: 0px; ">Specials</a></li>
                                </ul>
                            </div>
                            <div class="column col-4">
                                <h3>My Account</h3>
                                <ul>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/account" style="padding-left: 0px; ">My Account</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/order" style="padding-left: 0px; ">Order History</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/wishlist" style="padding-left: 0px; ">Wish List</a></li>
                                    <li><a href="http://livedemo00.template-help.com/opencart_39661/index.php?route=account/newsletter" style="padding-left: 0px; ">Newsletter</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="wrapper">
                            <div id="powered">Powered By <a href="http://www.opencart.com/">OpenCart</a> Computers © 2012</div>
                        </div>
                    </div>

                </div>
                <!-- 
                OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
                Please donate via PayPal to donate@opencart.com
                //-->

                <!-- 
                OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
                Please donate via PayPal to donate@opencart.com
                //-->
                <script type="text/javascript" src="./Gaming PCs_files/livesearch.js"></script>
            </div>
        </div>


        <div id="fancybox-tmp"></div><div id="fancybox-loading"><div></div></div><div id="fancybox-overlay"></div><div id="fancybox-wrap"><div id="fancybox-outer"><div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div><div id="fancybox-content"></div><a id="fancybox-close"></a><div id="fancybox-title"></div><a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a></div></div><div id="cboxOverlay" style="display: none; "></div><div id="colorbox" class="" style="display: none; "><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left; "></div><div id="cboxTopCenter" style="float: left; "></div><div id="cboxTopRight" style="float: left; "></div></div><div style="clear: left; "><div id="cboxMiddleLeft" style="float: left; "></div><div id="cboxContent" style="float: left; "><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden; float: left; "></div><div id="cboxLoadingOverlay" style="float: left; "></div><div id="cboxLoadingGraphic" style="float: left; "></div><div id="cboxTitle" style="float: left; "></div><div id="cboxCurrent" style="float: left; "></div><div id="cboxNext" style="float: left; "></div><div id="cboxPrevious" style="float: left; "></div><div id="cboxSlideshow" style="float: left; "></div><div id="cboxClose" style="float: left; "></div></div><div id="cboxMiddleRight" style="float: left; "></div></div><div style="clear: left; "><div id="cboxBottomLeft" style="float: left; "></div><div id="cboxBottomCenter" style="float: left; "></div><div id="cboxBottomRight" style="float: left; "></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; "></div></div></body></html>