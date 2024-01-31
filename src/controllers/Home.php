<?php
namespace Bravo\Store\controllers;

use Bravo\Store\core\registry;
use Bravo\Store\models\CityModel;
use Bravo\Store\models\CountryModel;
use Bravo\Store\controllers\Products;
use Bravo\Store\controllers\AbstractController;

    class Home extends AbstractController
    {
        public function index()
        {
            $products_info = (new Products)->allProduct(0);
            $data = [
                'products'   => $products_info[0],
                'count'      => $products_info[1],
                'offsetwhere'=> 'orderProducts/0/0/0'
            ];
            $this->view("website/index",$data);
        }
        public function signUp()
        {
            $data = [
                'countries'  => CountryModel::getAll(),
                'cities'     => CityModel::getAll()
            ];
            $this->view("website/register",$data);
            (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
            (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
        }
        public function signIn()
        {
            $this->view("website/login",[]);
            (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
            (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
        }
    } 