<?php include('./pages/db.php');
# create database connection

if(!empty($_POST["username"])) {
  $query = "SELECT * FROM admin WHERE username='" . $_POST["username"] . "'";
  $result = mysqli_query($connection,$query);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "<span style='color:red'> Sorry User already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
    echo "<span style='color:green'> User available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


if(!empty($_POST["email"])) {
    $query = "SELECT * FROM admin WHERE email='" . $_POST["email"] . "'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
    if($count>0) {
      echo "<span style='color:red'> Sorry Email Id already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
      echo "<span style='color:green'> Email available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }

  if(!empty($_POST["pan"])) {
    $query = "SELECT * FROM vendor WHERE pan='" . $_POST["pan"] . "'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
    if($count>0) {
      echo "<span style='color:red'> Sorry Pan no is already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
      echo "<span style='color:green'> Pan no is available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
  if(!empty($_POST["gst"])) {
    $query = "SELECT * FROM vendor WHERE gst='" . $_POST["gst"] . "'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
    if($count>0) {
      echo "<span style='color:red'> Sorry GST No already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
      echo "<span style='color:green'> GST No is available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }

  if(!empty($_POST["invoice_no"])) {
    $query = "SELECT * FROM invoice_details WHERE invoice_no='" . $_POST["invoice_no"] . "'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
    if($count>0) {
      echo "<span style='color:red'> Sorry Invoice No already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
      echo "<span style='color:green'> Invoice No is available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
?>