<?php
$server = "sg2nlmysql57plsk.secureserver.net:3306";
$username = "chanchal";
$password = "chanchal@123";
$database = "VMS_2023";
$connection = mysqli_connect("$server","$username","$password");
$select_db = mysqli_select_db($connection, $database);
if(!$select_db)
{
	echo("connection terminated");
}
?>