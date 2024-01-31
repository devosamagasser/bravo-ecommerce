<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class ProductsPhotosModel extends AbstractModel
    {
        
        public static function add($product,$data)
        {
            try
            {
                self::$table = 'photo';
                $data = is_array($data) ? $data : [$data];
                foreach($data as $image):
                    registry::get('dbconnect')->insert(self::$table,['product','photo'])->preparedExecute([$product,$image]);
                endforeach;
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        
        public static function update($product,$data)
        {
            self::delete($product);
            self::add($product,$data);
        }



        public static function getWhere($product)
        {
            self::$table = 'photo';
            return self::getDataWhere('product',$product)->getAll();
        }
        
        public static function delete($product)
        {
            self::$table = 'photo';
            try{
                $photos = self::getWhere($product);
                foreach($photos as $photo){
                    unlink("../public/img/".$photo['photo']);
                }
                self::DeleteData('product',$product);
            }catch(Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }



    }