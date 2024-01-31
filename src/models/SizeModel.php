<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class SizeModel extends AbstractModel
    {
        public static function getAll()
        {
            self::$table = 'size';
            return self::getAllData();
        }     
        
        public static function add(array $data)
        {
            self::$table = 'size';
            return self::addData($data);
        }
        
    }