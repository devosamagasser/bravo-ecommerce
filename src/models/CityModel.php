<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class CityModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'city';
            return self::getAllData();
        }     
        
        public static function add(array $data)
        {
            self::$table = 'city';
            return self::addData($data);
        }
        
    }