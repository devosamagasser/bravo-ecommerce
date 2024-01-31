<?php include "inc/header.php" ?>



<div class="container mb-3">
    <?php alert() ?>
    <div class="card card-primary">
        <div class="card-header row">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <form action="/admin/Users/store" method="POST">
            <div class="card-body row justify-content-center" style="background-color: #e3e4eb;">
                <div class="form-group col-sm-8">
                    <label for="name">Name</label>
                    <input type="text" name='name' class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group col-sm-8">
                    <label for="email">Email</label>
                    <input type="text" name='email' class="form-control"  id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group col-sm-8">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name='password'class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group col-sm-8">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                </div>
                <div class="form-group col-sm-8">
                    <label for="salary">salary</label>
                    <input type="salary" name="salary" class="form-control" placeholder="salary">
                </div>
                <div class="form-group row col-sm-8">
                    <div class="col-sm-6">
                        <label for="position">position</label>
                        <select name="position" class="form-control">
                            <?php 
                                if(!empty($positions)) :
                                    foreach($positions as $position) :
                            ?>
                            <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="gender">gender</label>
                        <select name="gender" class="form-control ">
                            <option value="0" value="male">male</option>
                            <option value="1" value="female">female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row col-sm-8">
                    <div class="col-sm-6">
                        <label for="country">country</label>
                        <select name="country" class="form-control">
                        <?php 
                                if(!empty($countries)) :
                                    foreach($countries as $country) :
                            ?>
                            <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="city">city</label>
                        <select name="city" class="form-control ">
                        <?php 
                                if(!empty($cities)) :
                                    foreach($cities as $city) :
                            ?>
                            <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-8">
                    <label for="street">street</label>
                    <input type="street" name="street" class="form-control" placeholder="Street">
                </div>
            </div>
            <div class="card-footer row justify-content-center">
                <button type="submit" class="btn btn-primary col-sm-8">Submit</button>
            </div>
        </form>
    </div>
</div>
        
<?php include "inc/footer.php" ?>
