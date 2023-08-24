<?php
// first of all, we need to connect to the database
session_start();
require_once('dbConnect.php');
$customer_id = $_SESSION['customer_id'];
$feedback_message = $_POST["feedback_message"];
$feedback_title = $_POST['feedback_title'];

// we need to check if the input in the form textfields are not empty
if (isset($_POST['feedback_message']) && isset($_POST['feedback_title'])) {
	// write the query to check if this username and password exists in our database

	$query = " INSERT INTO feedback VALUES( default, '$feedback_title', default, '$feedback_message', '$customer_id') ";

	//Execute the query 
	$result = mysqli_query($conn, $query);

	//check if this insertion is happening in the database
	if ($result) {

		echo "<script>alert('Submitted Successfully'); window.location.href='userPanel.php';</script>";
	} else {
		echo "<script>alert('Submission Failed'); window.location.href='userFeedbackPage.php';</script>";
	}
}
