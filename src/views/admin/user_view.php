
<?php 
include "inc/header.php" ;

?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=$pagedisc?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dt-buttons btn-group flex-wrap">               
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="example1_filter" class="dataTables_filter">
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <a href="/admin/Users/add" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Add User</a>
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
                    email
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                    phone
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    country
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    city
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    street
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    gender
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    salary
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    position
                  </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    date of start
                  </th>
                  <th rowspan="1" colspan="2" aria-label="CSS grade: activate to sort column ascending">
                    control
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(!empty($data['users_data'])) :
                    $id = 1;
                    foreach($data['users_data'] as $user) :
                ?>
                <tr>
                  <td><?= $id++ ?></td>
                  <td class="dtr-control sorting_1" tabindex="0"><?= $user['name'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><?= $user['phone'] ?></td>
                  <td><?= $user['country'] ?></td>
                  <td><?= $user['city'] ?></td>
                  <td><?= $user['street'] ?></td>
                  <td><?= ($user['gender']==0)? 'male' : 'female' ?></td>
                  <td><?= $user['salary'] ?></td>
                  <td><?= $user['position'] ?></td>
                  <td><?= $user['date_of_start'] ?></td>
                  <td class="row justify-content-around align-items-center">
                    <a href="/admin/Users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    <a href="/admin/Users/delete/<?= $user['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
        <div class="row">
          <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  <?php include "inc/footer.php" ?>
