<?php include "inc/header.php" ?>


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
      <div class="col-lg-3 col-12">
        <div class="product-sidebar">
          <div class="single-widget search">
            <h3>Search Product</h3>
            <form action="#">
              <input type="text" placeholder="Search Here...">
              <button type="submit"><i class="lni lni-search-alt"></i></button>
            </form>
          </div>
          <div class="single-widget">
            <h3>All Categories</h3>
            <ul class="list">
              <?php 
                if(!empty($header['categories'])) : 
                  foreach($header['categories'] as $categorie) :
              ?>
              <li>
                <a href="/Products/productsByCat/<?=$categorie['id']?>/00" ><?=$categorie['name']?></a>
              </li>
              <?php 
                  endforeach;
                endif;
              ?>
            </ul>
          </div>
          <div class="single-widget range">
            <h3>Price Range</h3>
            <input type="range" class="form-range" name="range" step="1" min="100" max="10000" value="10" onchange="rangePrimary.value=value">
            <div class="range-inner">
              <label>$</label>
              <input type="text" id="rangePrimary" placeholder="100" />
            </div>
          </div>
           
          <?php if(!empty($sections)) : ?>
          <div class="single-widget">
            <h3>All Sections</h3>
            <ul class="list">
              <?php foreach($sections as $section) : ?>
              <li>
                <a href="/Products/productsBySec/<?=$section['categorie']."/".$section['id']?>/00" ><?=$section['name']?></a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif ?>
          <?php if(!empty($brands)) : ?>
          <div class="single-widget">
            <h3>All Brands</h3>
            <ul class="list">
              <?php foreach($brands as $brand) : ?>
              <li>
                <a href="/Products/productsByBrand/<?=$brand['categorie']."/".$brand['section']."/".$brand['id']?>/00" ><?=$brand['name']?></a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <?php endif ?>
        </div>
      </div>
      <div class="col-lg-9 col-12">
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
                <div class="col-lg-4 col-md-6 col-12">
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
                        <li><i class="lni lni-star<?=($product['product']['rate'] >= 5) ? "-filled" : "" ?>"></i></li>
                        <li><span><?=$product['product']['count']?> Review(s)</span></li>
                      </ul>
                      <div class="price">
                        <span>$<?=$product['product']['price']?></span>
                        <span class="discount-price"><?= ($product['product']['sale'] != 0 ) ? "$".($product['product']['price'] - $product['product']['sale']) : "" ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                    endforeach;
                  endif;
                ?>
                </div>
                <div class="row">
                  <div class="col-12">
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
            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
              <div class="row">
               <div class="row" id="products-list-container">
                  <?php 
                    if(!empty($products)) : 
                      foreach($products as $product) :
                  ?>
                  <div class="col-lg-12 col-md-12 col-12">
                    <div class="single-product">
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class="product-image">
                            <img src="<?=assets("img/".$product['photos'][0]['photo'])?>" style="height:250px" alt="#">
                            <div class="button">
                              <a href="/Products/productDetails/<?=$product['product']['id']?>" class="btn"><i class="lni lni-cart"></i> Add to
                              Cart</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
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
                              <li><i class="lni lni-star<?=($product['product']['rate'] >= 5) ? "-filled" : "" ?>"></i></li>
                              <li><span><?=$product['product']['count']?> Review(s)</span></li>
                            </ul>
                            <div class="price">
                              <span>$<?=$product['product']['price']?></span>
                              <span class="discount-price"><?= ($product['product']['sale'] != 0 ) ? "$".($product['product']['price'] - $product['product']['sale']) : "" ?></span>
                            </div>
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
                <div class="row">
                  <div class="col-12">
                    <div class="pagination left">
                      <ul class="pagination-list">
                        <!-- <li><a href="javascript:void(0)" order="0">1</a></li> -->
                          <?php 
                            if($count > 0) :
                              for($i =0;$i<ceil($count/10);$i++) :
                          ?>
                          <li class=""><a href="javascript:void(0)" class="listorder" order="<?=$i?>"><?=$i+1?></a></li>
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


<footer class="footer">

  <div class="footer-top">
  <div class="container">
  <div class="inner-content">
  <div class="row">
  <div class="col-lg-3 col-md-4 col-12">
  <div class="footer-logo">
  <a href="index-2.html">
  <img src="assets/images/logo/white-logo.svg" alt="#">
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
  <a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#1d6e686d6d726f695d6e75726d7a6f74796e337e7270"><span class="__cf_email__" data-cfemail="ee9d9b9e9e819c9aae9d86819e899c878a9dc08d8183">[email&#160;protected]</span></a>
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
  <img src="assets/images/footer/credit-cards-footer.png" alt="#">
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


<?=
 "
  <script>
    gridorder = document.getElementsByClassName('gridorder')
    listorder = document.getElementsByClassName('listorder')
    productscontainer = document.getElementById('products-container')
    productslistcontainer = document.getElementById('products-list-container')
    
    function orderclick(order){
      order.addEventListener('click',()=>{
        $.post('/ajaxController/".$offsetwhere."/'+order.getAttribute('order'),{ 
        },function(data){
          data = data.split('{{split}}')
          productscontainer.innerHTML = data[0]
          productslistcontainer.innerHTML = data[1]
        })
      })
    }
    for(var i = 0; i < gridorder.length ;i++ ){
      orderclick(gridorder[i])
    }
    for(var i = 0; i < gridorder.length ;i++ ){
      orderclick(listorder[i])
    }
  </script>
 "
?>
<?php include "inc/footer.php" ?>

</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/product-grids.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:36:05 GMT -->
</html>