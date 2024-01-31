
<?php include "inc/header.php" ?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Product Photo</h3>
      <?=alert()?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row justify-content-center">
            <?php 
              if(!empty($photos)) :
                foreach($photos as $photo):
            ?>
                  <img class="col-lg-3 col-md-6 col-sm-12" src="<?=assets("img/".$photo['photo']."")?>" style="height:150px;width:200px" >
            <?php 
                endforeach;
              endif;
            ?>
          </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row justify-content-around">

        <a href="" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCentercolor">Add Color</a>

        <div class="modal fade" id="exampleModalCentercolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form class="form-horizontal" action="/admin/Products/addQuan/<?=$product?>" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Color</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-sm-8">
                      <select name="color" class="form-control">
                        <?php 
                            foreach($colors as $color) :
                        ?>
                        <option value="<?= $color['color_id'] ?>"><?= $color['color'] ?></option>
                        <?php 
                            endforeach;
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Quantity" name="quantity">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <a href="" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCentercolorsize">Add CoLor And Size</a>

        <div class="modal fade" id="exampleModalCentercolorsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form class="form-horizontal" action="/admin/Products/addQuan/<?=$product?>" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add CoLor And Size</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <select name="color" class="form-control">
                        <?php 
                            foreach($colors as $color) :
                        ?>
                        <option value="<?= $color['color_id'] ?>"><?= $color['color'] ?></option>
                        <?php 
                            endforeach;
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <select name="size" class="form-control">
                        <?php 
                            foreach($sizes as $size) :
                        ?>
                        <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                        <?php 
                            endforeach;
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Quantity" name="quantity">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <a href="" class="btn btn-dark"data-toggle="modal" data-target="#exampleModalCenterfeature">Add Feature</a>

        <div class="modal fade" id="exampleModalCenterfeature" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form class="form-horizontal" action="/admin/Products/addFeature/<?=$product?>" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Feature</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" value="" placeholder="Feature" name="feature">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if(!empty($quantity) || !empty($features)) : ?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Product Details</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <?php if(!empty($quantity)) : ?>
          <!-- color-size-quantity table -->
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Quantities Details</h3>
                </div>
                  <!-- /.card-header -->
                <div class="card-body">
                  <form action="/admin/Products/deleteQuan/<?=$product?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger mb-2 btn-sm">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Color</th>
                          <th></th>
                          <?php if($quantity[0]['size'] != NULL) : ?>
                          <th>Size</th>
                          <?php endif ?>
                          <th class="text-center">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($quantity as $quantity) :?>
                        <tr>
                          <td><input type="checkbox" name="quan[]" value="<?=$quantity['id']?>"></td>
                          <td><?=$quantity['color']?></td>
                          <td><div style="width:20px;height:20px;border-radius:50%;border:1px solid black;background-color:<?=$quantity['code']?>"></div></td>
                          <?php if($quantity['size'] != NULL) : ?>
                          <td><?=$quantity['size_name']?></td>
                          <?php endif ?>
                          <td class="text-center">
                            <span class="badge bg-dark mr-1"><?=$quantity['quantity']?></span>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          <?php endif ?>

          <?php if(!empty($features)) : ?>
            <!-- Features -->
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Features Table</h3>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                  <form action="/admin/Products/deleteFeatures/<?=$product?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger mb-2 btn-sm">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>feature</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($features as $feature) :?>
                        <tr>
                          <td><input type="checkbox" name="feature[]" value="<?=$feature['id']?>"></td>
                          <td>
                            <?=$feature['feature']?>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
    <!-- /.card-body -->
    
  </div>
  <?php endif ?>

  <?php include "inc/footer.php" ?>
