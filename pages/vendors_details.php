<?php
session_start(); ?>
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

 $record = mysqli_num_rows(mysqli_query($connection, "select * from vendor"));
 $pagi = ceil($record / $per_page);

 $sql = "select * from vendor limit $start,$per_page";
 $res = mysqli_query($connection, $sql);
 $first_page = 1;
 $next_page = $current_page + 1;
 $previous_page = $current_page - 1;


?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Vendor List </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Vender Details
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
                        <h5 class="card-title">Vendor DataBase</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vendor No:</th>
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Contact Person</th>
                                        <th>Number</th>
                                        <th>Email Id</th>
                                        <th>PAN No</th>
                                        <th>GST No</th>
                                        <th>MSME </th>
                                        <th>Emp Code/Name</th>
								
                                        <th>EDIT</th>
                                        
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                        ?>

                                            <tr>
                                                <td> <?php echo $row['vendor_no']; ?></td>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php echo $row['c_address']; ?></td>
                                                <td><?php echo $row['c_person']; ?></td>
                                                <td><?php echo $row['number']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['pan']; ?></td>
                                                <td><?php echo $row['gst']; ?></td>
                                                <td><?php echo $row['msme']; ?></td>
                                                <td><?php echo $row['emp_code']; ?></td>
												   
                                                <td>
                                                    <a class="btn btn-info" href="edit_vendor.php?vendor_id=<?php echo $row['vendor_id']; ?>" class="text-white"> Edit </a>
                                                </td>
                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                   
                    <div class="d-flex justify-content-end align-items-end flex-wrap gap-1">

                        <a class="btn btn-info" href="vendors_details.php?start=<?php echo $first_page; ?>">First</a>
                        <a class="btn btn-info" href="vendors_details.php?start=<?php echo $previous_page; ?>"><< Prev</a>
                        <a class="btn btn-info" href="vendors_details.php?start=<?php echo $next_page; ?>">Next >></a>
                         <a class="btn btn-info" href="vendors_details.php?start=<?php echo $pagi; ?>">Last</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>