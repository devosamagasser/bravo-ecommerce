<?php
namespace Bravo\Store\controllers\admin;

use Exception;
use Bravo\Store\core\registry;
use Bravo\Store\controllers\AbstractController;
use Bravo\Store\models\BrandsModel;
use Bravo\Store\models\SectionsModel;

    class Brands extends AbstractController
    {
        public function index($sectionId,$categorieId)
        {
            if($this -> sessionhandeler())
            {
                try{
                    $sec_data = SectionsModel::getWhere('id',$sectionId,$categorieId);
                    $data = [
                        'title'     => ucfirst($sec_data['name']).'\'s Sections',
                        'pagedisc'  => ucfirst($sec_data['name']).'\'s Sections Data Informations',
                        'brands'    => BrandsModel::getWhere('section',$sectionId),
                        'section'   => $sectionId,
                        'categorie' => $categorieId
                    ];
                    $this -> view('admin/brands',$data);
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

        public function store($sectionId,$categorieId)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brand'])){
                try{
                    $data = [
                        'name'      => registry::get('validation')->set('brand name',$_POST['brand'])->fString()->get(),
                        'section'   => registry::get('validation')->set('section',$sectionId)->fInteger()->get(),
                        'categorie' => registry::get('validation')->set('categorie',$categorieId)->fInteger()->get()
                    ];
                    BrandsModel::add($data);
                    registry::get('session')->suc = "added successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Brands/index/$sectionId/$categorieId");die;
        }

        public function update($brandId,$sectionId,$categorieId)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brand'])){
                try{
                    $data['name'] = registry::get('validation')->set('brand name',$_POST['brand'])->fString()->get();
                    $brandId      = registry::get('validation')->set('brand',$brandId)->fInteger()->get();
                    $sectionId    = registry::get('validation')->set('section',$sectionId)->fInteger()->get();
                    BrandsModel::update($data,'id',$brandId,$sectionId);
                    registry::get('session')->suc = "updated successfully";
                }catch(Exception $e){
                    registry::get('session')->err = $e->getMessage();
                }
            }
            redirect("/admin/Brands/index/$sectionId/$categorieId");die;
        }

        public function delete($brandId,$sectionId,$categorieId)
        {
            try{
                BrandsModel::delete('id',$brandId);
                registry::get('session')->suc = "deleted successfully";
            }catch(Exception $e){
                registry::get('session')->err = $e->getMessage();
            }
            redirect("/admin/Brands/index/$sectionId/$categorieId");die;
        }

    }