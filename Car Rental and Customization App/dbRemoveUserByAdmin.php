<?php
require_once('dbConnect.php'); // Using database connection file here
$user_id = $_GET['userID']; // get id through query string
$query_updating_status = "UPDATE car, booking SET car_status='not-booked' WHERE booking.customer_id = '$user_id'";
$query_removing_user = "DELETE FROM customer WHERE customer.customer_id = '$user_id'";
$query_removing_wish = "DELETE FROM wishlist WHERE customer_id = '$user_id'";



$result1 = mysqli_query($conn, $query_updating_status);
$result2 = mysqli_query($conn, $query_removing_user);
$result3 = mysqli_query($conn, $query_removing_wish);


if($result1 && $result2 && $result3)
{
    header("location:adminPanel.php"); // redirects to all records page
    
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
