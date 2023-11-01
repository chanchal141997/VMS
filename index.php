<?php include './pages/db.php' ?>

<?php
session_start();
if (isset($_SESSION['ID'])) {
  header("Location:pages/dashboard.php");
  exit();
}

// Include database connectivity


if (isset($_POST['submit'])) {
  $errorMsg = "";
  $role = $_POST['role'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  //   $password = $con->real_escape_string(md5($_POST['password']));


  if (!empty($username) || !empty($password)) {
    $query  = "SELECT * FROM admin WHERE username = '$username' && role='$role' && password='$password'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['ID'] = $row['id'];
      $_SESSION['ROLE'] = $row['role'];
      $_SESSION['vendor_id'] = $row['vendor_id'];
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
      header("Location:./pages/dashboard.php");
      die();
    } else {
      //$errorMsg = "No user found on this username";
      echo "<script>
                    alert('No user found on this username');
                    window.location.href='index.php'
                </script>";
    }
  } else {
   // $errorMsg = "Username and Password is required";
   
    echo "<script>
    alert('Username and Password is required');
    window.location.href='index.php'
</script>";
    

  }
}
?>



<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="dist/css/style.min.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .bg-gray{
        background-color: gray;
      }
    </style>
</head>

<body>
  <div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-light
          h-100
        "><br><br>
      <div class="auth-box bg-light  border-secondary" style="margin-top: 30px;">
        <div id="loginform">
          <div class="text-center pt-3 pb-3">
            <span class="db"><img src="assets/images/logo-1.png" alt="logo"  width="65%"/></span>
          </div>
          <!-- Form -->
          <form method="post" class="form-horizontal mt-3" id="loginform" action="#">
            <div class="row pb-4">
              <div class="col-12">
                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text bg-gray text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                  </div>

                  <select class="select2 form-select shadow-none form-control form-control-lg" style=" height: 46px" name="role">
                    <option class="form-control">Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Emp">Employees</option>
                    <option value="Vendor">Vendor</option>
                    <option value="accountant">Accountant</option>



                  </select>

                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-gray text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                  </div>
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" />
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-gray text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" />
                </div>
              </div>
              <div class="pt-3">
              <button type="submit" name="submit" class="btn btn-info btn-lg text-white">
                  Login
                </button>
                <a href="./pages/reset_pass/forgot.php" class="btn float-end btn-info" id="to-recover" type="button">
                  <i class="mdi mdi-lock fs-4 me-1"></i> Forget Password?
                </a>
               
              </div>
            </div>
          </form>
          <div class="row border-top border-secondary">
            <div class="col-12"><br>
              <center>
                <div class="form-group ">
                  <a href="./v_register.php" class="text-white">
                    <button type="submit" class="btn btn-info btn-lg text-white"> Vendor Registration
                    </button> </a>
                </div>
				  <div class="form-group ">
                  <a href="" class="text-white">
                    <button >Vendor Manual
                    </button> </a>
                </div>
              </center>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
    $("#to-login").click(function() {
      $("#recoverform").hide();
      $("#loginform").fadeIn();
    });
  </script>
</body>

</html>