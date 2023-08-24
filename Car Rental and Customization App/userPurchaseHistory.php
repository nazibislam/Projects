<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: userSigninPage.php");
}

require_once('dbConnect.php'); // Using database connection file here

$customer_id = $_SESSION['customer_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRONOS | Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>

<body>
    <!-- Navbar -->
    <!-- Navbar -->
    <navbar>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h4>CRONOS</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Starting, ending -->
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="userPanel.php">Car Rental</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="customizationPage.php">Customization</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="wishListPage.php">Wish List</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="userFeedbackPage.php">Feedback</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-danger" class="nav-link" href="dbUserSignout.php">Sign Out, <?= $_SESSION['last_name']; ?> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </navbar>



    <div class="container-fluid my-5">
        <div class="text-center">
            <h2>Purchased Items</h2>
        </div>
        <table class="table my-4">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Purchase ID</th>
                    <th scope="col">Purchase Time</th>
                    <th scope="col">Parts ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Model</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Installation</th>
                    <th scope="col">Installation Date</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("dbConnect.php");
                $sql = "SELECT purchase_id, purchase_time, purchase.parts_id,parts.category, parts.model, parts.brand, shipping_address, inst_options, inst_date, parts.price FROM purchase
                    INNER JOIN customer on customer.customer_id = purchase.customer_id 
                    INNER JOIN parts on parts.parts_id = purchase.parts_id WHERE purchase.customer_id='$customer_id' ORDER BY purchase_id DESC;";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //here we will print every row that is returned by our query $sql
                    while ($row = mysqli_fetch_array($result)) {
                        //here we have to write some HTML code, so we will close php tag
                ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2] ?> </td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php echo $row[4] ?> </td>
                            <td><?php echo $row[5] ?></td>
                            <td><?php echo $row[6] ?> </td>
                            <td><?php echo $row[7] ?> </td>
                            <td><?php echo $row[8] ?> </td>
                            <td><?php echo $row[9] ?> </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>