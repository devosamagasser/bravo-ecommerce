<?php 
namespace Bravo\Store\models;

use Exception;

    class CustomersModel extends AbstractModel
    {
        // public static function getAll()
        // {
        //     try{
        //         self::$table = 'userinfo';
        //         return self::getAllData();
        //     }catch(Exception $e){
        //         throw new Exception($e->getmESSAGE());
        //     }
        // }     
        
        public static function getRow($key,$value)
        {
            try{
                self::$table = 'customers';
                return self::getDataWhere($key,$value)->getRow();
            }catch(Exception $e){
                throw new Exception($e->getmESSAGE());
            }
        }   

        public static function add(array $data)
        {
            try{
                self::$table = 'customers';
                $check = self::getRow('email',$data['email']);
                if(empty($check)){
                    return self::addData($data);
                }else{
                    throw new Exception("This Email Is Already Exist");
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        // public static function update(array $data,$key,$value)
        // {
        //     try{
        //         self::$table = 'users';
        //         $check = self::getRow('email',$data['email']);
        //         if(!empty($check)){
        //             if($value != $check[$key]){
        //                 throw new Exception("This Email Is Already Exist");
        //             }
        //         }
        //         return self::updateData($data,$key,$value);
        //     }catch(Exception $e){
        //         throw new Exception($e->getmESSAGE());
        //     }
        // }

        // public static function delete($key,$value)
        // {
        //     try{
        //         self::$table = 'users';
        //         return self::DeleteData($key,$value);
        //     }catch(Exception $e){
        //         throw new Exception($e->getmESSAGE());
        //     }
        // }

    }