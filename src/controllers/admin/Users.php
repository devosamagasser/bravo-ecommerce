<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\CityModel;
use Bravo\Store\models\UsersModel;
use Bravo\Store\models\CountryModel;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\PositionModel;

    class Users extends AbstractController
    {
        public function index()
        {
            if($this -> sessionhandeler())
            {
                try{
                    $data = [
                        'users_data' => UsersModel::getAll(),
                        'title'      => 'Users',
                        'pagedisc'   => 'Users Data Informations'
                    ];
                    $this -> view('admin/user_view',$data);
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                    redirect('/Error');
                }
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }
        
        public function add()
        {
            if($this -> sessionhandeler())
            {
                $data = [
                    'title'     => 'Add User',
                    'pagedisc'  => 'Add Users Form',
                    'countries' => CountryModel::getAll(),
                    'cities'    => CityModel::getAll(),
                    'positions' => PositionModel::getAll()
                ];
                $this -> view('admin/user_add',$data);
                (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
            }else{
                redirect("/admin/Home/signIn");
                die;
            }    
        }
        
        public function edit($userId)
        {
            if($this -> sessionhandeler())
            {
                $data = [
                    'title'     => 'Edit User',
                    'pagedisc'  => 'Edit Users Form',
                    'countries' => CountryModel::getAll(),
                    'cities'    => CityModel::getAll(),
                    'positions' => PositionModel::getAll(),
                    'user_data' => UsersModel::getRow('id',$userId)
                ];
                $this -> view('admin/user_edit',$data);
                (isset(registry::get('session')->suc)&&!empty(registry::get('session')->suc)) ? registry::get('session')->suc = "" : "";
                (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }

        public function store()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['email']) &&
                   isset($_POST['password']) &&
                   isset($_POST['phone']) &&
                   isset($_POST['salary']) &&
                   isset($_POST['position']) &&
                   isset($_POST['gender']) &&
                   isset($_POST['country']) &&
                   isset($_POST['city']) &&
                   isset($_POST['street'])
                )
                {
                    try{
                        $data = [
                            'name'     => registry::get('validation')->set('name'    ,$_POST['name'    ])->fString  ()->get(),
                            'email'    => registry::get('validation')->set('email'   ,$_POST['email'   ])->fEmail   ()->get(),
                            'password' => registry::get('validation')->set('password',$_POST['password'])->fPassword()->hash()->get(),
                            'phone'    => registry::get('validation')->set('phone'   ,$_POST['phone'   ])->fPhone   ()->get(),
                            'salary'   => registry::get('validation')->set('salary'  ,$_POST['salary'  ])->fInteger ()->get(),
                            'position' => registry::get('validation')->set('position',$_POST['position'])->fInteger ()->get(),
                            'gender'   => registry::get('validation')->set('gender'  ,$_POST['gender'  ])->fInteger ()->get(),
                            'country'  => registry::get('validation')->set('country' ,$_POST['country' ])->fInteger ()->get(),
                            'city'     => registry::get('validation')->set('city'    ,$_POST['city'    ])->fInteger ()->get(),
                            'street'   => registry::get('validation')->set('street'  ,$_POST['street'  ])->fString  ()->get()
                        ];
                        UsersModel::add($data);
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
            redirect('/admin/Users/add');
            die;
        }

        public function update($userId)
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['email']) &&
                   isset($_POST['password']) &&
                   isset($_POST['phone']) &&
                   isset($_POST['salary']) &&
                   isset($_POST['position']) &&
                   isset($_POST['gender']) &&
                   isset($_POST['country']) &&
                   isset($_POST['city']) &&
                   isset($_POST['street'])
                )
                {
                    try{
                        $data = [
                            'name'     => registry::get('validation')->set('name'    ,$_POST['name'    ])->fString  ()->get(),
                            'email'    => registry::get('validation')->set('email'   ,$_POST['email'   ])->fEmail   ()->get(),
                            'password' => registry::get('validation')->set('password',$_POST['password'])->fPassword()->hash()->get(),
                            'phone'    => registry::get('validation')->set('phone'   ,$_POST['phone'   ])->fPhone   ()->get(),
                            'salary'   => registry::get('validation')->set('salary'  ,$_POST['salary'  ])->fInteger ()->get(),
                            'position' => registry::get('validation')->set('position',$_POST['position'])->fInteger ()->get(),
                            'gender'   => registry::get('validation')->set('gender'  ,$_POST['gender'  ])->fInteger ()->get(),
                            'country'  => registry::get('validation')->set('country' ,$_POST['country' ])->fInteger ()->get(),
                            'city'     => registry::get('validation')->set('city'    ,$_POST['city'    ])->fInteger ()->get(),
                            'street'   => registry::get('validation')->set('street'  ,$_POST['street'  ])->fString  ()->get()
                        ];
                        $userId = registry::get('validation')->set('id',$userId)->fInteger()->get();
                        UsersModel::update($data,'id',$userId);
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
            redirect("/admin/Users/edit/$userId");
            die;
        }

        public function delete($userId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $userId = registry::get('validation')->set('id',$userId)->fInteger()->get();
                    UsersModel::delete('id',$userId);
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
                redirect("/admin/");
                die;
            }else{
                redirect("/admin/Home/signIn");
                die;
            }
        }

    }