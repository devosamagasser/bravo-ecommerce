<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class BrandsModel extends AbstractModel
    {


        public static function getAll()
        {
            self::$table = 'brands';
            return self::getAllData();
        }     


        public static function add(array $data)
        {
            self::$table = 'brands';
            $check = self::getWhere('name',$data['name'],$data['section']);
            if(empty($check)){
                return self::addData($data);
            }else{
                throw new Exception("This Brand Is Already Exist");
            }
        }

        public static function update(array $data,$key,$value,$sectionId)
        {
            self::$table = 'brands';
            $check = self::getWhere('name',$data['name'],$sectionId);
            if(!empty($check)){
                if($value != $check[$key]){
                    throw new Exception("This Brand Is Already Exist");
                }
            }
            return self::updateData($data,$key,$value);
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'brands';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function getWhere($key,$value,$sectionId = "")
        {
            self::$table = 'brands';
            if($sectionId == ""){
                return self::getDataWhere($key,$value)->getAll();
            }
            return registry::get('dbconnect')->select(self::$table)->where($key)->and('section')->preparedExecute([$value,$sectionId])->getRow();
        }   
    }