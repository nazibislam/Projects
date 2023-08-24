<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "carrental_customization_database";

//creating connection

$conn = new mysqli($server_name, $user_name, $password);

//check connection 
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
	}
else{
	mysqli_select_db($conn, $db_name);
	//echo "Connection successful";
	}


?>