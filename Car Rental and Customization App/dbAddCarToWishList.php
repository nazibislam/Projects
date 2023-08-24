<?php
session_start();

require_once('dbConnect.php'); // Using database connection file here

$car_id = $_GET['car_id']; // get car_id through query string
$customer_id = $_SESSION['customer_id'];
$query_add_to_wishlist = "INSERT INTO wishlist VALUES( default, default, '$customer_id', '$car_id', default )";
$result = mysqli_query($conn, $query_add_to_wishlist);

if ($result){
    echo "<script>alert('Added to wishlist successfully'); window.location.href='userpanel.php';</script>";
}
else{
    echo "<script>alert('Failed'); window.location.href='userpanel.php';</script>";
}
    