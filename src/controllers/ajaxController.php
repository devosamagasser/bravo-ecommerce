<?php
namespace Bravo\Store\controllers;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\CartModel;
use Bravo\Store\models\ReviewsModel;
use Bravo\Store\controllers\Products;
use Bravo\Store\models\WishListModel;

    class ajaxController
    {
        public function addToCart($proId,$quan,$price,$color)
        {
            try{
                $proId  = registry::get('validation')->set('product',$proId)->fInteger()->get();
                $quan   = registry::get('validation')->set('quantity',$quan)->fInteger()->get();
                $color  = (!empty($color)) ? registry::get('validation')->set('color',$color)->fInteger()->get() : NULL;
                $price  = registry::get('validation')->set('price',$price)->fInteger()->get();
                $count  = registry::get('validation')->set('count',$_POST['count'])->fInteger()->get();
                CartModel::add($proId,registry::get('session')->clintdata['id'],$quan,$color,$price,$count);
            }catch(Exception $e){

            }
        }

        public function addtowishlist($proId)
        {
            try{
                $proId  = registry::get('validation')->set('product',$proId)->fInteger()->get();
                WishListModel::add(registry::get('session')->clintdata['id'],$proId);
            }catch(Exception $e){

            }
        }
        
        public function colorQuan($quantity)
        {
          try{
            $quantity = registry::get('validation')->set('quantity',$quantity)->fInteger()->get();
            ?>          
            <select class="form-control" id="quantity" count='<?=$quantity?>'>
            <?php for($i=1;$i<=$quantity;$i++) :?>
              <option value="<?=$i?>"><?=$i?></option>
            <?php endfor ?>
            </select>
            <?php
            
          }catch(Exception $e){

          }
        }

        public function orderProducts($cat,$sec,$brand,$offset)
        {
            $cat   = ($cat == 0)   ? "" : $cat; 
            $sec   = ($sec == 0)   ? "" : $sec; 
            $brand = ($brand == 0) ? "" : $brand; 
            $data  = (new Products)->allProduct($offset,$cat,$sec,$brand); 
            if(!empty($data[0])) : 
              foreach($data[0] as $product) :
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
            echo "{{split}}";
            if(!empty($data[0])) : 
                foreach($data[0] as $product) :
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
        }

        public function search($keyword,$categorie)
        {
          $products = (new Products)->search($keyword,$categorie,0,5);
          if(!empty($products[0])) : 
            foreach($products[0] as $product) :
          ?>
          <div class="col-lg-12 col-md-12 col-12 ">
            <div class="single-product">
              <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="product-image">
                    <img src="<?=assets("img/".$product['photos'][0]['photo'])?>" style="height:150px" alt="#">
                    <div class="button">
                      <a href="/Products/productDetails/<?=$product['product']['id']?>" class="btn"><i class="lni lni-cart"></i> Add to
                      Cart</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-8">
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
        }

        public function orderSearch($key,$cat,$offset)
        {
            $data  = (new Products)->search($key,$cat,$offset,10); 
            if(!empty($data[0])) : 
              foreach($data[0] as $product) :
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
            echo "{{split}}";
            if(!empty($data[0])) : 
                foreach($data[0] as $product) :
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
        }

        public function changeQuantity($cartid,$quantity)
        {
          try{
            $cartid  = registry::get('validation')->set('cart',$cartid)->fInteger()->get();
            $quantity = registry::get('validation')->set('quantity',$quantity)->fInteger()->get();
            CartModel::updateById($cartid,$quantity);
          }catch(Exception $e){

          }
        }

        public function addRate($rate,$product,$count){
          if(isset(registry::get('session')->clintdata)){
            try{
              $product = registry::get('validation')->set('id',$product)->fInteger()->get();
              $rate = registry::get('validation')->set('rate',$rate)->fInteger()->get();
              $statue = ReviewsModel::add(registry::get('session')->clintdata['id'],$product,$rate,"");
              ?>
              <ul class="review stars" countrev="<?= ($statue)==1 ? $count+1 : $count ?>">
                <li class="rate" rate="1" product="<?=$product?>" ><i class="lni lni-star<?=($rate >= 1) ? "-filled" : "" ?>"></i></li>
                <li class="rate" rate="2" product="<?=$product?>" ><i class="lni lni-star<?=($rate >= 2) ? "-filled" : "" ?>"></i></li>
                <li class="rate" rate="3" product="<?=$product?>" ><i class="lni lni-star<?=($rate >= 3) ? "-filled" : "" ?>"></i></li>
                <li class="rate" rate="4" product="<?=$product?>" ><i class="lni lni-star<?=($rate >= 4) ? "-filled" : "" ?>"></i></li>
                <li class="rate" rate="5" product="<?=$product?>" ><i class="lni lni-star<?=($rate == 5) ? "-filled" : "" ?>"></i></li>
              </ul>
              <?php

            }catch(Exception $e){
            }
          }
        }
    }