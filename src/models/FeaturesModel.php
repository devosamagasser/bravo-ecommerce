<?php 
namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;

    class FeaturesModel extends AbstractModel
    {

        public static function getAll()
        {
            try{
                self::$table = 'quantity';
                return self::getAllData();
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }     

        public static function getRow($key,$value)
        {
            try{
                self::$table = 'features';
                return self::getDataWhere($key,$value)->getAll();
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }   

        
        public static function add($productId,array $data)
        {
            try{
                self::$table = 'features';
                foreach($data as $feature){
                    $features['product'] = $productId;
                    $features['feature'] = $feature;
                    self::addData($features);
                }
                
                return true;
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }
        
        public static function update($productId,array $data)
        {
            self::delete('product',$productId);
            self::add($productId,$data);
        }
        
        public static function delete($key,$value)
        {
            self::$table = 'features';
            try{
                self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }

    }