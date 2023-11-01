<?php
session_start(); ?><?php
if (isset($_SESSION['email']) and ($_SESSION['vendor_id'])) {
    $vendor_id = $_SESSION['vendor_id'];


?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';




?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Invoice uploaded</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Invoice Details
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
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">HELLO !! <?php 
                        $vendor_id = $_SESSION['vendor_id'];
                        $query = "SELECT * FROM `admin` WHERE vendor_id= $vendor_id";
                        $sql = mysqli_query($connection, $query);
                        if ($sql->num_rows > 0) {
                            while ($row = $sql->fetch_assoc()) {
                      echo $row['username']; 
                            }}
                        ?>
                       
                        </h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <?php 
                                $vendor_id = $_SESSION['vendor_id'];
                                $query = "SELECT * FROM `invoice_details` WHERE vendor_id= $vendor_id";
                                $sql = mysqli_query($connection, $query);
                                ?>
                                <thead>
                                    <tr>
                                        <th>Invoice No:</th>
                                        <th>Date of Invoice</th>
                                        <th>Invoice Amount</th>
                                        <th>Invoice</th>
                                        <th>PO/WO/Email</th>
                                        <th>Signed Receipt</th>
                                        <th>IGRN Date</th>
                                        <th>Payment Details</th>
                                        
                                       
                                    </tr>
                                </thead>

                                <tbody style=" overflow: hidden;">
                                    <?php
                                        if ($sql->num_rows > 0) {
                                            while ($row = $sql->fetch_assoc()) {
                                        ?>

                                            <tr>
                                                <td> <?php echo $row['invoice_no']; ?></td>
                                                <td><?php echo $row['invoice_date']; ?></td>
                                                <td><?php echo $row['invoice_amt']; ?></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['invoice']; ?>" target="_blank">View Invoice</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['po']; ?>" target="_blank">View PO/WO</a></td>
                                                 <td><a class="btn btn-outline-info" href="<?php echo $row['signed_receipt']; ?>" target="_blank">Signed Receipt</a></td>

                                                <td>
                                                    <a class="btn btn-outline-info" href="<?php echo $row['IGRN_date']; ?>" target="_blank"><?php echo $row['IGRN_date']; ?></a></td>
                                                <td>
                                                    <a class="btn btn-outline-info" href="<?php echo $row['Payment_details']; ?>" target="_blank"><?php echo $row['Payment_details']; ?></a></td>
                                               
                                                
                          
                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php include 'footer.php'; ?>