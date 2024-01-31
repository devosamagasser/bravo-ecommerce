<?php 
namespace Bravo\Store\controllers;

use Bravo\Store\core\registry;
use Bravo\Store\models\CategoriesModel;

    abstract class AbstractController
    {

        public function sessionhandeler()
        {
            return isset(registry::get('session')->userId);
        }

        public function view($page,array $data)
        {
            $file = "../src/views/".$page.'.php';
            if(file_exists($file)){
                $cart_details = isset(registry::get('session')->clintdata) ? (new Cart)->getAllProducts() : [[],0];
                $data['header'] = [
                    'clintData'   => isset(registry::get('session')->clintdata) ? registry::get('session')->clintdata : "",
                    'categories'  => CategoriesModel::getAll(),
                    'my_cart'     =>  $cart_details[0],
                    'my_cart_count' =>  $cart_details[1]
                ];
                extract($data);
                // compact()
                ob_start();
                include($file);
                ob_end_flush();
            }else{
                redirect("/Error/index/404 Not Found");
            }
        }
    }