<?php 

namespace Bravo\Store\models;

use Exception;
use Bravo\Store\core\registry;

    class CartModel extends AbstractModel
    {
        public static function getAll()
        {
            try{
                self::$table = 'cart';
                $data = registry::get('dbconnect')
                ->select(self::$table,["cart.*,product.*,color.*"])
                ->leftjoin('product','id','cart','product')
                ->leftjoin('color','color_id','cart','color')
                ->groupBy('cart_id')
                ->having('customer','=',registry::get('session')->clintdata['id'])
                ->normalExecute();
                return [$data->getAll(),$data->numRows()];
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }     
        
        public static function getRow($customer,$product,$color)
        {
            try{
                self::$table = 'cart';
                if(empty($color)) 
                    return registry::get('dbconnect')->select(self::$table)->where('customer')->and('product')->preparedExecute([$customer,$product])->getRow();
                else 
                    return registry::get('dbconnect')->select(self::$table)->where('customer')->and('product')->and('color')->preparedExecute([$customer,$product,$color])->getRow();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }   

        public static function add($product,$customer,$quan,$color,$price,$count)
        {
            try{
                self::$table = 'cart';
                $check = self::getRow($customer,$product,$color);
                if(empty($check)){
                    return self::addData(['customer'=>$customer,'product'=>$product,'color'=>$color,'quan'=>$quan,'pr_price'=>$price,'all_quantity'=>$count]);
                }else{
                    return self::update($customer,$product,$quan,$color);
                }
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function update($customer,$product,$quan,$color)
        {
            try{
                self::$table = 'cart';
                if(empty($color))
                    return registry::get('dbconnect')->update(self::$table,['quan'])->where('customer')->and('product')->preparedExecute([$quan,$customer,$product]);
                else
                    return registry::get('dbconnect')->update(self::$table,['quan'])->where('customer')->and('product')->and('color')->preparedExecute([$quan,$customer,$product,$color]);

            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        public static function updateById($cartId,$quan)
        {
            try{
                self::$table = 'cart';
                return self::UpdateData(['quan'=>$quan],'cart_id',$cartId);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public static function delete($key,$value)
        {
            try{
                self::$table = 'cart';
                return self::DeleteData($key,$value);
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

    }