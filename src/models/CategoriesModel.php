<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class CategoriesModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'categories';
            return self::getAllData();
        }     
        
        public static function add(array $data)
        {
            self::$table = 'categories';
            $check = self::getRow('name',$data['name']);
            if(empty($check)){
                return self::addData($data);
            }else{
                throw new Exception("This Categorie Is Already Exist");
            }

        }

        public static function getRow($key,$value)
        {
            self::$table = 'categories';
            return self::getDataWhere($key,$value)->getRow();
        } 

        public static function update(array $data,$key,$value)
        {
            self::$table = 'categories';
            $check = self::getRow('name',$data['name']);
            if(!empty($check)){
                if($value != $check[$key]){
                    throw new Exception("This categorie Is Already Exist");
                }
            }
            return self::updateData($data,$key,$value);
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'categories';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getmESSAGE());
            }
        }
        
    }