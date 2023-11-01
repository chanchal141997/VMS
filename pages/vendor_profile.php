<?php
session_start();
// if(isset($_SESSION['email'])) {
//     $email = $_SESSION['email'];
// echo $email;
// }
?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';

// if (isset($_SESSION['email'])) {
//     $email = $_SESSION['email'];



//     $query = "Select * from `vendor` where email=$email";
//     $sql = mysqli_query($connection, $query);
// }
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Vendor Profile </h4>
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
                        <h5 class="card-title">Vendor Details</h5>
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
                                        <th>EDIT</th>
                                    </tr>
                                </thead>

                                <tbody><?php
                                        if (isset($_SESSION['email']) ANd ($_SESSION['vendor_id'])) {
                                            $email = $_SESSION['email'];
                                             $id= $_SESSION['vendor_id'];
                                            $query = "SELECT * FROM `vendor` WHERE vendor_id=$id";
                                            $sql = mysqli_query($connection, $query);
                                           //echo $email;
                                            if (!empty($sql) && $sql->num_rows > 0) {
                                                while ($row = $sql->fetch_assoc()) {
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
                                                    <td>
                                                        <a class="btn btn-info" href="edit_v_profile.php?vendor_id=<?php echo $row['vendor_id']; ?>" class="text-white"> Edit </a>
                                                    </td>
                                                </tr>
                                    <?php }
                                            }
                                        } ?>



                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>