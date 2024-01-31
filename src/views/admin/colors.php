<?php include "inc/header.php" ?>
<?=alert()?>
    <div class="card col-sm-8 m-auto">
        <div class="card-header">
            <h3 class="card-title"><?=$pagedisc?> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <span>
                <a class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#exampleModalCenteradd">
                    <i class="fa fa-edit text-plus mr-1" ></i> Add Color
                </a>
                <div class="modal fade" id="exampleModalCenteradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" action="/admin/Colors/store" method="POST">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Color</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputName" placeholder="Color Name" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputName" placeholder="Color code" name="code">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Color</button>
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
                        <th>Name</th>
                        <th>Code</th>
                        <th>Color</th>
                        <th style="width: 200px;text-align:center">control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($colors)) :
                            $id = 1;
                            foreach($colors as $color) :
                    ?>
                    <tr>
                        <td><?=$id++?>.</td>
                        <td><?=$color['color']?></td>
                        <td><?=$color['code']?></td>
                        <td><div style="width:20px;height:20px;border-radius:50%;border:1px solid black;background-color:<?=$color['code']?>"></div></td>
                        <td class="text-center">
                            <span>
                                <a>
                                    <i class="fa fa-edit text-success mr-1" data-toggle="modal" data-target="#exampleModalCenteredit<?=$color['color_id']?>"></i>
                                </a>
                                <div class="modal fade" id="exampleModalCenteredit<?=$color['color_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <form class="form-horizontal" action="/admin/Colors/update/<?=$color['color_id']?>" method="POST">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Color Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" value="<?=$color['color']?>" placeholder="brand Name" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" value="<?=$color['code']?>" placeholder="brand Name" name="code">
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
                                <a href="/admin/Colors/delete/<?=$color['color_id']?>">
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
