<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php'; ?>
<?php
if (isset($_SESSION['email']) and ($_SESSION['vendor_id']) and ($_SESSION['name'])) {
    $email = $_SESSION['email'];
    $vendor_id = $_SESSION['vendor_id'];
    $c_name = $_SESSION['name'];

?>
    <?php
    if (isset($_POST['upload'])) {
        $vendor_id = $_SESSION['vendor_id'];
        $c_name = $_SESSION['name'];
$company_code=$_POST['company_code'];
        $invoice_type = $_POST['invoice_type'];
        $invoice_no = $_POST['invoice_no'];
        $invoice_date = date('Y-m-d H:i:s');
        $invoice_amt = $_POST['invoice_amt'];
        $comment = $_POST['comment'];

        $invoice = $_FILES['invoice'];
        $po = $_FILES['po'];
        $signed_receipt = $_FILES['signed_receipt'];
        $proof_trans = $_FILES['proof_trans'];
        $eway_bill = $_FILES['eway_bill'];


        $filename = $invoice['name'];
        $filerrror = $invoice['error'];
        $filetmp = $invoice['tmp_name'];
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png', 'pdf', 'jpeg');

        $filename1 = $po['name'];
        $filerrror1 = $po['error'];
        $filetmp1 = $po['tmp_name'];
        $fileext1 = explode('.', $filename1);
        $filecheck1 = strtolower(end($fileext1));
        $fileextstored1 = array('png', 'pdf', 'jpeg');

        $filename2 = $signed_receipt['name'];
        $filerrror2 = $signed_receipt['error'];
        $filetmp2 = $signed_receipt['tmp_name'];
        $fileext2 = explode('.', $filename1);
        $filecheck2 = strtolower(end($fileext1));
        $fileextstored2 = array('png', 'pdf', 'jpeg');

        $filename3 = $proof_trans['name'];
        $filerrror3 = $proof_trans['error'];
        $filetmp3 = $proof_trans['tmp_name'];
        $fileext3 = explode('.', $filename1);
        $filecheck3 = strtolower(end($fileext1));
        $fileextstored3 = array('png', 'pdf', 'jpeg');

        $filename4 = $eway_bill['name'];
        $filerrror4 = $eway_bill['error'];
        $filetmp4 = $eway_bill['tmp_name'];
        $fileext4 = explode('.', $filename1);
        $filecheck4 = strtolower(end($fileext1));
        $fileextstored4 = array('png', 'pdf', 'jpeg');


        if (in_array($filecheck, $fileextstored)) {
            $destinationfile = '../invoice/' . $filename;
            $destinationfile1 = '../invoice/' . $filename1;
            $destinationfile2 = '../invoice/' . $filename2;
            $destinationfile3 = '../invoice/' . $filename3;
            $destinationfile4 = '../invoice/' . $filename4;

            move_uploaded_file($filetmp, $destinationfile);
            move_uploaded_file($filetmp1, $destinationfile1);
            move_uploaded_file($filetmp2, $destinationfile2);
            move_uploaded_file($filetmp3, $destinationfile3);
            move_uploaded_file($filetmp4, $destinationfile4);

            $query = "INSERT INTO `invoice_details`(`invoice_type`,`vendor_id`,`c_name`,`company_code`, `invoice_no`, `invoice_date`, `invoice_amt`, `invoice`, `po`, `signed_receipt`,`proof_trans`,`eway_bill`, `comment`) VALUES ('$invoice_type','$vendor_id','$c_name','$company_code','$invoice_no','$invoice_date','$invoice_amt','$destinationfile','$destinationfile1','$destinationfile2','$destinationfile3','$destinationfile4','$comment')";
            $sql = mysqli_query($connection, $query);
            if ($sql) {
                echo '<script> alert("Invoice Details Uploaded successfully.....")</script>';
            } else {
                echo '<script> alert("Not Uploaded.....")</script>';
            }
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
                                    <h4 class="card-title"> Upload New Invoice </h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-end control-label col-form-label">Select Invoice Type <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="select2 form-select shadow-none form-control form-control-lg" style="height: 22px" name="invoice_type">
                                                <option class="form-control">Select</option>
                                                <option value="Tax Invoice">Tax Invoice</option>
                                                <option value="Performa Invoice">Proforma Invoice</option>

                                            </select>
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-end control-label col-form-label">Company Code </label>
                                         <div class="col-sm-8"><span id="invoice-no"></span>
                                            <input type="text" class="form-control" id="" name="company_code" placeholder="Enter company code" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-end control-label col-form-label">Invoice No <span class="text-danger">*</span></label>
                                         <div class="col-sm-8"><span id="invoice-no"></span>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" onInput="checkInvoiceNo()" placeholder="Enter Invoice No" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Date of Invoice <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="lname" name="invoice_date" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Invoice Amount <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="lname" name="invoice_amt" placeholder="Enter Invoice Amt" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Invoice <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="lname" name="invoice" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach PO/WO/Email Order</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="lname" name="po"  />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attached Signed DC/Service Report <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="lname" name="signed_receipt" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Proof of Transportation </label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="lname" name="proof_trans" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Eway Bill Copy </label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="lname" name="eway_bill" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-4 text-end control-label col-form-label">Comments</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="lname" name="comment" maxlength="200" />
                                        </div>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" name="upload" class="btn btn-info" value="Upload">

                                        <a href="vendor_profile.php" class="btn btn-danger" value="Cancel">Cancel</a>

                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function checkInvoiceNo() {
            jQuery.ajax({
                url: "../check_availability.php",
                data: 'invoice_no=' + $("#invoice_no").val(),
                type: "POST",
                success: function(data) {
                    $("#invoice-no").html(data);
                },
                error: function() {}
            });
        }
    </script>

<?php } ?>













<?php include 'footer.php'; ?>