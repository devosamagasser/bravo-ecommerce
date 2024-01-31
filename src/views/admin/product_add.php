<?php include "inc/header.php" ?>

<div class="container mb-3">
    <?php alert() ?>
    <div class="card card-primary">
        <div class="card-header row">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <form action="/admin/Products/store/<?= $store ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body row justify-content-center" style="background-color: #e3e4eb;">
                <div class="form-group col-sm-8">
                    <label for="name">Name</label>
                    <input type="text" name='name' class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group col-sm-8">
                    <label for="">price</label>
                    <input type="number" name='price' class="form-control"  placeholder="Enter price">
                </div>
                <div class="form-group col-sm-8">
                    <label for="exampleInputPassword1">sale</label>
                    <input type="number" name='sale' class="form-control" placeholder="sale">
                </div>
                <div class="form-group col-sm-8">
                    <label for="phone">disreption</label>
                    <input type="text" name="disc" class="form-control" placeholder="Enter discription">
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
                            <option value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
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
                            <option value="<?= $section['id'] ?>"><?= $section['name'] ?></option>
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
                            <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group col-sm-8 row" id="feature-container">
                    <div class="form-group row col-sm-12 feature-body" style="border-top:1px solid black;">
                        <div class="col-sm-1">
                            <a class="btn text-danger delete-feature" order="1">
                                <i class="fa fa-trash"></i>
                            </a>    
                        </div>
                        <div class="form-group col-sm-10">
                            <input type="text" name="feature[]" class="form-control" placeholder="Enter Feature">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 " >
                    <a id="add-feature" class="btn text-primary" >
                        <i class="fa fa-plus"></i> add feature
                    </a>
                </div>

                <!-- start color and size -->
                <?php 
                    if(isset($store) && $store == "colorsize") {
                ?>
                <input type="hidden" name="colorsize">
                <div class="form-group row col-sm-8"  id="color-and-size-container">
                    <div class="form-group row col-sm-12 align-items-center color-size-body" style="border-top:1px solid black;">
                        <div class="col-sm-1">
                            <a class="btn text-danger delete-color-size"  order="1">
                                <i class="fa fa-trash"></i>
                            </a>    
                        </div>
                        <div class="col-sm-3 ">
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
                        <div class="col-sm-8 row ">
                        <?php 
                            foreach($sizes as $size) :
                        ?>
                            <div class="col-sm-2 ">
                                <div>
                                    <input type="checkbox" class="sizebox" order="1" name="size1[]" value="<?= $size['size_id']?>">
                                    <label><?= $size['size'] ?></label>
                                </div>
                                <input type="number" class="col-sm-12 size-quan" style="display: none;">
                            </div>
                        <?php 
                            endforeach;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" >
                    <a id="add-color-size" class="btn text-primary">
                        <i class="fa fa-plus"></i> add color and size
                    </a>
                </div>
                <!-- end color and size -->

                <!-- start color  -->
                <?php 
                    }elseif(isset($store) && $store == "color") {
                ?>
                <div class="form-group row col-sm-8 " id="color-container">
                    <div class="form-group row col-sm-12 color-body align-items-center" style="border-top:1px solid black;">

                        <div class="col-sm-1">
                            <a class="btn text-danger delete-color" order="1">
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
                </div>
                <div class="form-group col-sm-8" >
                    <a id="add-color" class="btn text-primary" >
                        <i class="fa fa-plus"></i> add color
                    </a>
                </div>
                <!-- end color -->
                <?php 
                    }else{
                ?> 
                <div class="form-group col-sm-8">
                    <label for="phone">Quantity</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
                </div>
                <?php 
                    }
                ?>

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
