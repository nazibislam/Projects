<?php
// first of all, we need to connect to the database
require_once('dbConnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['category']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['color']) && isset($_POST['price']) && isset($_POST['thumbnail']) && isset($_POST['compitable_with'])){
	// write the query to check if this username and password exists in our database
	$category = $_POST['category'];
    $brand = $_POST['brand'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	$thumbnail = $_POST['thumbnail'];
	$compitable_with = $_POST['compitable_with'];


	$query_inserting_parts = " INSERT INTO parts VALUES( default, default, '$category', '$brand', '$model', '$color', '$compitable_with', '$price', '$thumbnail' ) ";
	
	//Execute the query 
	$result = mysqli_query($conn, $query_inserting_parts);
	
	//check if this insertion is happening in the database
	if($result){
			echo "<script>alert('Parts Added Successfully'); window.location.href='addPartsPage.php';</script>";
	}
	else{
		echo "<script>alert('Addition Failed'); window.location.href='addPartsPage.php';</script>";
	}
	
}
