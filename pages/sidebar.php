<?php

// Include database connection file
include_once('db.php');


?>



<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <?php if ($_SESSION['ROLE'] == 'Vendor') { ?>


          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="vendor_dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Vendor-Dashboard</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="upload_invoice.php" aria-expanded="false"><i class="mdi mdi-auto-upload"></i><span class="hide-menu">Upload Invoice</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="vendor_profile.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
          </li>
        <?php } ?>
        <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./new_vendor.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">New Vendors</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./vendors_details.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Vendor List</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payment_info.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Payment Details</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./new_user.php" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">User Set Up</span></a>
          </li><?php } ?>
        <?php if (($_SESSION['ROLE'] == 'Emp')  || ($_SESSION['ROLE'] == 'accountant') ){ ?>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="emp_dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Employees-Dashboard</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="update_invoice.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Update Invoice</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="update_payment.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Payment Details</span></a>
          </li>
        <?php } ?>
        <li class="sidebar-item p-2 ">
          <a href="logout.php" class="
                    btn btn-cyan
                    d-flex
                    align-items-center
                    text-white
                  " aria-expanded="false"><i class="mdi mdi-cloud-download font-20 me-2"></i><span class="hide-menu">Logout</span></a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>