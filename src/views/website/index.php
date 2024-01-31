<?php include "inc/header.php" ?>


<section class="hero-area">
<div class="container">
<div class="row">
<div class="col-lg-8 col-12 custom-padding-right">
<div class="slider-head">

<div class="hero-slider">

<div class="single-slider" style="background-image: url(<?=assets('website/assets/images/hero/slider-bg1.jpg')?>);">
<div class="content">
<h2><span>No restocking fee ($35 savings)</span>
M75 Sport Watch
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Now Only</span> $320.99</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>


<div class="single-slider" style="background-image: url(<?=assets('website/assets/images/hero/slider-bg2.jpg')?>);">
<div class="content">
<h2><span>Big Sale Offer</span>
Get the Best Deal on CCTV Camera
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Combo Only:</span> $590.00</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>

</div>

</div>
</div>
<div class="col-lg-4 col-12">
<div class="row">
<div class="col-lg-12 col-md-6 col-12 md-custom-padding">

<div class="hero-small-banner" style="background-image: url(<?=assets('website/assets/images/hero/slider-bnr.jpg')?>);">
<div class="content">
<h2>
<span>New line required</span>
iPhone 12 Pro Max
</h2>
<h3>$259.99</h3>
</div>
</div>

</div>
<div class="col-lg-12 col-md-6 col-12">

<div class="hero-small-banner style2">
<div class="content">
<h2>Weekly Sale!</h2>
 <p>Saving up to 50% off all online store items this week.</p>
<div class="button">
<a class="btn" href="product-grids.html">Shop Now</a>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>


<div class="breadcrumbs">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title">Shop Grid</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <ul class="breadcrumb-nav">
          <li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
          <li><a href="javascript:void(0)">Shop</a></li>
          <li>Shop Grid</li>
        </ul>
      </div>
    </div>
  </div>
</div>


<section class="product-grids section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div class="product-grids-head">
          <div class="product-grid-topbar">
            <div class="row align-items-center">
              <div class="col-lg-7 col-md-8 col-12">
                <div class="product-sorting">
                  <label for="sorting">Sort by:</label>
                  <select class="form-control" id="sorting">
                    <option>Popularity</option>
                    <option>Low - High Price</option>
                    <option>High - Low Price</option>
                    <option>Average Rating</option>
                    <option>A - Z Order</option>
                    <option>Z - A Order</option>
                  </select>
                  <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                </div>
              </div>
              <div class="col-lg-5 col-md-4 col-12">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
              <div class="row">
                <div class="row" id="products-container">
                <?php 
                  if(!empty($products)) : 
                    foreach($products as $product) :
                ?>
                <div class="col-lg-3 col-md-6 col-12">
                  <div class="single-product">
                    <div class="product-image">
                      <img src=<?=assets("img/".$product['photos'][0]['photo'])?> alt="#" style="height:250px">
                      <div class="button">
                        <a href="/Products/productDetails/<?=$product['product']['id']?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <span class="category"><?=$product['product']['categorie']?></span>
                      <h4 class="title">
                        <a href="/Products/productDetails/<?=$product['product']['id']?>"><?=$product['product']['name']?></a>
                      </h4>
                      <ul class="review">
                         <li><i class="lni lni-star<?=($product['product']['rate'] >= 1) ? "-filled" : "" ?>"></i></li>
                         <li><i class="lni lni-star<?=($product['product']['rate'] >= 2) ? "-filled" : "" ?>"></i></li>
                         <li><i class="lni lni-star<?=($product['product']['rate'] >= 3) ? "-filled" : "" ?>"></i></li>
                         <li><i class="lni lni-star<?=($product['product']['rate'] >= 4) ? "-filled" : "" ?>"></i></li>
                         <li><i class="lni lni-star<?=($product['product']['rate'] == 5) ? "-filled" : "" ?>"></i></li>
                         <li><span><?=$product['product']['count']?> Review(s)</span></li>
                       </ul>
                       <div class="price">
                        <span>$<?=$product['product']['price']?></span>
                        <span class="discount-price"><?= ($product['product']['sale'] != 0 ) ? "$".($product['product']['price'] - $product['product']['sale']) : "" ?></span>
                      </div>
                      <div class="row justify-content-between">
                        <div class="col-sm-12">Your Review</div>
                        <div class="starscounter col-sm-6">
                          <ul class="review stars" countrev="<?=$product['product']['count']?>">
                            <li class="rate" rate="1" product="<?=$product['product']['id']?>" ><i class="lni lni-star"></i></li>
                            <li class="rate" rate="2" product="<?=$product['product']['id']?>" ><i class="lni lni-star"></i></li>
                            <li class="rate" rate="3" product="<?=$product['product']['id']?>" ><i class="lni lni-star"></i></li>
                            <li class="rate" rate="4" product="<?=$product['product']['id']?>" ><i class="lni lni-star"></i></li>
                            <li class="rate" rate="5" product="<?=$product['product']['id']?>" ><i class="lni lni-star"></i></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                    endforeach;
                  endif;
                ?>
                </div>
                <div class="row justify-content-center">
                  <div class="col-3">
                    <div class="pagination left">
                      <ul class="pagination-list">
                      <?php 
                            if($count > 0) :
                              for($i =0;$i<ceil($count/10);$i++) :
                          ?>
                          <li class=""><a href="javascript:void(0)" class="gridorder" order="0<?=$i?>"><?=$i+1?></a></li>
                          <?php 
                            endfor;
                          endif;
                          ?>
                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li> 
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="banner section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner" style="background-image:url(<?=assets("website/assets/images/banner/banner-1-bg.jpg")?>)">
<div class="content">
<h2>Smart Watch 2.0</h2>
<p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
<div class="button">
<a href="product-grids.html" class="btn">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner custom-responsive-margin" style="background-image:url('<?=assets('website/assets/images/banner/banner-2-bg.jpg')?>')">
<div class="content">
<h2>Smart Headphone</h2>
<p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
incididunt ut labore.</p>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="special-offer section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Special Offer</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-md-12 col-12">
<div class="row">
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src=<?=assets("website/assets/images/products/product-3.jpg")?> alt="#">

<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Camera</span>
<h4 class="title">
<a href="product-grids.html">WiFi Security Camera</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$399.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src=<?=assets("website/assets/images/products/product-8.jpg")?> alt="#">

<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Laptop</span>
<h4 class="title">
<a href="product-grids.html">Apple MacBook Air</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$899.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src=<?=assets("website/assets/images/products/product-6.jpg")?> alt="#">

<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Speaker</span>
<h4 class="title">
<a href="product-grids.html">Bluetooth Speaker</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star"></i></li>
<li><span>4.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$70.00</span>
</div>
</div>
</div>

</div>
</div>

<div class="single-banner right" style="background-image:url(<?=assets("website/assets/images/banner/banner-3-bg.jpg")?>);margin-top: 30px;">
<div class="content">
<h2>Samsung Notebook 9 </h2>
<p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
incididunt ut labore.</p>
<div class="price">
<span>$590.00</span>
</div>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-12 col-12">
<div class="offer-content">
<div class="image">
<img src=<?=assets("website/assets/images/offer/offer-image.jpg")?> alt="#">

<span class="sale-tag">-50%</span>
</div>
<div class="text">
<h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$200.00</span>
<span class="discount-price">$400.00</span>
</div>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
eiusmod tempor labores.</p>
</div>
<div class="box-head">
<div class="box">
<h1 id="days">000</h1>
<h2 id="daystxt">Days</h2>
</div>
<div class="box">
<h1 id="hours">00</h1>
<h2 id="hourstxt">Hours</h2>
</div>
<div class="box">
<h1 id="minutes">00</h1>
<h2 id="minutestxt">Minutes</h2>
</div>
<div class="box">
<h1 id="seconds">00</h1>
<h2 id="secondstxt">Secondes</h2>
</div>
</div>
<div style="background: rgb(204, 24, 24);" class="alert">
<h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="home-product-list section">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">Best Sellers</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html">
<img src=<?=assets("website/assets/images/home-product-list/01.jpg")?> alt="#">
</a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">GoPro Hero4 Silver</a>
</h3>
<span>$287.99</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html">
    <img src=<?=assets("website/assets/images/home-product-list/02.jpg")?> alt="#">

</a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Puro Sound Labs BT2200</a>
</h3>
<span>$95.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/03.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">HP OfficeJet Pro 8710</a>
</h3>
<span>$120.00</span>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">New Arrivals</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/04.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">iPhone X 256 GB Space Gray</a>
</h3>
<span>$1150.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/05.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
</h3>
<span>$950.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/06.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Microsoft Xbox One S</a>
</h3>
<span>$298.00</span>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">
<h4 class="list-title">Top Rated</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/07.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Samsung Gear 360 VR Camera</a>
</h3>
<span>$68.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/08.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
</h3>
<span>$840.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src=<?=assets("website/assets/images/home-product-list/09.jpg")?> alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Zeus Bluetooth Headphones</a>
</h3>
<span>$28.00</span>
</div>
</div>

</div>
</div>
</div>
</section>


<div class="brands">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-12 col-12">
<h2 class="title">Popular Brands</h2>
</div>
</div>
<div class="brands-logo-wrapper">
<div class="brands-logo-carousel d-flex align-items-center justify-content-between">
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/01.png")?> alt="#">
</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/02.png")?> alt="#">

</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/03.png")?> alt="#">

</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/04.png")?> alt="#">

</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/05.png")?> alt="#">

</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/06.png")?> alt="#">

</div>
<div class="brand-logo">
    <img src=<?=assets("website/assets/images/brands/03.png")?> alt="#">

</div>
<div class="brand-logo">
<img src=<?=assets("website/assets/images/bbrands/04.png")?> alt="#">
 
</div>
</div>
</div>
</div>
</div>


<section class="blog-section section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Our Latest News</h2>
<p>There are many variations of passages of Lorem
Ipsum available, but the majority have suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">

<img src=<?=assets("website/assets/images/blog/blog-1.jpg")?> alt="#">

</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">eCommerce</a>
<h4>
<a href="blog-single-sidebar.html">What information is needed for shipping?</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
<div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">
<img src=<?=assets("website/assets/images/blog/blog-2.jpg")?> alt="#">

</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">Gaming</a>
<h4>
<a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
<div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">
<img src=<?=assets("website/assets/images/blog/blog-3.jpg")?> alt="#">
</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">Electronic</a>
<h4>
<a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
 <div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


<section class="shipping-info">
<div class="container">
<ul>

<li>
<div class="media-icon">
<i class="lni lni-delivery"></i>
</div>
<div class="media-body">
<h5>Free Shipping</h5>
<span>On order over $99</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-support"></i>
</div>
<div class="media-body">
<h5>24/7 Support.</h5>
<span>Live Chat Or Call.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-credit-cards"></i>
</div>
<div class="media-body">
<h5>Online Payment.</h5>
<span>Secure Payment Services.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-reload"></i>
</div>
<div class="media-body">
<h5>Easy Return.</h5>
<span>Hassle Free Shopping.</span>
</div>
</li>
</ul>
</div>
</section>


<footer class="footer">

<div class="footer-top">
<div class="container">
<div class="inner-content">
<div class="row">
<div class="col-lg-3 col-md-4 col-12">
<div class="footer-logo">
<a href="index-2.html">
<img src=<?=assets("website/assets/images/logo/white-logo.svg")?> alt="#">

</a>
</div>
</div>
<div class="col-lg-9 col-md-8 col-12">
<div class="footer-newsletter">
<h4 class="title">
Subscribe to our Newsletter
<span>Get all the latest information, Sales and Offers.</span>
</h4>
<div class="newsletter-form-head">
<form action="#" method="get" target="_blank" class="newsletter-form">
<input name="EMAIL" placeholder="Email address here..." type="email">
<div class="button">
<button class="btn">Subscribe<span class="dir-part"></span></button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="footer-middle">
<div class="container">
 <div class="bottom-inner">
<div class="row">
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-contact">
<h3>Get In Touch With Us</h3>
<p class="phone">Phone: +1 (900) 33 169 7720</p>
<ul>
<li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
<li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
</ul>
<p class="mail">
<a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#087b7d7878677a7c487b6067786f7a616c7b266b6765"><span class="__cf_email__" data-cfemail="90e3e5e0e0ffe2e4d0e3f8ffe0f7e2f9f4e3bef3fffd">[email&#160;protected]</span></a>
</p>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer our-app">
<h3>Our Mobile App</h3>
<ul class="app-btn">
<li>
<a href="javascript:void(0)">
<i class="lni lni-apple"></i>
<span class="small-title">Download on the</span>
<span class="big-title">App Store</span>
</a>
</li>
<li>
<a href="javascript:void(0)">
<i class="lni lni-play-store"></i>
<span class="small-title">Download on the</span>
<span class="big-title">Google Play</span>
</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-link">
<h3>Information</h3>
<ul>
<li><a href="javascript:void(0)">About Us</a></li>
<li><a href="javascript:void(0)">Contact Us</a></li>
<li><a href="javascript:void(0)">Downloads</a></li>
<li><a href="javascript:void(0)">Sitemap</a></li>
<li><a href="javascript:void(0)">FAQs Page</a></li>
</ul>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-footer f-link">
<h3>Shop Departments</h3>
<ul>
<li><a href="javascript:void(0)">Computers & Accessories</a></li>
<li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
<li><a href="javascript:void(0)">TV, Video & Audio</a></li>
<li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
<li><a href="javascript:void(0)">Headphones</a></li>
</ul>
</div>
 
</div>
</div>
</div>
</div>
</div>


<div class="footer-bottom">
<div class="container">
<div class="inner-content">
<div class="row align-items-center">
<div class="col-lg-4 col-12">
<div class="payment-gateway">
<span>We Accept:</span>
<img src=<?=assets("website/assets/images/footer/credit-cards-footer.png")?> alt="#">

</div>
</div>
<div class="col-lg-4 col-12">
<div class="copyright">
<p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow" target="_blank">GrayGrids</a></p>
</div>
</div>
<div class="col-lg-4 col-12">
<ul class="socila">
<li>
<span>Follow Us On:</span>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
<li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

</footer>


<a href="#" class="scroll-top">
<i class="lni lni-chevron-up"></i>
</a>

<?php include "inc/footer.php" ?>
<script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });

    </script>
<script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
</script>

  <script>
    // get products by order
    gridorder = document.getElementsByClassName('gridorder')
    listorder = document.getElementsByClassName('listorder')
    productscontainer = document.getElementById('products-container')
    productslistcontainer = document.getElementById('products-list-container')
    
    function orderclick(order){
      order.addEventListener('click',()=>{
        $.post('/ajaxController/orderProducts/0/0/0/'+order.getAttribute('order'),{ 
        },function(data){
          data = data.split('{{split}}')
          productscontainer.innerHTML = data[0]
        })
      })
    }
    for(var i = 0; i < gridorder.length ;i++ ){
      orderclick(gridorder[i])
    }

// ////////////////////
    // rate
    star = document.getElementsByClassName('rate');
    review = document.getElementsByClassName('stars');
    starscounter = document.getElementsByClassName('starscounter');
    function addRate(starj,reviewj,starscounterj){
      starj.addEventListener('click',()=>{
        console.log(reviewj)
        count   = reviewj.getAttribute('countrev')
        rate    = starj.getAttribute('rate')
        product = starj.getAttribute('product')

        $.post('/ajaxController/addRate/'+rate+'/'+product+'/'+count,{ 
        },function(data){
          starscounterj.innerHTML= data
          for(var i = 0 ; i<star.length;i++){
            addRate(star[i],review[Math.floor(i/5)],starscounter[Math.floor(i/5)])
          }
        })
      })
    }
    for(var i = 0 ; i<star.length;i++){
      addRate(star[i],review[Math.floor(i/5)],starscounter[Math.floor(i/5)])
    }
// ////////////////


  </script>

</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:51 GMT -->
</html>