<?php include "inc/header.php" ?>
    <div class="card col-sm-8 m-auto">
        <div class="card-header">
            <h3 class="card-title"><?=$pagedisc?> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <span>
                <a class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#exampleModalCenteradd">
                    <i class="fa fa-edit text-plus mr-1" ></i> Add brand
                </a>
                <div class="modal fade" id="exampleModalCenteradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" action="/admin/Brands/store/<?=$section?>/<?=$categorie?>" method="POST">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputName" placeholder="brand Name" name="brand">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add brand</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </span>
            <table class="table table-sm">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>brands</th>
                        <th style="width: 200px;text-align:center">control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($brands)) :
                            $id = 1;
                            foreach($brands as $brand) :
                    ?>
                    <tr>
                        <td><?=$id++?>.</td>
                        <td><?=$brand['name']?></td>
                        <td class="text-center">
                            <span>
                                <a>
                                    <i class="fa fa-edit text-success mr-1" data-toggle="modal" data-target="#exampleModalCenteredit<?=$brand['id']?>"></i>
                                </a>
                                <div class="modal fade" id="exampleModalCenteredit<?=$brand['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <form class="form-horizontal" action="/admin/Brands/update/<?=$brand['id']?>/<?=$section?>/<?=$categorie?>" method="POST">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit brand Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" value="<?=$brand['name']?>" placeholder="brand Name" name="brand">
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
                            <span>
                                <a href="/admin/Brands/delete/<?=$brand['id']?>/<?=$section?>/<?=$categorie?>">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php include "inc/footer.php" ?>
