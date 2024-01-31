<?php 
namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;


    abstract class AbstractModel
    {
        public static $table;

        public static function  getAllData()
        {
            try
            {
                return registry::get('dbconnect')->select(self::$table)->normalExecute()->getAll();
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        public static function  getDataWhere($key,$value)
        {
            try
            {
                return registry::get('dbconnect')->select(self::$table)->where($key)->preparedExecute([$value]);
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        public static function addData(array $data)
        {
            $columns = array_keys($data);
            $values  = array_values($data);
            try
            {
                return registry::get('dbconnect')->insert(self::$table,$columns)->preparedExecute($values);
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        public static function  UpdateData(array $data,$key,$value)
        {
            $columns  = array_keys($data);
            $values   = array_values($data);
            $values[] = $value;
            try
            {
                return registry::get('dbconnect')->update(self::$table,$columns)->where($key)->preparedExecute($values);
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }

        public static function  DeleteData($key,$value)
        {
            try
            {
                return registry::get('dbconnect')->delete(self::$table)->where($key)->preparedExecute([$value]);
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            } 
        }




    }