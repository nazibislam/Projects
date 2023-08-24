<?php
// first of all, we need to connect to the database
require_once('dbConnect.php');

// we need to check if the input in the form textfields are not empty
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['city']) && isset($_POST['address']) && isset($_POST['phone_number']) && isset($_POST['email']) && isset($_POST['password'])) {
	// write the query to check if this username and password exists in our database
	$fn = $_POST['first_name'];
	$ln = $_POST['last_name'];
	$c = $_POST['city'];
	$ad = $_POST['address'];
	$pn = $_POST['phone_number'];
	$em = $_POST['email'];
	$ps = $_POST['password'];
	$query_inserting_customer = " INSERT INTO  customer VALUES( Default,'$fn', '$ln', '$c', '$ad', '$pn', '$em','$ps' )";

	//Execute the query 
	$result = mysqli_query($conn, $query_inserting_customer);

	//check if this insertion is happening in the database
	if (mysqli_affected_rows($conn)) {

		echo "<script>alert('Signup Successful'); window.location.href='userSigninPage.php';</script>";

	} else {
		echo "Insertion Failed";
	}
}
