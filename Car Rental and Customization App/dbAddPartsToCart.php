<?php

session_start();

require_once('dbConnect.php'); // Using database connection file here

$customer_id = $_SESSION['customer_id'];
$parts_id = $_GET['parts_id']; // get car_id through query string


$query_inserting_record = "INSERT INTO partscart VALUES( default, '$customer_id', '$parts_id')";
$result = mysqli_query($conn, $query_inserting_record);

if ($result) {
    echo "<script>alert('Added Successfully'); window.location.href='customizationPage.php';</script>";

} else {
    echo "<script>alert('Addition Failed'); window.location.href='customizationPage.php';</script>";

}
