<?php
	session_start();

	// first of all, we need to connect to the database
	require_once('dbConnect.php');

	// we need to check if the input in the form textfields are not empty
	if (isset($_POST['admin_name']) && isset($_POST['password'])) {
		// write the query to check if this username and password exists in our database
		$u = $_POST['admin_name'];
		$p = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE admin_name = '$u' AND password = '$p'";

		//Execute the query 
		$result = mysqli_query($conn, $sql);

		$numrows = mysqli_num_rows($result);

		//check if it returns an empty set
		if ($numrows != 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$db_admin_name = $row['admin_name'];
				$db_admin_password = $row['password'];
			}

			if ($u == $db_admin_name && $p == $db_admin_password) {

				$_SESSION['admin_name'] = $db_admin_name;
				header("Location: adminPanel.php");
			}
		} 
		else {
		
			require_once "adminSigninPage.php";
			echo "<p class='text-center'>Wrong Password</p> ";

		}
	}
