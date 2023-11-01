<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php'; ?>
<?php
$id = $_GET['id'];

$display_sql = "select  * from `invoice_details` where id='$id'";
$query = mysqli_query($connection, $display_sql);


if ($query->num_rows > 0) {

    while ($row = $query->fetch_assoc()) {
?>
        <?php

        if (isset($_POST['upload'])) {
            $id = $_GET['id'];


            $po = $_FILES['po'];
            $filename = $po['name'];
            $filerrror = $po['error'];
            $filetmp = $po['tmp_name'];
            $fileext = explode('.', $filename);
            $filecheck = strtolower(end($fileext));
            $fileextstored = array('png', 'pdf', 'jpeg');


            if (in_array($filecheck, $fileextstored)) {
                $destinationfile = '../invoice/' . $filename;
                // $destinationfile1 = '../invoice/' . $filename1;

                move_uploaded_file($filetmp, $destinationfile);
                // move_uploaded_file($filetmp1, $destinationfile1);

                $q = "update invoice_details set po=' $destinationfile'
             where id=$id  ";

                $query = mysqli_query($connection, $q);
                if ($query) {
                    echo "<script> alert('PO Uploaded successfully.....');
                window.location.href='update_invoice.php' 
                </script>";
                } else {
                    echo '<script> alert(" Not updated .....")</script>';
                }
                header("Location:./update_invoice.php");
            } else {
                echo "<script>
                 alert('Kindly Upload Excel & csv File!!');
                 window.location.href='update_payment.php'</script>";
            }
        }
        ?>

        <div class="main-wrapper">
            <div class=" w-100 d-flex no-block justify-content-center align-items-center  ">

                <div class="container-fluid" style="width: 60vw; align-items:center; margin-top:50px">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" enctype='multipart/form-data' action='#' method='post'>
                                    <div class="card-body">
                                        <h4 class="card-title"> Update Invoice </h4>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Invoice No </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname" name="invoice_no" disabled value="<?php echo $row['invoice_no']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Date of Invoice </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" disabled id="lname" name="invoice_date" disabled value="<?php echo $row['invoice_date']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Invoice Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="invoice_amt" disabled value="<?php echo $row['invoice_amt']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Attach Invoice</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="invoice" disabled value="<?php echo $row['invoice']; ?>" />
                                            </div>
                                        </div>

                                       
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">PO</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="lname" name="po" />
                                        </div>
                                    </div>

                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <input type="submit" name="upload" class="btn btn-info" value="Upload">
                                    <a href="update_invoice.php" class="btn btn-danger" value="Cancel">Cancel</a>

                                </div>
                            </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        </div>



<?php }
} ?>




<?php include 'footer.php'; ?>