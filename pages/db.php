<?php



 $db_host="sg2nlmysql57plsk.secureserver.net:3306";
 $db_user="chanchal";
 $db_pass="chanchal@123";
 $db_name="VMS_2023";

// $db_host="localhost";
// $db_user="root";
// $db_pass="";
// $db_name="VMS_2023";

//sg2nlmysql57plsk.secureserver.net:3306 (default for Percona, v5.7.26)

$connection= mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if($connection){
 //echo "we are connected";
}

?>