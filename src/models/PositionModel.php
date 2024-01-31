<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class PositionModel extends AbstractModel
    {

        public static function getAll()
        {
            self::$table = 'position';
            return self::getAllData();
        }     
        
        public static function add(array $data)
        {
            self::$table = 'position';
            return self::addData($data);
        }

        
        
    }