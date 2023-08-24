 <?php
	session_start();
	// first of all, we need to connect to the database
	require_once('dbConnect.php');

	// we need to check if the input in the form textfields are not empty
	if (isset($_POST['email']) && isset($_POST['password'])) {
		// write the query to check if this username and password exists in our database
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
		//Execute the quer
		$result = mysqli_query($conn, $query);

		//check if it returns an empty set

		if (mysqli_num_rows($result) != 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$db_user_email = $row['email'];
				$db_password = $row['password'];
				$db_user_last_name = $row['last_name'];
				$db_customer_id = $row['customer_id'];
				$db_user_first_name = $row['first_name'];
			}


			if ($email == $db_user_email && $password == $db_password) {

				$_SESSION['last_name'] = $db_user_last_name;
				$_SESSION['email'] = $db_user_email;
				$_SESSION['customer_id'] = $db_customer_id;
				$_SESSION['first_name'] = $db_user_first_name;

				/* Redirect browser */
				header("Location: userPanel.php");
			}
		} else {
			require_once "userSigninPage.php";
			echo "<p class='text-center'>Wrong Password</p> ";
		}
	}
	?> 
	

