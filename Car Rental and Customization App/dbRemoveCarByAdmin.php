<?php
require_once('dbConnect.php'); // Using database connection file here
$car_id = $_GET['car_id']; // get id through query string
$query_deleting_car = "DELETE FROM car WHERE car_id = '$car_id'";
$result = mysqli_query($conn, $query_deleting_car);
if($result)
{
    header("location:adminPanel.php"); // redirects to all records page
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
