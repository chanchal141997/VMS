<?php
session_start(); ?>


<?php include './db.php';

if (isset($_POST['edit'])) {

    $id = $_GET['id'];
    $name = $_POST['name'];
    $email= $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $q = " update admin set name='$name',username='$username',password='$password',email='$email' where id=$id ";
    $query = mysqli_query($connection, $q);
    if ($query) {
        echo '<script> alert("Emp Details Updated successfully.....")</script>';
        header("Location:./new_user.php");
    } else {
        echo '<script> alert(" Not updated .....")</script>';
    }
}

?>
<?php include 'db.php';
$id = $_GET['id'];

$display_sql = "select  * from `admin` where id='$id'";
$query = mysqli_query($connection, $display_sql);



if ($query->num_rows > 0) {

    while ($row = $query->fetch_assoc()) {
?>

        <!DOCTYPE html>
        <html dir="ltr">

        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <meta name="robots" content="noindex,nofollow" />
            <title>VMS</title>
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
            <!-- Custom CSS -->
            <link href="../dist/css/style.min.css" rel="stylesheet" />

        </head>

        <body>
            <div class="main-wrapper">
                <div class=" w-100 d-flex no-block justify-content-center align-items-center bg-dark ">

                    <div class="container-fluid" style="width: 60vw; align-items:center; margin-top:50px">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <form class="form-horizontal" method="POST" action="#">
                                        <div class="card-body">
                                            <h4 class="card-title">Edit Employees Login Details</h4>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email Id </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"  name="email" value="<?php echo $row['email']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">UserName </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"  name="username" value="<?php echo $row['username']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"  name="password" value="<?php echo $row['password']; ?>" />
                                                </div>
                                            </div>
                                           
                                           
                                           
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="edit" class="btn btn-info" value="Edit">


                                                <a href="new_user.php" class="btn btn-danger" value="Cancel">Cancel</a>

                                            </div>
                                        </div>
                                    </form>
                            <?php }
                    } ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <script src="../assets/libs/jquery/dist/jquery.min.js"></script>

            <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $("input[type='radio']").change(function() {

                    if ($(this).val() == "YES") {
                        $("#answer").show();
                    } else {
                        $("#answer").hide();
                    }

                });
            </script>
        </body>

        </html>

        <?php include 'footer.php'; ?>