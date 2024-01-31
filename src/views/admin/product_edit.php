<?php include "inc/header.php" ?>

<div class="container mb-3">
    <?php alert() ?>
    <div class="card card-primary">
        <div class="card-header row">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <form action="/admin/Products/update/<?= $product_data['id']?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row justify-content-center" style="background-color: #e3e4eb;">
                <div class="form-group col-sm-8">
                    <label for="name">Name</label>
                    <input type="text" name='name' class="form-control" value="<?= $product_data['name']?>" placeholder="Enter Name">
                </div>
                <div class="form-group col-sm-8">
                    <label for="">price</label>
                    <input type="number" name='price' class="form-control" value="<?= $product_data['price']?>"  placeholder="Enter price">
                </div>
                <div class="form-group col-sm-8">
                    <label for="exampleInputPassword1">sale</label>
                    <input type="number" name='sale' class="form-control" value="<?= $product_data['sale']?>" placeholder="sale">
                </div>
                <div class="form-group col-sm-8">
                    <label for="phone">disreption</label>
                    <input type="text" name="disc" class="form-control" value="<?= $product_data['descrip']?>" placeholder="Enter discription">
                </div>
                <div class="form-group row col-sm-8">
                    <div class="col-sm-4">
                        <label for="cat">categorie</label>
                        <select name="cat" class="form-control" id="categoriesselect">
                            <option value=""></option>
                            <?php 
                                if(!empty($categories)) :
                                    foreach($categories as $categorie) :
                            ?>
                            <option value="<?= $categorie['id'] ?>" <?= ($categorie['id'] == $product_data['categorie']) ? "SELECTED" : "" ?>><?= $categorie['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="sec">section</label>
                        <select name="sec" class="form-control" id="sectionsselect">
                            <option value=""></option>
                        <?php 
                            if(!empty($sections)) :
                                foreach($sections as $section) :
                        ?>
                            <option value="<?= $section['id'] ?>" <?= ($section['id'] == $product_data['section']) ? "SELECTED" : "" ?>><?= $section['name'] ?></option>
                        <?php 
                                endforeach;
                            endif;
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="brand">brands</label>
                        <select name="brand" class="form-control" id="brandsselect">
                            <option value=""></option>
                            <?php 
                                if(!empty($brands)) :
                                    foreach($brands as $brand) :
                            ?>
                            <option value="<?= $brand['id'] ?>" <?= ($brand['id'] == $product_data['brand']) ? "SELECTED" : "" ?>><?= $brand['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-8 row" id="feature-container">
                        <?php 
                            if(!empty($product_features)) :
                                $i = 1;
                                foreach($product_features as $feature) :
                                    
                        ?>
                        <div class="form-group row col-sm-12 feature-body" style="border-top:1px solid black;">
                            <div class="col-sm-1">
                                <a class="btn text-danger delete-feature" order="<?= $i++ ?>">
                                    <i class="fa fa-trash"></i>
                                </a>    
                            </div>
                            <div class="form-group col-sm-10">
                                <input type="text" name="feature[]" class="form-control" placeholder="Enter Feature" value="<?=$feature['feature']?>">
                            </div>
                        </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </div>
                    <div class="col-sm-8 " >
                        <a id="add-feature" class="btn text-primary" >
                            <i class="fa fa-plus"></i> add feature
                        </a>
                    </div>

                    <!-- start color and size -->
                    <?php 
                        if(!empty($product_quantity) && $product_quantity[0]['size'] != NULL ) :
                    ?>
                    <input type="hidden" name="colorsize">
                    <div class="form-group row col-sm-8"  id="color-and-size-container">
                        <?php 
                            $i = 1;
                            $color = "";
                            $data = [];
                            $count = count($product_quantity);
                            foreach($product_quantity as $quantity){
                                if($quantity['color'] == $color ){
                                    $len = count($data);
                                    $data[$len-1][1][] = $quantity['size'];
                                    $data[$len-1][2][] = $quantity['quantity'];
                                }else{
                                    $data[] = [$quantity['color'],[$quantity['size']],[$quantity['quantity']]];
                                    $color = $quantity['color'];
                                }
                            }
                            foreach($data as $quantity) :
                        ?>
                        <div class="form-group row col-sm-12 align-items-center color-size-body" style="border-top:1px solid black;">
                            <div class="col-sm-1">
                                <a class="btn text-danger delete-color-size"  order="<?= $i ?>">
                                    <i class="fa fa-trash"></i>
                                </a>    
                            </div>
                            <div class="col-sm-3 ">
                                <select name="color[]" class="form-control">
                                    <?php foreach($colors as $color) : ?>
                                        <option value="<?= $color['color_id'] ?>" <?= ( $quantity[0] == $color['color_id'] ) ? "selected" : "" ?>><?= $color['color'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-sm-8 row ">
                            <?php 
                                $count = 0;
                                foreach($sizes as $size) : 
                            ?>
                                <div class="col-sm-3">
                                    <div>
                                        <label><?= $size['size'] ?></label>
                                        <input type="checkbox" class="sizebox" order="<?= $i ?>" name="size<?=$i?>[]" value="<?= $size['size_id']?>" 
                                        <?php
                                        $quan = false;
                                        foreach($quantity[1] as $prosize ) : 
                                            if( $prosize == $size['size_id'] ) {
                                                echo "checked";
                                                $quan = true;
                                                $count++;
                                            } 
                                        endforeach;
                                        ?>>
                                    </div>
                                    <input type="number" class="col-sm-12 size-quan" <?= ($quan) ? 'name="quan'.$i.'[]"' : "" ?> value="<?= ($quan) ? $quantity[2][$count-1] : "" ?>"  style="width:150px;display:<?=($quan) ? 'block' : 'none' ?>">
                                </div>
                            <?php endforeach ?>
                            </div>
                        </div>
                        <?php $i++ ; endforeach ?>
                    </div>
                    <div class="col-sm-8" >
                        <a id="add-color-size" class="btn text-primary">
                            <i class="fa fa-plus"></i> add color and size
                        </a>
                    </div>
                    <!-- end color and size -->

                    <!-- start color  -->
                    <?php 
                        elseif(!empty($product_quantity) && $product_quantity[0]['size'] == NULL) :
                    ?>
                    <div class="form-group row col-sm-8 " id="color-container">
                    <?php 
                        $i = 1;
                        foreach($product_quantity as $quantity) :
                    ?>
                        <div class="form-group row col-sm-12 color-body align-items-center" style="border-top:1px solid black;">
                            <div class="col-sm-1">
                                <a class="btn text-danger delete-color" order="<?= $i++ ?>">
                                    <i class="fa fa-trash"></i>
                                </a>    
                            </div>
                            <div class="col-sm-4 ">
                                <select name="color[]" class="form-control">
                                    <?php 
                                        foreach($colors as $color) :
                                    ?>
                                    <option value="<?= $color['color_id'] ?>" <?= ( $quantity['color'] == $color['color_id'] ) ? "selected" : "" ?>><?= $color['color'] ?></option>
                                    <?php 
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-7 row">
                                <div class="col-sm-4">
                                    <input type="number" placeholder="0" value="<?= $quantity['quantity'] ?>" name="quan[]" class="col-sm-12">
                                </div>
                            </div>                
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group col-sm-8" >
                        <a id="add-color" class="btn text-primary" >
                            <i class="fa fa-plus"></i> add color
                        </a>
                    </div>
                    <!-- end color -->
                    <?php else : ?> 
                    <div class="form-group col-sm-8">
                        <label for="phone">Quantity</label>
                        <input type="text" name="quantity"<?= $product_data['quantity']?> class="form-control" placeholder="Enter Quantity">
                    </div>
                    <?php endif ?>


                    </div>
                    <div class="form-group col-sm-8">
                        <input type="file" name="img[]" multiple >
                    </div>
                </div>
                <div class="card-footer row justify-content-center">
                    <button type="submit" class="btn btn-primary col-sm-8">Submit</button>
                </div>
            </form>
        </div>
    </div>
            
    <?php include "inc/footer.php" ?>
