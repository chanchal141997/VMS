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

            $Payment_details = $_FILES['Payment_details'];



            $filename1 = $Payment_details['name'];
            $filerrror1 = $Payment_details['error'];
            $filetmp1 = $Payment_details['tmp_name'];
            $fileext1 = explode('.', $filename1);
            $filecheck1 = strtolower(end($fileext1));
            // $fileextstored1 = array('text/xls', 'xlsx', 'csv','xls');
            $fileextstored1 = array('pdf');
                
          
            if (in_array($filecheck1, $fileextstored1)) {

                $destinationfile1 = '../invoice/' . $filename1;
                            
                move_uploaded_file($filetmp, $destinationfile);
                move_uploaded_file($filetmp1, $destinationfile1);

                $q = " update invoice_details set  Payment_details=' $destinationfile1'
             where id=$id  ";

                $query = mysqli_query($connection, $q);
                if ($query) {
                    echo "<script>
                alert('Payment Details Updated succussfully!!');
                window.location.href='update_payment.php'
            </script>";
                } 
                
                }
                // else {
                //     echo "<script>
                //      alert('Kindly Upload Excel & csv File!!');
                //      window.location.href='update_payment.php'</script>";
                //     }
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
                                        <h4 class="card-title"> Update Payment Details </h4>
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
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Attach PO/WO/Email Order </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="po" disabled value="<?php echo $row['po']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Attach Signed Delivery Receipt</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="signed_receipt" disabled value="<?php echo $row['signed_receipt']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">IGRN</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="IGRN" disabled value="<?php echo $row['IGRN']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Job No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="job_no" disabled value="<?php echo $row['job_no']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Payment detail</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="lname" name="Payment_details" />
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