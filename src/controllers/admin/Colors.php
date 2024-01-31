<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\CityModel;
use Bravo\Store\models\UsersModel;
use Bravo\Store\models\ColorsModel;
use Bravo\Store\models\CountryModel;
use Bravo\Store\models\PositionModel;
use Bravo\Store\controllers\AbstractController;

    class Colors extends AbstractController
    {
        public function index()
        {
            if($this -> sessionhandeler())
            {
                try{
                    $data = [
                        'title'      => 'Colors',
                        'pagedisc'   => 'Colors Data Informations',
                        'colors' => ColorsModel::getAll()
                    ];
                    $this -> view('/admin/colors',$data);
                    (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                    (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect('/Error');
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }

        public function store()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['code']) 
                )
                {
                    try{
                        $data = [
                            'color' => registry::get('validation')->set('name',$_POST['name'])->fString()->get(),
                            'code' => registry::get('validation')->set('code',$_POST['code'])->fString()->get()
                        ];
                        ColorsModel::add($data);
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
            redirect('/admin/Colors');
            die;
        }

        public function update($colorId)
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['code']) 
                )
                {
                    try{
                        $data = [
                            'color' => registry::get('validation')->set('name',$_POST['name'])->fString()->get(),
                            'code' => registry::get('validation')->set('code',$_POST['code'])->fString()->get()
                        ];
                        $colorId = registry::get('validation')->set('id',$colorId)->fInteger()->get();
                        ColorsModel::update($data,'color_id',$colorId);
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
            redirect("/admin/Colors");
            die;
        }

        public function delete($colorId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $colorId = registry::get('validation')->set('id',$colorId)->fInteger()->get();
                    ColorsModel::delete('color_id',$colorId);
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
                redirect("/admin/Colors");
                die;
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }

    }