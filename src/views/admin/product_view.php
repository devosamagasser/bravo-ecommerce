
<?php include "inc/header.php" ?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=$pagedisc?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <span>
                <a class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalCenteradd">
                    <i class="fa fa-edit text-plus mr-1" ></i> Add Product
                </a>
                <div class="modal fade" id="exampleModalCenteradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" action="/admin/Products/add/default" id="add-project-form" method="POST">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Position Name</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="checkbox" id="project-colors">
                                  <label for="colors">have color or different colors </label>
                                </div>
                                <div class="col-sm-12">
                                  <input type="checkbox" id="project-sizes">
                                  <label for="sizes">have different sizes </label>
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
            </span>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                    id
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                    name
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                    price
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                    sale
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    discription
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    categorie
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    section
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    brand
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    rate
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    reviews count
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    quantity
                  </th>
                  <th rowspan="1" colspan="2" aria-label="CSS grade: activate to sort column ascending">
                    control
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(!empty($data['products_data'])) :
                    $id = 1;
                    foreach($data['products_data'] as $product) :
                ?>
                <tr>
                  <td><?= $id++ ?></td>
                  <td class="dtr-control sorting_1" tabindex="0"><?= $product['name'] ?></td>
                  <td><?= $product['price'] ?></td>
                  <td><?= $product['sale'] ?></td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#exampleModalCenterdesc<?=$product['id']?>">
                      Description
                    </a>
                    <div class="modal fade" id="exampleModalCenterdesc<?=$product['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?= $product['descrip'] ?>
                          </div>
                          <div class="modal-footer">
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td><?= $product['categorie'] ?></td>
                  <td><?= $product['section'] ?></td>
                  <td><?= $product['brand'] ?></td>
                  <td><?= $product['rate'] ?></td>
                  <td><?= $product['count'] ?></td>
                  <td><?= $product['quantity'] ?></td>
                  <td>
                    <div class="row justify-content-between">
                      <a href="/admin/Products/show/<?= $product['id'] ?>"   class="btn btn-sm btn-warning mx-1 col-md-3 text-center"><i class="fa fa-eye"></i></a>
                      <a href="/admin/Products/edit/<?= $product['id'] ?>"   class="btn btn-sm btn-success mx-1 col-md-3 text-center"><i class="fa fa-edit"></i></a>
                      <a href="/admin/Products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-danger  mx-1 col-md-3 text-center"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php
                    endforeach;
                  endif;
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th rowspan="1" colspan="1">
                    id
                  </th>
                  <th rowspan="1" colspan="1">
                   name
                  </th>
                  <th rowspan="1" colspan="1">
                    email
                  </th>
                  <th rowspan="1" colspan="1">
                    phone
                  </th>
                  <th rowspan="1" colspan="1">
                    country
                  </th>
                  <th rowspan="1" colspan="1">
                    city
                  </th>
                  <th rowspan="1" colspan="1">
                    street
                  </th>
                  <th rowspan="1" colspan="1">
                    gender
                  </th>
                  <th rowspan="1" colspan="1">
                    salary
                  </th>
                  <th rowspan="1" colspan="1">
                    position
                  </th>
                  <th rowspan="1" colspan="1">
                    date of start
                  </th>
                  <th rowspan="1" colspan="2">
                    control
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <?php include "inc/footer.php" ?>



