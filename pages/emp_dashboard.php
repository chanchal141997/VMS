<?php
session_start(); ?>

<?php include './db.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php 
$sql="SELECT IGRN FROM invoice_details WHERE IGRN!= ' ' ";
$query=mysqli_query($connection,$sql);
$IGRN=mysqli_num_rows($query);

?>
<?php 
$sql1="SELECT * FROM invoice_details";
$query1=mysqli_query($connection,$sql1);
$invoice=mysqli_num_rows($query1);
?>
<?php 
$sql2="SELECT Payment_details FROM invoice_details WHERE Payment_details!=' '";
$query2=mysqli_query($connection,$sql2);
$payment=mysqli_num_rows($query2);
?>
<?php 
$display_sql = "select * from vendor";
$query3 = mysqli_query($connection, $display_sql);
$vendor=mysqli_num_rows($query3);
?>
<div class="page-wrapper">
<div class="container-fluid">

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-3">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1"><?php echo $vendor; ?></h5>
                                <small class="font-light">No. of Vendor</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-plus fs-3 font-16"></i>
                                <h5 class="mb-0 mt-1"><?php echo $invoice; ?></h5>
                                <small class="font-light">No. of Invoices</small>
                            </div>
                        </div>
                        <div class="col-3" >
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1"><?php echo $IGRN; ?></h5>
                                <small class="font-light">No. of IGRN</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1"><?php echo $payment; ?></h5>
                                <small class="font-light">No. of Payment Details</small>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div></div></div></div></div>


                <?php include 'footer.php'; ?>