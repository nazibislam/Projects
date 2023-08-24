<?php
session_start();

require_once('dbConnect.php'); // Using database connection file here

$customer_id = $_SESSION['customer_id'];
$inst_options = $_GET['inst_options'];
$zipcode = $_GET['zipcode'];
$address = $_GET['address'];
$inst_date = $_GET['date'];


require_once("dbConnect.php");
$sql = "SELECT partscart.parts_id, parts.price FROM partscart INNER JOIN parts on parts.parts_id = partscart.parts_id INNER JOIN customer on customer.customer_id = partscart.customer_id WHERE partscart.customer_id='$customer_id' ORDER BY cart_id DESC;";

$result = mysqli_query($conn, $sql);
$flag = 0;

if (mysqli_num_rows($result) > 0) {
    //here we will print every row that is returned by our query $sql
    while ($row = mysqli_fetch_array($result)) {
        //here we have to write some HTML code, so we will close php tag
?>

        <?php

        $sql2 = "INSERT INTO purchase VALUES( default, default, '$customer_id', '$row[0]','$inst_options','$inst_date','$address','$zipcode','$row[1]')";
        $sql3 = "UPDATE parts SET parts_status = 'purchased' WHERE parts_id = '$row[0]'";



        $result2 = mysqli_query($conn, $sql2);
        $result3 = mysqli_query($conn, $sql3);
        if ($result2 & $result3) {
            $flag = 1;
        }
        ?>
<?php
    }
}

if ($flag == 1) {
    $sql4 = "DELETE FROM partscart WHERE partscart.customer_id = '$customer_id'";
    $result4 = mysqli_query($conn, $sql4);
    if ($result4) {
        echo "<script>alert('Purchase Successful'); window.location.href='customizationPage.php';</script>";
    }
}


?>

