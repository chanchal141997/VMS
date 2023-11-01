<?php
   session_start();
   session_destroy();
   //session_unset($_SESSION['ID']);
  // session_unset($_SESSION['name']);
   //session_unset($_SESSION['ROLE']);
   
   header("Location:../index.php");
   die();
?>