<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class CountryModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'country';
            return self::getAllData();
        }     
        
        public static function add(array $data)
        {
            self::$table = 'country';
            return self::addData($data);
        }
        
    }