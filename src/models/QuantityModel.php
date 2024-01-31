<?php 
namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;

    class QuantityModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'quantity';
            return self::getAllData();
        }  
        
        public static function getRow($key,$value)
        {
            self::$table = 'quantity';
            return registry::get('dbconnect')->select(self::$table,[self::$table.".*","color.*","size.*"])->leftjoin('color','color_id',self::$table,'color')->leftjoin('size','size_id',self::$table,'size')->groupBy('id')->having($key,'=','?')->preparedExecute([$value])->getAll();
        }   

        private static function checkWhere($data)
        {
            unset($data["quantity"]);
            $values = array_values($data);
            $count  = count($data); 
            $query  = registry::get('dbconnect')->select(self::$table)->where('color');
            if($count == 3)
                $query = $query->and('size');
            return $query->and('product')->preparedExecute($values)->numRows();
        }
                
        public static function add($productid,array $data)
        {
            self::$table = 'quantity';
            foreach($data as $quan){
                $quan['product'] = $productid;
                if(!self::checkWhere($quan))
                    self::addData($quan);
                else
                    throw new Exception("this details is already exist");
            }
            return true;
        }

        public static function update($productId,array $data)
        {
            self::delete('product',$productId);
            foreach($data as $quan){
                $quan['product'] = $productId;
                self::addData($quan);
            }
        }
        
        public static function delete($key,$value)
        {
            self::$table = 'quantity';
            try{
                self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }
    }