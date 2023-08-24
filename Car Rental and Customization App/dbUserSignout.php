<?php 
session_start();
unset($_SESSION['email']);
unset($_SESSION['last_name']);
unset($_SESSION['first_name']);
unset($_SESSION['customer_id']);

session_destroy();
header("location:userSigninPage.php");
mysqli_close($conn);
?>