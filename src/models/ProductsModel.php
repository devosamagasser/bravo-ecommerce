<?php 
namespace Bravo\Store\models;

use Bravo\Store\core\registry;
use Exception;

    class ProductsModel extends AbstractModel
    {

        public static function getAll()
        {
            try{

                self::$table = 'allproducts';
                return self::getAllData();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }  

        public static function getLimitid($offset,$cat,$sec,$brand)
        {
            try{
                $offset = $offset * 10;
                self::$table = 'allproducts';
                $key1  = (!empty($cat))   ? 'categorie_id' : '1';
                $key2  = (!empty($sec))   ? 'section_id'   : '1';
                $key3  = (!empty($brand)) ? 'brand_id'     : '1';

                $cat   = (!empty($cat))   ? $cat   : '1';
                $sec   = (!empty($sec))   ? $sec   : '1';
                $brand = (!empty($brand)) ? $brand : '1';

                $query = registry::get('dbconnect')->select(self::$table)->where($key1,'=')->and($key2,'=')->and($key3,'=');     

                $count = $query->preparedExecute([$cat,$sec,$brand])->numRows();
                $data  = $query->limit("$offset,10")->preparedExecute([$cat,$sec,$brand])->getAll();
                
                return [$data,$count];
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

                
        public static function getRow($key,$value)
        {
            try{
                self::$table = 'allproducts';
                return self::getDataWhere($key,$value)->getRow();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        } 
                
        public static function search($value,$cat,$offset,$limit)
        {
            try
            {
                $offset = $offset * 10;
                self::$table = 'allproducts';

                $skey = ($cat!=0) ? 'categorie_id' : '1';
                $cat  = ($cat!=0) ? $cat : '1';

                $query = registry::get('dbconnect')->select(self::$table)->like('name')->and($skey);
                $count = $query->preparedExecute(["%$value%",$cat])->numRows();
                $data  = $query->limit("$offset,$limit")->preparedExecute(["%$value%",$cat])->getAll();
                return [$data,$count];
                
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }
                
        public static function add(array $data,array $imgs,$features,$quantity)
        {
            try{
                self::$table = 'product';
                self::addData($data);
                $productid = registry::get('dbconnect')->getLastId();
                ProductsPhotosModel::add($productid,$imgs);
                if(!empty($features))
                    FeaturesModel::add($productid,$features);
                if(!empty($quantity))
                    QuantityModel::add($productid,$quantity);
                return true;
            } catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function update(array $data,array $imgs,$features,$quantity,$key,$value)
        {
            try{
                self::$table = 'product';
                self::updateData($data,$key,$value);
                if(!empty($imgs[0]))
                    ProductsPhotosModel::update($value,$imgs);
                if(!empty($features)){
                    FeaturesModel::update($value,$features);
                }else{
                    FeaturesModel::delete('product',$value);
                }
                if(!empty($quantity)){
                    QuantityModel::update($value,$quantity);
                }else{
                    QuantityModel::delete('product',$value);
                }
                return true;
            } catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function delete($key,$value)
        {
            try{

                ProductsPhotosModel::delete($value);
                self::$table = 'product';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }
    }