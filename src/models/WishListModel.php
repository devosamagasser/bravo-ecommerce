<?php 

namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;

    class WishListModel extends AbstractModel
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
        
        public static function getRow($customer,$product)
        {
            try{
                self::$table = 'favourite';
                return registry::get('dbconnect')->select(self::$table)->where('customer')->and('product')->preparedExecute([$customer,$product])->getRow();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   

        public static function add($customer,$product)
        {
            try{
                self::$table = 'favourite';
                $check = self::getRow($customer,$product);
                // print_r($check);die;
                if(empty($check)){
                    return self::addData(['customer'=>$customer,'product'=>$product]);
                }else{
                    return self::delete($customer,$product);
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        // public static function update($customer,$product,$quan)
        // {
        //     try{
        //         self::$table = 'favourite';
        //         return registry::get('dbconnect')->update(self::$table,['quan'])->where('customer')->and('product')->preparedExecute([$quan,$customer,$product]);
        //     }catch(Exception $e){
        //         throw new Exception($e->getMessage());
        //     }
        // }

        public static function delete($customer,$product)
        {
            try{
                self::$table = 'favourite';
                return registry::get('dbconnect')->delete(self::$table)->where('customer')->and('product')->preparedExecute([$customer,$product]);
            }catch(Exception $e){
                throw new Exception($e->getmESSAGE());
            }
        }

    }