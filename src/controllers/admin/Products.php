<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\SizeModel;
use Bravo\Store\models\BrandsModel;
use Bravo\Store\models\ColorsModel;
use Bravo\Store\models\ProductsModel;
use Bravo\Store\models\SectionsModel;
use Bravo\Store\models\CategoriesModel;
use Bravo\Store\models\ProductsPhotosModel;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\FeaturesModel;
use Bravo\Store\models\QuantityModel;

    class Products extends AbstractController
    {
        public function index()
        {
            if($this -> sessionhandeler())
            {
                try{
                    $data = [
                        'products_data' => ProductsModel::getAll(),
                        'title'         => 'Products',
                        'pagedisc'      => 'Products Data Informations'
                    ];
                    $this -> view('admin/product_view',$data);
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect('/Error');
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }
        
        public function add($detail)
        {
            if($this -> sessionhandeler())
            {
                $data = [
                    'title'     => 'Add Product',
                    'pagedisc'  => 'Add Product Form',
                    'categories'=> CategoriesModel::getAll(),
                    'sections'  => SectionsModel::getAll(),
                    'brands'    => BrandsModel::getAll(),
                    'colors'    => ($detail == "color" || $detail == "colorsize" ) ? ColorsModel::getAll() : "" ,
                    'sizes'     => ($detail == "colorsize") ? SizeModel::getAll() : "" ,
                    'store'     => $detail
                ];
                $this -> view('admin/product_add',$data);
                (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
            }else{
                redirect("/admin/Home/signIn");
                die;
            }    
        }
        
        public function show($productId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $productId = registry::get('validation')->set('productId',$productId)->fInteger()->get();
                    $data = [
                        'product'  => $productId,
                        'title'    => 'Single Product',
                        'pagedisc' => 'Single Product View',
                        'photos'   => ProductsPhotosModel::getWhere($productId),
                        'colors'   => ColorsModel::getAll(),
                        'sizes'    => SizeModel::getAll(),
                        'features' => FeaturesModel::getRow('product',$productId),
                        'quantity' => QuantityModel::getRow('product',$productId)
                    ];

                    $this -> view('admin/single_product',$data);
                    (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                    (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
                }catch(Exception $e){
                    echo $e->getMessage();
                    // redirect("error");die;
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }  
        }
       
        public function edit($productId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $productId = registry::get('validation')->set('productId',$productId)->fInteger()->get();
                    $data = [
                        'title'            => 'Edit Product',
                        'pagedisc'         => 'Edit Product Form',
                        'categories'       => CategoriesModel::getAll(),
                        'sections'         => SectionsModel::getAll(),
                        'brands'           => BrandsModel::getAll(),
                        'colors'           => ColorsModel::getAll(),
                        'sizes'            => SizeModel::getAll(),
                        'product_data'     => ProductsModel::getRow('id',$productId),
                        'product_features' => FeaturesModel::getRow('product',$productId),
                        'product_quantity' => QuantityModel::getRow('product',$productId)
                    ];
                    $this -> view('admin/product_edit',$data);
                    (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                    (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect("error");die;
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }   
        }

        public function store($detail)
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['price']) &&
                   isset($_POST['sale']) &&
                   isset($_POST['disc']) &&
                   isset($_FILES['img']))
                {
                    try{
                        $data = [
                            'name'      => registry::get('validation')->set('name'       ,$_POST ['name' ])->fString  ()->get(),
                            'price'     => registry::get('validation')->set('price'      ,$_POST ['price'])->fInteger ()->get(),
                            'sale'      => registry::get('validation')->set('sale'       ,$_POST ['sale' ])->fInteger ()->get(),
                            'descrip'   => registry::get('validation')->set('discreption',$_POST ['disc' ])->fString  ()->get()
                        ];
                        (isset($_POST ['cat'  ]) && !empty($_POST ['cat'  ])) ? $data['categorie'] = registry::get('validation')->set('categorie'  ,$_POST ['cat'  ])->fInteger ()->get() : "";
                        (isset($_POST ['sec'  ]) && !empty($_POST ['sec'  ])) ? $data['section'  ] = registry::get('validation')->set('secstion'   ,$_POST ['sec'  ])->fInteger ()->get() : "";
                        (isset($_POST ['brand']) && !empty($_POST ['brand'])) ? $data['brand'    ] = registry::get('validation')->set('brand'      ,$_POST ['brand'])->fInteger ()->get() : "";

                        $imgs    = registry::get('validation')->set('images',$_FILES['img'])->fImages()->get();
                        $feature = (!empty($_POST['feature']))  ? $this -> featureValidation($_POST['feature']) : "";
                        if(isset($_POST['colorsize']))
                        {
                            $quantity =  $this -> colorSizeQuanValidation();
                        }
                        elseif(!isset($_POST['colorsize']) && isset($_POST['color']) )
                        {
                            $quantity = $this -> colorQuanValidation();
                        }
                        else
                        {
                            $data['quantity']  = registry::get('validation')->set('Quantity',$_POST['quantity'])->fInteger()->get();
                            $quantity = "";
                        }
                        ProductsModel::add($data,$imgs,$feature,$quantity);

                        registry::get('session')->suc = "added successfully";
                    }catch(Exception $e){
                        registry::get('session')->err = $e->getMessage();
                    }
                }else{
                    registry::get('session')->err = "Please Try Again ";
                }
            }else{
                registry::get('session')->err = "Please Try Again ";
            }
            redirect("/admin/Products/add/$detail");
            die;
        }

        public function update($productId)
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['price']) &&
                   isset($_POST['sale']) &&
                   isset($_POST['disc']))
                {
                    try{
                        $data = [
                            'name'      => registry::get('validation')->set('name'       ,$_POST ['name' ])->fString  ()->get(),
                            'price'     => registry::get('validation')->set('price'      ,$_POST ['price'])->fInteger ()->get(),
                            'sale'      => registry::get('validation')->set('sale'       ,$_POST ['sale' ])->fInteger ()->hash()->get(),
                            'descrip'   => registry::get('validation')->set('discreption',$_POST ['disc' ])->fString  ()->get(),
                        ];
                        (isset($_POST ['cat'  ]) && !empty($_POST ['cat'  ])) ? $data['categorie'] = registry::get('validation')->set('categorie'  ,$_POST ['cat'  ])->fInteger ()->get() : "";
                        (isset($_POST ['sec'  ]) && !empty($_POST ['sec'  ])) ? $data['section'  ] = registry::get('validation')->set('secstion'   ,$_POST ['sec'  ])->fInteger ()->get() : "";
                        (isset($_POST ['brand']) && !empty($_POST ['brand'])) ? $data['brand'    ] = registry::get('validation')->set('brand'      ,$_POST ['brand'])->fInteger ()->get() : "";
                        
                        $productId = registry::get('validation')->set('productId',$productId)->fInteger()->get();

                        $imgs      = (!empty($_FILES['img']['name'][0])) ? registry::get('validation')->set('images',$_FILES['img'])->fImages()->get() : [];
                        // print_r($imgs);die;

                        $feature   = (!empty($_POST['feature']))  ? $this -> featureValidation($_POST['feature']) : "";
                        
                        if(isset($_POST['colorsize']))
                            $quantity =  $this -> colorSizeQuanValidation();
                        
                        elseif(!isset($_POST['colorsize']) && isset($_POST['color']) )
                            $quantity = $this -> colorQuanValidation();

                        elseif(isset($_POST['quan'])){
                            $data['quantity']  = registry::get('validation')->set('Quantity',$_POST['quantity'])->fInteger()->get();
                            $quantity = "";
                        }

                        ProductsModel::update($data,$imgs,$feature,$quantity,'id',$productId);

                        registry::get('session')->suc = "updated successfully";
                        
                    }catch(Exception $e){
                        registry::get('session')->err = $e->getMessage();
                    }
                }else{
                    registry::get('session')->err = "Please Try Again ";
                }
            }else{
                registry::get('session')->err = "Please Try Again ";
            }
            redirect("/admin/Products/edit/$productId");
            die;
        }

        public function delete($productId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $productId = registry::get('validation')->set('id',$productId)->fInteger()->get();
                    ProductsModel::delete('id',$productId);
                    redirect("/admin/Products/index");
                    die;
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }

        private function featureValidation(array $features)
        {
                $newfeatures = [];
                foreach($features as $feature){
                    $newfeatures[] = registry::get('validation')->set('feature',$feature)->fString()->get(); 
                }
                return $newfeatures;
        }

        private function colorQuanValidation()
        {
            $colors = $_POST['color'];
            $quans  = $_POST['quan'];
            try{
                $count = count($colors);
                $colorsquan = [];
                for($i = 0 ; $i<$count;$i++){
                    $color = registry::get('validation')->set('color',$colors[$i])->fInteger()->get(); 
                    $quan  = registry::get('validation')->set('quan',$quans[$i])->fInteger()->get(); 
                    $arr = ['color'=>$color,'quantity'=>$quan];
                    $colorsquan[] = $arr;
                }
                return $colorsquan;
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        private function colorSizeQuanValidation()
        {
            (isset($_POST['color'])) ? $colors  = $_POST['color'] : throw new Exception("try again");
            $offset = (isset($_POST['feature']) && !empty($_POST['feature'])) ? 10 : 9;

            $data = array_slice($_POST,$offset);

            try{
                $count = count($colors);
                $values = array_values($data);
                $colorsizequan = [];
                    for($j = 0; $j < $count ;$j++){
                        $color = registry::get('validation')->set('color',$colors[$j])->fInteger()->get();
                        for($i = $j*2; $i< ($j*2+1) ;$i++){
                            if(isset($values[$i])){
                                $sizecount = count($values[$i]);
                                for($k = 0;$k < $sizecount; $k++){
                                    $size =  registry::get('validation')->set('size',$values[$i][$k])->fInteger()->get();
                                    $quan =  registry::get('validation')->set('auqntity',$values[$i+1][$k])->fInteger()->get();
                                    $colorsizequan[] = ['color'=>$color,'size'=>$size,'quantity'=>$quan];
                                }
                            }else{
                                throw new Exception("try again");
                            }
                        }
                    }
                return $colorsizequan;
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public function deleteQuan($productId)
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['quan']) ){
                try{
                    $productId = registry::get('validation')->set('id',$productId)->fInteger()->get();
                    foreach($_POST['quan'] as $quanId){
                        $quanId = registry::get("validation")->set('data',$quanId)->fInteger()->get();
                        QuantityModel::delete('id',$quanId);
                    }
                    redirect("/admin/Products/show/$productId");die;
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect("error");die;
                }
            }
        }

        public function deleteFeatures($productId)
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['feature'])){
                try
                {
                    $productId = registry::get('validation')->set('id',$productId)->fInteger()->get();
                    foreach($_POST['feature'] as $featureId){
                        $featureId = registry::get("validation")->set('data',$featureId)->fInteger()->get();
                        FeaturesModel::delete('id',$featureId);
                    }
                    redirect("/admin/Products/show/$productId");die;
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect("error");die;
                }
            }
        }

        public function addQuan($productId)
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['color'])){
                try
                {
                    $productId = registry::get('validation')->set('id',$productId)->fInteger()->get();

                    $data['color'] = registry::get("validation")->set('color',$_POST['color'])->fInteger()->get();

                    (isset($_POST['size'])) ? $data['size'] = registry::get("validation")->set('size',$_POST['size'])->fInteger()->get() : "";

                    $data['quantity'] = registry::get("validation")->set('quantity',$_POST['quantity'])->fInteger()->get();

                    QuantityModel::add($productId,[$data]);
                    redirect("/admin/Products/show/$productId");die;
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }else{
                registry::get('session')->err = "not found";
            }
            redirect("/admin/Products/show/$productId");die;
        }

        public function addFeature($productId)
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['feature'])){
                try
                {
                    $productId = registry::get('validation')->set('id',$productId)->fInteger()->get();
                    $data['feature'] = registry::get("validation")->set('feature',$_POST['feature'])->fString()->get();
                    FeaturesModel::add($productId,$data);
                    redirect("/admin/Products/show/$productId");die;
                }catch(Exception $e){
                    echo registry::get('session')->err = $e->getMessage();
                }
            }else{
                echo registry::get('session')->err = "not found";
            }
        }
    }