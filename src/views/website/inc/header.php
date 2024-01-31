<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:35 GMT -->
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

<link rel="stylesheet" href="<?=assets("website/assets/css/bootstrap.min.css")?>" />
<link rel="stylesheet" href="<?=assets("website/assets/css/LineIcons.3.0.css")?>" />
<link rel="stylesheet" href="<?=assets("website/assets/css/tiny-slider.css")?>" />
<link rel="stylesheet" href="<?=assets("website/assets/css/glightbox.min.css")?>" />
<link rel="stylesheet" href="<?=assets("website/assets/css/main.css")?>" />

</head>
<body>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

<div class="preloader">
<div class="preloader-inner">
<div class="preloader-icon">
<span></span>
<span></span>
</div>
</div>
</div>


<header class="header navbar-area">

<div class="topbar">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="top-left">
<ul class="menu-top-link">
<li>
<div class="select-position">
<select id="select4">
<option value="0" selected>$ USD</option>
<option value="1">€ EURO</option>
<option value="2">$ CAD</option>
<option value="3">₹ INR</option>
<option value="4">¥ CNY</option>
<option value="5">৳ BDT</option>
</select>
</div>
</li>
<li>
<div class="select-position">
<select id="select5">
<option value="0" selected>English</option>
<option value="1">Español</option>
<option value="2">Filipino</option>
<option value="3">Français</option>
<option value="4">العربية</option>
<option value="5">हिन्दी</option>
<option value="6">বাংলা</option>
</select>
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-middle">
<ul class="useful-links">
<li><a href="index-2.html">Home</a></li>
<li><a href="about-us.html">About Us</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-end">
<div class="user">
<i class="lni lni-user"></i>
Hello
</div>
<ul class="user-login">
<li>
<a href="login.html">Sign In</a>
</li>
<li>
<a href="register.html">Register</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="header-middle">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-3 col-7">
        <a class="navbar-brand" href="index-2.html">
          <img src=<?= assets("website/assets/images/logo/logo.svg") ?> alt="Logo">
        </a>
        <?= (!empty($header['clintData'])) ? $header['clintData']['name'] : "" ?>
      </div>
      <div class="col-lg-5 col-md-7 d-xs-none">
        <div class="main-menu-search">
          <form action="/Products/searchView/00" method="POST">
            <div class="navbar-search search-style-5">
              <div class="search-select">
                <div class="select-position">
                  <select id="search-select" name="cat">
                    <option selected value="0">All</option>
                    <?php 
                      foreach($categories as $categorie) :
                    ?>
                    <option value="<?=$categorie['id']?>"><?=$categorie['name']?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="search-input">
                <input type="text" placeholder="Search" name="key" id="search">
                <div  class="row" style="width: 100%;background-color:#eee;position:absolute;z-index:100" id="search-resutls">
                </div>
              </div>
              <div class="search-btn">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-2 col-5">
        <div class="middle-right-area">
          <div class="nav-hotline">
            <i class="lni lni-phone"></i>
            <h3>Hotline:
              <span>(+100) 123 456 7890</span>
            </h3>
          </div>
          <?php if(!empty($header['clintData'])) : ?>
          <div class="navbar-cart">
            <div class="wishlist">
              <a href="javascript:void(0)">
                <i class="lni lni-heart"></i>
               <span class="total-items">0</span>
              </a>
            </div>
            <div class="cart-items">
              <a href="javascript:void(0)" class="main-btn">
                <i class="lni lni-cart"></i>
                <span class="total-items"><?=$header['my_cart_count']?></span>
              </a>
              <div class="shopping-item">
                <div class="dropdown-cart-header">
                  <span><?=$header['my_cart_count']?> Items</span>
                    <a href="/cart/">View Cart</a>
                </div>
                <ul class="shopping-list">
                  <?php 
                    if(!empty($header['my_cart'])) :
                      foreach($header['my_cart'] as $product) :
                  ?>
                  <li>
                    <div class="cart-img-head">
                      <a class="cart-img" href="/Products/productDetails/<?=$product['product']['id']?>"><img src=<?=assets('img/'.$product['photos'][0]['photo'])?> alt="#"></a>
                    </div>
                    <div class="content">
                      <h4>
                        <a href="/Products/productDetails/<?=$product['product']['id']?>">
                          <?=$product['product']['name']?>
                        </a>
                      </h4>
                      <p class="product-des">
                        <?= (!empty($product['product']['color'])) ? "<span><em>Color : </em>". $product['product']['color'] ."</span>" : "" ?>
                      </p>
                      <p class="quantity"><?=$product['product']['quan']?>x - <span class="amount">$<?=$product['product']['pr_price']?></span></p>
                    </div>
                  </li>
                  <?php 
                      endforeach;
                    endif;
                  ?>
                </ul>
                <div class="bottom">
                  <div class="total">
                    <span>Total</span>
                    <span class="total-amount">
                      $<?php 
                    if(!empty($header['my_cart'])) :
                      $total = 0;
                          foreach($header['my_cart'] as $product) :
                            $total += $product['product']['pr_price'];
                          endforeach;
                      endif;
                      echo $total
                      ?>
                    </span>
                  </div>
                  <div class="button">
                    <a href="checkout.html" class="btn animate">Checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-6 col-12">
      <div class="nav-inner">
        <div class="mega-category-menu">
          <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
          <ul class="sub-category">
            <?php 
              foreach($header['categories'] as $categorie) :
            ?>
            <li><a href="/Products/productsByCat/<?=$categorie['id']?>/00"><?=$categorie['name']?></a></li>
            <?php endforeach ?>
          </ul>
        </div>


<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
<ul id="nav" class="navbar-nav ms-auto">
<li class="nav-item">
<a href="/" class="active" aria-label="Toggle navigation">Home</a>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
<ul class="sub-menu collapse" id="submenu-1-2">
<li class="nav-item"><a href="about-us.html">About Us</a></li>
 <li class="nav-item"><a href="faq.html">Faq</a></li>
<li class="nav-item"><a href="/home/signIn">Login</a></li>
<li class="nav-item"><a href="/home/signUp">Register</a></li>
<li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
<li class="nav-item"><a href="404.html">404 Error</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Shop</a>
<ul class="sub-menu collapse" id="submenu-1-3">
<li class="nav-item"><a href="/Products/index/00">Shop Grid</a></li>
<li class="nav-item"><a href=" <?=(empty($header['clintData'])) ? "/home/signIn" : '/cart/' ?>">Cart</a></li>
<li class="nav-item"><a href="checkout.html">Checkout</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Blog</a>
<ul class="sub-menu collapse" id="submenu-1-4">
<li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
</li>
<li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
<li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
Sibebar</a></li>
</ul>
</li>
<li class="nav-item">
<a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
</li>
</ul>
</div> 
</nav>

</div>
</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="nav-social">
<h5 class="title">Follow Us:</h5>
<ul>
<li>
<a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>

</div>
</div>
</div>

</header>