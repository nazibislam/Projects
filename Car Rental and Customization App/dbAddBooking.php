<?php

session_start();

require_once('dbConnect.php'); // Using database connection file here

$customer_id = $_SESSION['customer_id'];
$car_id = $_SESSION['car_id_session']; // get car_id through query string
$price = $_SESSION['price_session']; // get car_id through query string
$days = $_GET['days'];
$pick_area = $_GET['pick_area'];
$zipcode = $_GET['zipcode'];
$address = $_GET['address'];
$total_price = floatval($price) * floatval($days);    
// echo($total_price);                            


$query_updating_status = "UPDATE car SET car_status = 'booked' WHERE car.car_id = '$car_id'";
$query_inserting_booking = "INSERT INTO booking VALUES( default, default, '$customer_id', '$car_id', '$days', '$address', '$zipcode', '$total_price' )";
$result1 = mysqli_query($conn, $query_updating_status);
$result2 = mysqli_query($conn, $query_inserting_booking);

if ($result1 & $result2) {
    echo "<script>alert('Booking Successful'); window.location.href='userpanel.php';</script>";
    unset($_SESSION['car_id_session']);
    unset($_SESSION['price_session']);
    unset($car_id);
    unset($price);

} else {
    echo "<script>alert('Booking Failed'); window.location.href='userpanel.php';</script>";
    unset($_SESSION['car_id_session']);
    unset($_SESSION['price_session']);
    unset($car_id);
    unset($price);
}
