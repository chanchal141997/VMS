<?php
session_start(); ?>
<style>
		.div1 {
    width: 600px;
    height: 500px;
    overflow: scroll;
   
}

.div1 table {
    border-spacing: 0;
}

.div1 tr>th {
    border-left: none;
    border-right: 1px solid #bbbbbb;
    padding: 5px;
    width: 80px;
    min-width: 80px;
    position: sticky;
    top: 0;
    background: #727272;
    color: #e0e0e0;
    font-weight: normal;
	height:40px;
	background-color:gray;
}

.div1 td {
    border-left: none;
    border-right: 1px solid #bbbbbb;
    border-bottom: 1px solid #bbbbbb;
    padding: 5px;
    width: 80px;
    min-width: 80px;
}
</style>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';


$per_page = 5;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}

$record = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `invoice_details` where Payment_details=' '"));
$pagi = ceil($record / $per_page);

$sql = "select * from `invoice_details` where Payment_details=' ' limit $start,$per_page";
$res = mysqli_query($connection, $sql);
$first_page = 1;
$next_page = $current_page + 1;
$previous_page = $current_page - 1;


?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Invoice Update</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
					
                        <ol class="breadcrumb">
								<form method="post" action="report.php" >
                <input type="submit" name="report" class="btn btn-success" value="Export" />
								</form>
							
                             <form action="search_payment.php" method="get">
                                <input type="text" name="search" placeholder="Enter Company Name OR Invoce no" style="padding: 5px;margin:5px;">
                                <input type="submit" value="Search" style="padding: 5px;margin:5px;">
                            </form>
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
                        <h5 class="card-title">Invoice DataBase</h5>
                        <div class="table-responsive div1">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr><th>Company Name</th>
										<th>Company</th>
                                        <th>Invoice No:</th>
                                        <th>Date of Invoice</th>
                                        <th>Invoice Amount</th>
										
                                        <th>Invoice</th><th>Comment</th>
                                        <th>PO/WO/Email</th>
                                        <th>Signed Receipt</th>
                                        <th>IGRN</th>
                                        <th>Payment Details</th>
                                        <th>Edit </th>
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                        ?>

                                            <tr><td><?php echo $row['c_name']; ?></td>
												<td><?php echo $row['company_code']; ?></td>
                                                <td> <?php echo $row['invoice_no']; ?></td>
                                                <td><?php echo $row['invoice_date']; ?></td>
                                                <td><?php echo $row['invoice_amt']; ?></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['invoice']; ?>" target="_blank">View Invoice</a></td>
												<td><?php echo $row['comment']; ?></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['po']; ?>" target="_blank">View PO/WO</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['signed_receipt']; ?>" target="_blank">Signed Receipt</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['IGRN']; ?>" target="_blank">View IGRN</a></td>
                                                <td><?php echo $row['Payment_details']; ?></td>
                                                <td> <a class="btn btn-info" href="edit_payment_detail.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></td>

                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-end flex-wrap gap-1">

                        <a class="btn btn-info" href="update_payment.php?start=<?php echo $first_page; ?>">First</a>
                        <a class="btn btn-info" href="update_payment.php?start=<?php echo $previous_page; ?>"><< Prev</a>
                        <a class="btn btn-info" href="update_payment.php?start=<?php echo $next_page; ?>">Next >></a>
                         <a class="btn btn-info" href="update_payment.php?start=<?php echo $pagi; ?>">Last</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>