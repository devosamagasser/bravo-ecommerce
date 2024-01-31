<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\CategoriesModel;

    class Categories extends AbstractController
    {
        public function index()
        {
            if($this -> sessionhandeler())
            {
                try{
                    $data = [
                        'title'      => 'Categories',
                        'pagedisc'   => 'Categories Data Informations',
                        'categories' => CategoriesModel::getAll()
                    ];
                    $this -> view('admin/categories',$data);
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
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categorie'])){
                try{

                    $data['name'] = registry::get('validation')->set('categorie name',$_POST['categorie'])->fString()->get();
                    CategoriesModel::add($data);
                    registry::get('session')->suc = "added successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Categories");die;
        }

        public function update($categorieId)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categorie'])){
                try{
                    $data['name'] = registry::get('validation')->set('categorie name',$_POST['categorie'])->fString()->get();
                    CategoriesModel::update($data,'id',$categorieId);
                    registry::get('session')->suc = "updated successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Categories");die;
        }

        public function delete($categorieId)
        {
            try{
                CategoriesModel::delete('id',$categorieId);
                registry::get('session')->suc = "deleted successfully";
            }catch(Exception $e){
                registry::get('session')->err = $e->getMessage();
            }
            redirect("/admin/Categories");die;

        }

    }