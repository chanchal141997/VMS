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


// Check if the search term is provided
if(isset($_GET['search'])){
    $search = $_GET['search'];
    
    // Perform the search query
    $sql = "SELECT * FROM invoice_details WHERE c_name LIKE '%$search%' OR invoice_no LIKE '%$search%' ";
    $result = $connection->query($sql);
    
   
?>



?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Search Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <form action="search_invoice.php" method="post">
                                <input type="text" name="search"> <input type="submit" name="search" value="Search">
                            </form> -->
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Search Details
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
                        <h5 class="card-title">Invoice DataBase</h5>
                        <div class="table-responsive div1">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Emp Code/Name </th>
										<th>Company </th>
                                        <th>Company Name</th>
                                        <th>Invoice No:</th>
                                        <th>Date of Invoice</th>
                                        <th>Invoice Amount</th>
										<th>Comment</th>
                                        <th>Invoice</th>
                                        <th>PO/WO/Email</th>
                                        <th>Signed Receipt</th>
                                        <th>Proof of Transportation </th>
                                        <th>Eway Bill</th>
                                        <th>Payment Details</th>
                                      
                                        <!-- <th>Payment Details</th> -->
                                        <th>Edit </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                     if ($result->num_rows > 0) {
                                        // Display the results
                                        while($row = $result->fetch_assoc()) {
                                           
                                       
                                    ?><td><?php echo $row['invoice_type']; ?></td>
									<td><?php echo $row['company_code']; ?></td>
                                               <td><?php echo $row['c_name']; ?></td>
                                                <td> <?php echo $row['invoice_no']; ?></td>
                                                <td><?php echo $row['invoice_date']; ?></td>
                                                <td><?php echo $row['invoice_amt']; ?></td>
									            <td><?php echo $row['comment']; ?></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['invoice']; ?>" target="_blank">View Invoice</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['po']; ?>" target="_blank">View PO/WO</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['signed_receipt']; ?>" target="_blank">Signed Receipt</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['proof_trans']; ?>" target="_blank">View</a></td>
                                                <td><a class="btn btn-outline-info" href="<?php echo $row['eway_bill']; ?>" target="_blank">View</a></td>
                                                
                                                <!-- <td></td> -->
                                                           <td><?php echo $row['Payment_details']; ?></td>
                                                <td> <a class="btn btn-info" href="edit_payment_detail.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></td>
                                                <?php if ($_SESSION['ROLE'] == 'Admin') { ?> 
                                                <td> <a class="btn btn-danger" href="delete_invoice.php?id=<?php echo $row['id']; ?>" class="text-danger">Delete</a></td>
                                                <?php } ?>
                                            </tr>
                                  <?php 
                                   }
                                } else {
                                    echo "No results found.";
                                }
                               }
                                  ?>


                            </table>

                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>