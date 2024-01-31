<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class SectionsModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'sections';
            return self::getAllData();
        }     

        public static function getWhere($key,$value,$categorie = "")
        {
            self::$table = 'sections';
            if($categorie == ""){
                return self::getDataWhere($key,$value)->getAll();
            }
            return registry::get('dbconnect')->select(self::$table)->where($key)->and('categorie')->preparedExecute([$value,$categorie])->getRow();
        }   

        public static function add(array $data)
        {
            self::$table = 'sections';
            $check = self::getWhere('name',$data['name'],$data['categorie']);
            if(empty($check)){
                return self::addData($data);
            }else{
                throw new Exception("This Categorie Is Already Exist");
            }
        }

        public static function update(array $data,$key,$value,$categorie)
        {
            self::$table = 'sections';
            $check = self::getWhere('name',$data['name'],$categorie);
            if(!empty($check)){
                if($value != $check[$key]){
                    throw new Exception("This Section Is Already Exist");
                }
            }
            return self::updateData($data,$key,$value);
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'sections';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getmESSAGE());
            }
        }
    }