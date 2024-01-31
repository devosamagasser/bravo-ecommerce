<?php
namespace Bravo\Store\controllers;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\BrandsModel;
use Bravo\Store\models\FeaturesModel;
use Bravo\Store\models\ProductsModel;
use Bravo\Store\models\QuantityModel;
use Bravo\Store\models\SectionsModel;
use Bravo\Store\models\WishListModel;
use Bravo\Store\models\ProductsPhotosModel;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\ReviewsModel;

    class Products extends AbstractController
    {
        public function index($offset = 0)
        {
            try{
                    $offset = registry::get('validation')->set('offset',$offset)->fInteger()->get();
                    $products_info = $this->allProduct($offset);
                    $data = [
                    'products'   => $products_info[0],
                    'count'      => $products_info[1]
                ];
                $this->view("website/product-grids",$data);
            }catch(exception $e){
                redirect('/');die;
            }
        }

        public function allProduct($offset,$cat ='',$sec='',$brand = '')
        {
            try{
                $data = ProductsModel::getLimitid($offset,$cat,$sec,$brand);    
                $products = [];
                if(!empty($data[0])) :
                    foreach($data[0] as $product) : 
                        $products[] = [
                            'product' => $product,
                            'photos'  => ProductsPhotosModel::getWhere($product['id']),
                        ];
                    endforeach;
                endif;
                return [$products,$data[1]];
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        private function singleProduct($id)
        {
            try{

                $data = isset(registry::get('session')->clintdata) ? WishListModel::getRow(registry::get('session')->clintdata['id'],$id) : "";
                $allReviews = ReviewsModel::getWhere('id',$id);
                $reviews = (!empty($allReviews)) ? 
                [
                    ReviewsModel::getCounts('rate','1',$id) ? ReviewsModel::getCounts('rate','1',$id) : 0,
                    ReviewsModel::getCounts('rate','2',$id) ? ReviewsModel::getCounts('rate','2',$id) : 0,
                    ReviewsModel::getCounts('rate','3',$id) ? ReviewsModel::getCounts('rate','3',$id) : 0,
                    ReviewsModel::getCounts('rate','4',$id) ? ReviewsModel::getCounts('rate','4',$id) : 0,
                    ReviewsModel::getCounts('rate','5',$id) ? ReviewsModel::getCounts('rate','5',$id) : 0
                ] : [0,0,0,0,0] ;
                $data = [
                    'product'  => ProductsModel::getRow('id',$id),
                    'photos'   => ProductsPhotosModel::getWhere($id),
                    'favourite'=> (!empty($data)) ? 1 : 0 , 
                    'features' => FeaturesModel::getRow('product',$id),
                    'quantity' => QuantityModel::getRow('product',$id),
                    'reviews'  => $allReviews,
                    'reviews_details' => $reviews
                ];
                // print_r($data['reviews']);die;
                return $data;
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }        
        }

        public function productDetails($id)
        {                
            try{
                $id = registry::get('validation')->set('id',$id)->fInteger()->get();
                $data = [
                    'products'   => $this->singleProduct($id),
                ];
                $this->view("website/product-details",$data);
            }catch(exception $e){
                redirect('/');die;
            }
        }
        
        public function productsByCat($catId,$offset)
        {
            try{
                $catId = registry::get('validation')->set('category',$catId)->fInteger()->get();
                $offset = registry::get('validation')->set('offset',$offset)->fInteger()->get();
                $products_info = $this->allProduct($offset,$catId);
                $data = [
                    'products'   => $products_info[0],
                    'count'      => $products_info[1],
                    'sections'   => SectionsModel::getWhere('categorie',$catId),
                    'offsetwhere'=> "orderProducts/$catId/0/0"
                ];
                $this->view("website/product-grids",$data);
            }catch(exception $e){
                redirect('/');die;
            }
        }
        
        public function productsBySec($catId,$secid,$offset)
        {
        
            try{
                $catId  = registry::get('validation')->set('category',$catId)->fInteger()->get();
                $secid  = registry::get('validation')->set('section',$secid)->fInteger()->get();
                $offset = registry::get('validation')->set('offset',$offset)->fInteger()->get();
                $products_info = $this->allProduct($offset,$catId,$secid);
                $data = [
                    'products'   => $products_info[0],
                    'count'      => $products_info[1],
                    'sections'   => SectionsModel::getWhere('categorie',$catId),
                    'brands'     => BrandsModel::getWhere('section',$secid),
                    'offsetwhere'=> "orderProducts/$catId/$secid/0"
                ];
                $this->view("website/product-grids",$data);
            }catch(Exception $e){
                redirect('/');die;
            }
        }

        public function productsByBrand($catId,$secid,$brandId,$offset)
        {
            try{
                $catId   = registry::get('validation')->set('category',$catId)->fInteger()->get();
                $secid   = registry::get('validation')->set('section',$secid)->fInteger()->get();
                $brandId = registry::get('validation')->set('brand',$brandId)->fInteger()->get();
                $offset  = registry::get('validation')->set('offset',$offset)->fInteger()->get();
                $products_info = $this->allProduct($offset,$catId,$secid,$brandId);
                $data = [
                    'products'   => $products_info[0],
                    'count'      => $products_info[1],
                    'sections'   => SectionsModel::getWhere('categorie',$catId),
                    'brands'     => BrandsModel::getWhere('section',$secid),
                    'offsetwhere'=> "orderProducts/$catId/$secid/$brandId"
                ];
                $this->view("website/product-grids",$data);
            }catch(Exception $e){
                redirect('/');die;
            }
        }

        public function search($keyword,$categorie,$offset,$limit)
        {
            try{
                $data = ProductsModel::search($keyword,$categorie,$offset,$limit);    
                $products = [];
                if(!empty($data[0])) :
                    foreach($data[0] as $product) : 
                        $products[] = [
                            'product' => $product,
                            'photos'  => ProductsPhotosModel::getWhere($product['id']),
                        ];
                    endforeach;
                endif;
                return [$products,$data[1]];
            }catch(Exception $e){
                redirect('/');die;
            }
        }
        public function searchView($offset)
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['key']) && isset($_POST['cat']))
                {
                    try{
                        $offset = registry::get('validation')->set('offset',$offset)->fInteger()->get();
                        $key    = registry::get('validation')->set('key',$_POST['key'])->fString()->get();
                        $cat    = registry::get('validation')->set('cat',$_POST['cat'])->fString()->get();
                        $products_info = $this->search($key,$cat,$offset,10);
                        $data = [
                            'products'   => $products_info[0],
                            'count'      => $products_info[1],
                            'offsetwhere'=> "orderSearch/$key/$cat"
                        ];
                        $this->view("website/product-grids",$data);die;
                    }catch(Exception $e){
                        redirect('/');die;
                    }
                }else{
                    redirect('/');die;
                }
            }else{
                redirect('/');die;
            }
        }

        public function addReview($id)
        {
            try{
                $product = registry::get('validation')->set('id',$id)->fInteger()->get();
                $rate = registry::get('validation')->set('rate',$_POST['rate'])->fInteger()->get();
                $comment = registry::get('validation')->set('comment',$_POST['comment'])->fString()->get();
                if(isset(registry::get('session')->clintdata)){
                    ReviewsModel::add(registry::get('session')->clintdata['id'],$product,$rate,$comment);
                }
            }catch(Exception $e)
            {

            }
            redirect('/Products/productDetails/'.$product);
        }

    } 