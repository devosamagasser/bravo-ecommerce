<?php 
namespace Bravo\Store\controllers\admin;

use Bravo\Store\models\BrandsModel;
use Bravo\Store\models\SizeModel;
use Bravo\Store\models\ColorsModel;
use Bravo\Store\models\SectionsModel;

    class AjaxController
    {
        public function getSctionsOfCategory($catId)
        {
            $sections = SectionsModel::getWhere('categorie',$catId);;
            if(!empty($sections)) :
                echo "<option value=''></option>";
                foreach($sections as $section) :
                    echo "<option value='".$section['id']."'>". $section['name'] ."</option>";
                endforeach;
            endif;
            die;
        }

        public function getBrandsOfCategory($catId)
        {
            $brands = BrandsModel::getWhere('categorie',$catId);
            if(!empty($brands)) :
                echo "<option value=''></option>";
                foreach($brands as $brand) :
                    echo "<option value='".$brand['id']."'>". $brand['name'] ."</option>";
                endforeach;
            endif;
            die;
        }

        public function getBrandsOfSection($secId)
        {
            $brands = BrandsModel::getWhere('section',$secId);
            if(!empty($brands)) :
                echo "<option value=''></option>";
                foreach($brands as $brand) :
                    echo "<option value='".$brand['id']."'>". $brand['name'] ."</option>";
                endforeach;
            endif;
            die;
        }

        public function getColorAndSize($order)
        {
            $colors = ColorsModel::getAll();
            $sizes  = SizeModel::getAll() ;
            
            ?>
                <div class="form-group row col-sm-12 align-items-center color-size-body" style="border-top:1px solid black;">
                    <div class="col-sm-1">
                        <a class="btn text-danger delete-color-size"  order="<?= $order+1 ?>">
                            <i class="fa fa-trash"></i>
                        </a>    
                    </div>
                    <div class="col-sm-3">
                        <select name="color[]" class="form-control">
                            <?php 
                                foreach($colors as $color) :
                            ?>
                            <option value="<?= $color['color_id'] ?>"><?= $color['color'] ?></option>
                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-8 row">
                    <?php 
                        foreach($sizes as $size) :
                    ?>
                        <div class="col-sm-2">
                            <div>
                                <input type="checkbox" class="sizebox" order="<?= $order+1 ?>" name="size<?= $order+1 ?>[]" value="<?= $size['id']?>">
                                <label><?= $size['name'] ?></label>
                            </div>
                            <input type="number" class="col-sm-12 size-quan" style="display: none;">
                        </div>
                    <?php 
                        endforeach;
                    ?>
                    </div>
                </div>
            <?php 
                die;
        }

        public function getColor($order)
        {
            $colors = ColorsModel::getAll();
            ?>
                <div class="form-group row col-sm-12 color-body align-items-center" style="border-top:1px solid black;">
                    <div class="col-sm-1">
                        <a class="btn text-danger delete-color" order="<?=$order+1?>">
                            <i class="fa fa-trash"></i>
                        </a>    
                    </div>
                    <div class="col-sm-4 ">
                        <select name="color[]" class="form-control">
                            <?php 
                                foreach($colors as $color) :
                            ?>
                            <option value="<?= $color['color_id'] ?>"><?= $color['color'] ?></option>
                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-7 row">
                        <div class="col-sm-3">
                            <input type="number" placeholder="0" name="quan[]" class="col-sm-12">
                        </div>
                    </div>                
                </div>

            <?php
                die;
        }

        public function getFeatures($order)
        {
            ?>
            <div class="form-group row col-sm-12 feature-body" style="border-top:1px solid black;">
                <div class="col-sm-1">
                    <a class="btn text-danger delete-feature" order="<?=$order+1?>">
                        <i class="fa fa-trash"></i>
                    </a>    
                </div>
                <div class="form-group col-sm-10">
                    <input type="text" name="feature[]" class="form-control" placeholder="Enter Feature">
                </div>
            </div>
            <?php
                die;
        }
        

    }