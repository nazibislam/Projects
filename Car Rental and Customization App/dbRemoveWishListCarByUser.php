<?php
require_once('dbConnect.php'); // Using database connection file here
$wish_id = $_GET['wish_id']; // get id through query string
$query_deleting_wish = "DELETE FROM wishlist WHERE wish_id = '$wish_id'";
$result = mysqli_query($conn, $query_deleting_wish);
if($result)
{
    echo "<script>alert('Wish Removed Successfully'); window.location.href='wishListPage.php';</script>";

}
else
{
    echo "Error removing record"; // display error message if not delete
}
