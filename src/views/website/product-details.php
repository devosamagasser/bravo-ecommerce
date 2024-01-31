<?php include "inc/header.php" ?>


<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Single Product</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
<li><a href="index-2.html">Shop</a></li>
<li>Single Product</li>
</ul>
</div>
</div>
</div>
</div>


<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src=<?=assets('img/'.$products['photos'][0]['photo'])?> id="current" alt="#" style="height:450px">
                            </div>
                            <div class="images">
                                <?php 
                                    if(!empty($products['photos'])) :
                                        foreach($products['photos'] as $photo) :
                                ?>
                                <img src=<?=assets('img/'.$photo['photo'])?> class="img" alt="#" style="height:150px">
                                <?php 
                                        endforeach;
                                    endif;
                                ?>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title"><?=$products['product']['name']?></h2>
                        <p class="category">
                            <i class="lni lni-tag"></i> 
                            <?=(isset($products['product']['categorie'])) ? $products['product']['categorie'].':' : '' ?><a href="javascript:void(0)"><?=(isset($products['product']['section'])) ? $products['product']['section'] : '' ?>   <?=(isset($products['product']['brand'])) ? " : ".$products['product']['brand'] : '' ?></a>
                        </p>
                        <h3 class="price">$<?=($products['product']['sale'] > 0 ) ?$products['product']['price'] - $products['product']['sale'] : $products['product']['price']?>
                            <span>
                                <?=($products['product']['sale'] == 0 ) ? "" : $products['product']['price'] ?>
                            </span>
                        </h3>
                        <p class="info-text"><?=$products['product']['descrip']?></p>
                        <div class="row">
                            <!-- <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group color-option">
                                    <label class="title-label" for="size">Choose color</label>
                                        <div class="single-checkbox checkbox-style-1">
                                            <input type="radio" style="background-color: red;"  checked>
                                            <label for="checkbox-1"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-2">
                                            <input type="radio" style="background-color: red;" >
                                            <label for="checkbox-2"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="radio" style="background-color: red;" >
                                            <label for="checkbox-3"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-4">
                                            <input type="radio" style="background-color: red;" >
                                            <label for="checkbox-4"><span></span></label>
                                        </div>
                                    </div>
                                </div> -->
                                            <?php 
                                                if(!empty($products['quantity'][0]['color_id'])) :
                                            ?>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">colors</label>
                                        <select class="form-control" id="color">
                                            <?php 
                                                foreach($products['quantity'] as $quan) :
                                            ?>
                                            <option value="<?=$quan['color_id']?>" quantity="<?=$quan['quantity']?>"  style="font-size:20px;border:1px solid black;background-color:<?=$quan['code']?>;color:white"><?=$quan['color']?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                            <?php
                                                endif;
                                            ?>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="quantity">Quantity</label>
                                            <?php
                                                if(empty($products['quantity'][0])) :
                                                    $count = $products['product']['quantity'];
                                                else :
                                                    $count = $products['quantity'][0]['quantity'];
                                                endif
                                            ?>
                                            <div id="quan_select">
                                                <select class="form-control" id="quantity" count='<?=$count?>'>
                                                    <?php for($i=1;$i<=$count;$i++) : ?>
                                                        <option value="<?=$i?>"><?=$i?></option>
                                                        <?php endfor ?>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <a <?=(empty($header['clintData'])) ? 'href ="/home/signIn" ' : 'id="addtocart" proId="'.$products['product']['id'].'" price="'.$products['product']['price']-$products['product']['sale'].'"'?> style="width: 100%;">
                                                <button class="btn"  >Add to Cart</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <a <?=(empty($header['clintData'])) ? 'href ="/home/signIn" ' : 'id="addtowishlist" proId="'.$products['product']['id'].'"'?> style="width: 100%;">
                                                <button class="btn"><i class="lni lni-heart" id="wishlistheart"></i> <span id="wishstate" state="<?=$products['favourite']?>">Add To</span> Wishlist</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>
                                    <?=$products['product']['descrip']?>
                                </p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <?php 
                                        if(!empty($products['features'])) :
                                            foreach($products['features'] as $feature) :
                                    ?>
                                        <li><?=$feature['feature']?></li>
                                    <?php 
                                            endforeach;
                                        endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                                <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">
                            <h4><?=$products['product']['rate']?> (Overall)</h4>
                            <ul>
                                <li>
                                    <span>5 stars - <?=$products['reviews_details'][4] ?></span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                </li>
                                <li>
                                    <span>4 stars - <?=$products['reviews_details'][3] ?></span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>3 stars - <?=$products['reviews_details'][2] ?></span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>2 stars - <?=$products['reviews_details'][1] ?></span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                                <li>
                                    <span>1 star - <?=$products['reviews_details'][0] ?></span>
                                    <i class="lni lni-star-filled"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                    <i class="lni lni-star"></i>
                                </li>
                            </ul>
                            <?php if(!empty($header['clintData'])) : ?>
                            <button type="button" class="btn review-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Leave a Review
                            </button>
                            <?php else : ?>
                                <a href="/home/signin" class="btn review-btn" >
                                Leave a Review
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">Latest Reviews</h4>
                                <?php 
                                    if(!empty($products['reviews'])) :
                                        foreach($products['reviews'] as $review) :
                                 ?>
                                <div class="single-review">
                                    <img src=<?=assets('website/assets/images/blog/comment1.jpg')?> alt="#">
                                    <div class="review-info">
                                        <h4><?=$review['customer']?>
                                        <span>
                                        </span>
                                        </h4>
                                        <ul class="stars">
                                            <li><i class="lni lni-star<?=($review['rate'] >= 1) ? "-filled" : ""?>"></i></li>
                                            <li><i class="lni lni-star<?=($review['rate'] >= 2) ? "-filled" : ""?>"></i></li>
                                            <li><i class="lni lni-star<?=($review['rate'] >= 3) ? "-filled" : ""?>"></i></li>
                                            <li><i class="lni lni-star<?=($review['rate'] >= 4) ? "-filled" : ""?>"></i></li>
                                            <li><i class="lni lni-star<?=($review['rate'] == 5) ? "-filled" : ""?>"></i></li>
                                        </ul>
                                        <p><?=$review['comment']?></p>
                                    </div>
                                </div>
                                <?php endforeach;endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Products/addReview/<?=$products['product']['id']?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" id="review-rating" name="rate">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" id="review-message" rows="8" name="comment" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
<a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#790a0c0909160b0d390a1116091e0b101d0a571a1614"><span class="__cf_email__" data-cfemail="4e3d3b3e3e213c3a0e3d26213e293c272a3d602d2123">[email&#160;protected]</span></a>
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

<?=include "inc/footer.php"?>
<!-- <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script> -->
    <script>

        // add to cart settings 

        addToCart = document.getElementById('addtocart')
        if(addToCart){
            quantity = document.getElementById("quantity")
            color    = document.getElementById("color")
            addToCart.addEventListener('click',()=>{
                let prodId = addToCart.getAttribute('proId')
                let price  = addToCart.getAttribute('price')
                let quan   = quantity.value
                if(color){
                    url = "/ajaxController/addToCart/"+prodId+"/"+quan+"/"+price+"/"+color.value
                }else{
                    url = "/ajaxController/addToCart/"+prodId+"/"+quan+"/"+price+"/"
                }
                $.post(url,{ 
                    count : quantity.getAttribute('count')
                },function(data){
                })
            })
        }
        quan_select = document.getElementById('quan_select')
        if(color){
            color.addEventListener('change',()=>{
                quan = color.options[color.selectedIndex].getAttribute("quantity")
                $.post("/ajaxController/colorQuan/"+quan,{ 
                },function(data){
                    quan_select.innerHTML = data
                    quantity = document.getElementById("quantity")
                    console.log(quantity.getAttribute('count'))
                })
                
            })
        }

        // add to wish list settings
        addEventListener('load',()=>{

            addtowishlist = document.getElementById('addtowishlist')
            if(addtowishlist){

            wishstate     = document.getElementById('wishstate')
            state     = wishstate.getAttribute('state')
            prodId = addtowishlist.getAttribute('proId')
            if(state == "0"){
                wishstate.innerHTML = "Add To"
            }else{
                wishstate.innerHTML = "In"
            }
            addtowishlist.addEventListener('click',()=> {
                $.post("/ajaxController/addtowishlist/"+prodId,{ 
                },function(data){
                    if(state == "0"){
                        wishstate.setAttribute('state','1');
                        wishstate.innerHTML = "In"
                    }else{
                        wishstate.setAttribute('state','0') ;
                        wishstate.innerHTML = "Add To"
                    }
                })
            })
        }

        })
        
    </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:36:03 GMT -->
</html>