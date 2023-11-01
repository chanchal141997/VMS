<?php include './db.php'; ?>

<?php
if (isset($_POST['approve'])) {
    $vendor_no = $_POST['vendor_no'];
    $emp_code=$_POST['emp_code'];
    $c_name = $_POST['c_name'];
    $c_address = $_POST['c_address'];
    $c_person = $_POST['c_person'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $msme = $_POST['msme'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "Vendor";
    $status = 1;
    $id = $_GET['id'];
    $vendor_id = $id + 1;
    $query = "INSERT INTO `vendor`(`vendor_id`,`emp_code`,`c_name`, `c_address`, `c_person`, `number`, `email`, `pan`, `gst`, `msme`,`status`,`vendor_no`)
 VALUES('$vendor_id','$emp_code','$c_name','$c_address','$c_person','$number','$email','$pan','$gst','$msme','$status','$vendor_no')";
    $sql = mysqli_query($connection, $query);

    // email sent to vendor
    if ($sql) {
        $message = "<div>
         <h3><b>Approved successfully!!</b></h3>
         <h4>Hello !your vendor registration has been successfully Done. Now You can Login.<br> Company Name: $c_name,<br>  Email: $email <br> username:$username,<br>  password:$password ;</h4>
        </div>";

        include_once("reset_pass/SMTP/class.phpmailer.php");
        include_once("reset_pass/SMTP/class.smtp.php");
        // $email_1 = "vasant@asmoloobhoy.com";
        $email = $email;
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = "web.technoriya@gmail.com";
        $mail->Password = "egpgpapyzaitbxtp";
        $mail->setFrom('web.technoriya@gmail.com', 'web Team');
        $mail->FromName = "VMS";
        $mail->AddAddress($email);
        $mail->Subject = "Login Details!!";
        $mail->isHTML(TRUE);
        $mail->Body = $message;
        if ($mail->send()) {
            $msg = "We have e-mailed!";
        }
    }

    //end code

    //data send to admin for login
    if ($sql) {
        echo '<script> alert("Vendor approved successfully.....")</script>';

        $query1 = "INSERT INTO `admin`(`name`, `username`, `password`, `role`, `email`,`vendor_id`,`vendor_no`) 
        Values('$c_name','$username','$password','$role','$email','$vendor_id','$vendor_no')";
        $sql1 = mysqli_query($connection, $query1);
        if ($sql1) {
            echo '<script> alert("User ID & password Is created! Now Vendor Can login")
                window.location.href="vendors_details.php";
                </script>';
        } else {
            echo "Not Created!!";
        }
    } else {
        echo '<script> alert("Not Approved???" ) </script>';
    }



    // $id = $_GET['id'];
    $query2 = "UPDATE `vender_ragister` set status=1 where id='$id'";
    $sql2 = mysqli_query($connection, $query2);
} else {
    echo "Server Error!!!";
}
?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM `vender_ragister` where id='$id'";
$sql = mysqli_query($connection, $query);
if ($sql->num_rows > 0) {

    while ($row = $sql->fetch_assoc()) {
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
                                            <h4 class="card-title">New Vendor Registration Details</h4>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Vendor No <span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="fname" name="vendor_no" placeholder="Enter vendor no" required />
                                                </div>
                                            </div>
                                            
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Employee code/Name <span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <!-- <input type="text" class="form-control" id="fname" name="emp_code" placeholder="Enter Employee code" required /> -->
                                                            <select class="select2 form-select shadow-none form-control form-control-lg" style="height: 22px" name="emp_code">
                                                            <?php

                                            $query1 = "SELECT * FROM `admin` where role='Emp'";
                                            $sql1 = mysqli_query($connection, $query1);
                                            if ($sql1->num_rows > 0) {

                                                while ($row1 = $sql1->fetch_assoc()) {

                                            ?>
                                                                <option class="form-control" value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>

                                                                <?php  }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Company Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fname" name="c_name" value="<?php echo $row['c_name']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Company Address </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="c_address" value="<?php echo $row['c_address']; ?>" />
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
                                                            <input type="text" class="form-control" id="lname" name="pan" value="<?php echo $row['pan']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">GST No:</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="gst" value="<?php echo $row['gst']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">MSME NO:</label>
                                                        <div class="col-md-9">

                                                            <input type="text" class="form-control" name="msme" id="answer" value="<?php
                                                                                                                                    if ($row['msme']) {
                                                                                                                                        echo $row['msme'];
                                                                                                                                    } else echo  "NA" ?>" />

                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" style="display:none" value="<?php echo $row['username']; ?>" />
                                                    <input type="text" class="form-control" name="password" style="display:none" value="<?php echo $row['password']; ?>" />


                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="approve" class="btn btn-info" value="Approve">


                                                <a href="vendors_details.php" class="btn btn-danger" value="Cancel">Cancel</a>

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