<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';?>

<?php 
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="INSERT INTO `admin`(`name`, `username`, `password`, `role`, `email`) VALUES ('$name','$username','$password','$role','$email')";
$query=mysqli_query($connection,$sql);
if($query){
    echo '<script> alert("User Added successfully.....")</script>';
}else{
    echo "not inserted";
}
}
else{
    echo "invalid";
}
?>
<?php
$query = "Select * from admin where role='Emp' OR role='accountant' OR role='Admin' ";
//$query = "Select * from admin";
$sql = mysqli_query($connection, $query);
?>


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User List </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                User Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            1) Create User
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="#" >
                            <div class="card-body">
                                <h4 class="card-title">User Info</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="name" placeholder="First Name Here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Email Id <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="cono1" name="email" placeholder="Contact No Here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">User Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" name="username" placeholder="UserName Here" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="lname" name="password" placeholder="Password Here" required/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-select shadow-none" name="role" style="width: 100%; height: 36px" required>
                                            <option>Select</option>

                                            <option value="Admin">Admin</option>
                                            <option value="Emp">Employees</option>
                                             <option value="accountant">Accountant</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <input type="submit" name="submit" value="Add User" class="btn btn-primary">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2) All Users Details
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <h5 class="card-title">User DataBase</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Edit</th>
										<th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($sql->num_rows > 0) {
                                            while ($row = $sql->fetch_assoc()) {
                                        ?>

                                            <tr>
                                                
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['role']; ?></td>
                                                <td><a class="btn btn-info" href="edit_user.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></td>
												<td><a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['id']; ?>" class="text-white">Delete</a></td>
                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-12">


                <div class="card">


                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include 'footer.php'; ?>