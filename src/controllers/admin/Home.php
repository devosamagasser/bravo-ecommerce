<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\UsersModel;

    class Home extends AbstractController
    {
        public function signIn()
        {
            if(!$this -> sessionhandeler())
            {
                $this -> view('admin/signin',[]);
                (isset(registry::get('session')->err)&&!empty(registry::get('session')->err)) ? registry::get('session')->err = "" : "";
            }else{
                redirect('/admin/');
                die;
            }
        }

        public function validation()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['email'])&&isset($_POST['password']))
                {
                    try
                    {
                        $email    =  registry::get("validation")->set('email',$_POST['email'])->fEmail()->get();
                        $password =  registry::get("validation")->set('password',$_POST['password'])->fPassword()->get();
                        $data     = (new UsersModel) -> getRow('email',$email);
                        if($data){
                            if(password_verify($password,$data['password'])){
                                registry::get('session')->userId = $data['id'];
                                registry::get('session')->userPosition = $data['position'];
                                redirect("/admin/");
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
            redirect("/admin/Home/signIn");
            die;
        }
    }