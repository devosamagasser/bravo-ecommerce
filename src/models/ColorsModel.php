<?php 
namespace Bravo\Store\models;

use Exception;

    class ColorsModel extends AbstractModel
    {
        public static function getAll()
        {
            try{
                self::$table = 'color';
                return self::getAllData();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }     
        
        public static function getRow($key,$value)
        {
            try{
                self::$table = 'color';
                return self::getDataWhere($key,$value)->getRow();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   

        public static function add(array $data)
        {
            try{
                self::$table = 'color';
                $check = self::getRow('color',$data['color']);
                if(empty($check)){
                    return self::addData($data);
                }else{
                    throw new Exception("This Color Is Already Exist");
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function update(array $data,$key,$value)
        {
            try{
                self::$table = 'color';
                $check = self::getRow('color',$data['color']);
                if(!empty($check)){
                    if($value != $check[$key]){
                        throw new Exception("This Color Is Already Exist");
                    }
                }
                return self::updateData($data,$key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'color';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

    }