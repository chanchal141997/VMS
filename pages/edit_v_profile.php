<?php
session_start(); ?>


<?php include './db.php';

if (isset($_POST['edit'])) {

    $id = $_GET['vendor_id'];

    $c_name = $_POST['c_name'];
    $c_address = $_POST['c_address'];
    $c_person = $_POST['c_person'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $msme = $_POST['msme'];

    $q = " update vendor set id=$id,c_person='$c_person',number='$number',
    email='$email' where vendor_id=$id  ";

    $admin_q = "update admin set email='$email' where vendor_id=$id";

    $admin_query = mysqli_query($connection, $admin_q);
    $query = mysqli_query($connection, $q);
    if ($query) {
        echo '<script> alert("Vendor Details Updated successfully.....")</script>';
        header("Location:./vendor_profile.php");
    } else {
        echo '<script> alert(" Not updated .....")</script>';
    }
}

?>
<?php include 'db.php';
$id = $_GET['vendor_id'];

$display_sql = "select  * from `vendor` where vendor_id='$id'";
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
                                            <h4 class="card-title">Edit Vendor Details</h4>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Company Name </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="<?php echo $row['c_name']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Company Address </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" disabled value="<?php echo $row['c_address']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Contact Person Name </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" name="c_person" value="<?php echo $row['c_person']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Contact No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" name="number" value="<?php echo $row['number']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email ID </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" name="email" value="<?php echo $row['email']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">PAN No:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" disabled value="<?php echo $row['pan']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">GST No:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname" disabled value="<?php echo $row['gst']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">MSME NO:</label>
                                                <div class="col-md-9">

                                                    <input type="text" class="form-control" disabled id="answer" value="<?php
                                                                                                                        if ($row['msme']) {
                                                                                                                            echo $row['msme'];
                                                                                                                        } else echo  "NA" ?>" />

                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <input type="text" class="form-control" name="username"  id="answer"disabled value="<?php echo $row['username']; ?>">
                                                <input type="text" class="form-control" name="password" id="answer" disabled  value="<?php echo $row['password']; ?>">
                                            </div> -->

                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="edit" class="btn btn-info" value="Edit">


                                                <a href="vendor_profile.php" class="btn btn-danger" value="Cancel">Cancel</a>

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