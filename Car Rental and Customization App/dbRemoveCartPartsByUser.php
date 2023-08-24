<?php
require_once('dbConnect.php'); // Using database connection file here
$cart_id = $_GET['cart_id']; // get id through query string
$query = "DELETE FROM partscart WHERE cart_id = '$cart_id'";
$result = mysqli_query($conn, $query);
if($result)
{
    echo "<script>alert('Removed Successfully'); window.location.href='cartPage.php';</script>";

}
else
{
    echo "Error removing record"; // display error message if not delete
}
