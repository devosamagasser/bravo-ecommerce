<?php
namespace Bravo\Store\controllers\admin;


use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\CategoriesModel;
use Bravo\Store\models\SectionsModel;

    class Sections extends AbstractController
    {
        public function index($categorieId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $cat_data = CategoriesModel::getRow('id',$categorieId);
                    $data = [
                        'title'     => ucfirst($cat_data['name']).'\'s Sections',
                        'pagedisc'  => ucfirst($cat_data['name']).'\'s Sections Data Informations',
                        'sections'  => SectionsModel::getWhere('categorie',$categorieId),
                        'categorie' => $categorieId
                    ];
                    $this -> view('admin/sections',$data);
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

        public function store($categorieId)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['section'])){
                try{
                    $data = [
                        'name' => registry::get('validation')->set('section name',$_POST['section'])->fString()->get(),
                        'categorie' => registry::get('validation')->set('categorie',$categorieId)->fString()->get(),
                    ];
                    SectionsModel::add($data);
                    registry::get('session')->suc = "added successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Sections/index/$categorieId");die;
        }

        public function update($sectionId,$categorieId)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['section'])){
                try{
                    $data['name'] = registry::get('validation')->set('section name',$_POST['section'])->fString()->get();
                    $categorieId = registry::get('validation')->set('categorie',$categorieId)->fString()->get();
                    SectionsModel::update($data,'id',$sectionId,$categorieId);
                    registry::get('session')->suc = "updated successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Sections/index/$categorieId");die;
        }

        public function delete($sectionId,$categorieId)
        {
            try{
                SectionsModel::delete('id',$sectionId);
                registry::get('session')->suc = "deleted successfully";
            }catch(Exception $e){
                registry::get('session')->err = $e->getMessage();
            }
            redirect("/admin/Sections/index/$categorieId");die;

        }

    }