<?php
namespace Bravo\Store\controllers;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\CartModel;
use Bravo\Store\models\CategoriesModel;
use Bravo\Store\models\ProductsPhotosModel;
use Bravo\Store\controllers\AbstractController;

    class Cart extends AbstractController
    {
        public function index()
        {
            try{
                if(registry::get('session')->clintdata){
                    $cart_info = $this->getAllProducts();
                    $data = [
                        'products'   => $cart_info[0],
                        'count'      => $cart_info[1]
                    ];
                    $this->view("website/cart",$data);
                }else{
                    redirect('/');
                }
            }catch(Exception $e){
                redirect('/');
            }
        }

        public function getAllProducts()
        {
            try{
                if(registry::get('session')->clintdata){
                    $data = CartModel::getAll();    
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
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        
        public function delete($cartid)
        {
            try{
                $cartid = registry::get('validation')->set('id',$cartid)->fInteger()->get();
                CartModel::delete('cart_id',$cartid);
            }catch(Exception $e){
                registry::get('session')->err = $e->getMessage();
            }
            redirect("/cart/");
            die;
        }
    } 