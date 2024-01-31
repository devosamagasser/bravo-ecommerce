<?php 
namespace Bravo\Store\controllers;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\models\CustomersModel;

    class Auth 
    {
        public function signUp()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['name']) &&
                   isset($_POST['email']) &&
                   isset($_POST['phone']) &&
                   isset($_POST['password']) &&
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
                            'country'  => registry::get('validation')->set('country' ,$_POST['country' ])->fInteger ()->get(),
                            'city'     => registry::get('validation')->set('city'    ,$_POST['city'    ])->fInteger ()->get(),
                            'street'   => registry::get('validation')->set('street'  ,$_POST['street'  ])->fString  ()->get()
                        ];
                        CustomersModel::add($data);
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
            redirect('/Home/signUp');
            die;
        }

        public function signIn()
        {
        
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['email'])&&isset($_POST['password']))
                {
                    try
                    {
                        $email    =  registry::get("validation")->set('email',$_POST['email'])->fEmail()->get();
                        $password =  registry::get("validation")->set('password',$_POST['password'])->fPassword()->get();
                        $data     =  CustomersModel::getRow('email',$email);
                        if($data){
                            if(password_verify($password,$data['password'])){
                                registry::get('session')->clintdata = $data;
                                redirect("/Home/index");
                                die;
                            }else{
                                registry::get('session')->err = "email or password are not valid";
                            }
                        }else{
                            registry::get('session')->err =  "email or password are not valid";
                        }
                    }catch(Exception $e){
                        registry::get('session')->err =  $e->getMessage();
                    }
                } 
            }
            redirect("/Home/signIn");
            die;
        
        }
    }