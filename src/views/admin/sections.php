<?php include "inc/header.php" ?>
    <div class="card col-sm-8 m-auto">
        <div class="card-header">
            <h3 class="card-title"><?=$pagedisc?> </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <span>
                <a class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#exampleModalCenteradd">
                    <i class="fa fa-edit text-plus mr-1" ></i> Add Section
                </a>
                <div class="modal fade" id="exampleModalCenteradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" action="/admin/Sections/store/<?=$categorie?>" method="POST">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="inputName" placeholder="Section Name" name="section">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add section</button>
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
                        <th>sections</th>
                        <th>brands</th>
                        <th style="width: 200px;text-align:center">control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($sections)) :
                            $id = 1;
                            foreach($sections as $section) :
                    ?>
                    <tr>
                        <td><?=$id++?>.</td>
                        <td><?=$section['name']?></td>
                        <td><a href="/admin/Brands/index/<?=$section['id']?>/<?=$categorie?>">brands</a></td>
                        <td class="text-center">
                            <span>
                                <a>
                                    <i class="fa fa-edit text-success mr-1" data-toggle="modal" data-target="#exampleModalCenteredit<?=$section['id']?>"></i>
                                </a>
                                <div class="modal fade" id="exampleModalCenteredit<?=$section['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <form class="form-horizontal" action="/admin/sections/update/<?=$section['id']?>/<?=$categorie?>" method="POST">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit section Name</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputName" value="<?=$section['name']?>" placeholder="section Name" name="section">
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
                                <a href="/admin/sections/delete/<?=$section['id']?>/<?=$categorie?>">
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
