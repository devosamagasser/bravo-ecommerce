<?php 
namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;

    class ReviewsModel extends AbstractModel
    {
        public static function getAll()
        {
            try{
                self::$table = 'reviews_details';
                return self::getAllData();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }     
        
        public static function getRow($key,$value)
        {
            try{
                self::$table = 'reviews';
                return self::getDataWhere($key,$value)->getRow();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   
        
        public static function getCounts($key,$value,$prodId)
        {
            try{
                self::$table = 'reviews';
                return registry::get('dbconnect')->select(self::$table)->where($key)->and('product')->preparedExecute([$value,$prodId])->numRows();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   

        public static function getWhere($key,$value)
        {
            try{
                self::$table = 'reviews_details';
                return self::getDataWhere($key,$value)->getAll();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   

        public static function add($customer,$product,$rate,$comment)
        {
            try{
                self::$table = 'reviews';
                $check = self::getCounts('customer',$customer,$product);
                if(!$check){
                    self::addData(['customer'=>$customer,'product'=>$product,'rate'=>$rate,'comment'=>$comment]);
                    return 1;
                }else{
                    registry::get('dbconnect')->update(self::$table,['rate','comment'])
                    ->where('product')
                    ->and('customer')
                    ->preparedExecute([$rate,$comment,$product,$customer]);
                    return 0;
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'reviews';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

    }