<?php
session_start();
$customer_id = $_SESSION["customer_id"];

if (!isset($_SESSION["email"]) && !isset($_SESSION["customer_id"])) {
    header("location: userSigninPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="userPanel.php">Car Renatal</a>
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
                            <a class="btn btn-dark" class="nav-link" href="userBookingHistory.php">Bookings</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-danger" class="nav-link" href="dbUserSignout.php">Sign Out, <?= $_SESSION['last_name']; ?> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </navbar>
    <div class="container m-auto">
        <div class="p-2 my-3 text-center">
            <h6>Hello, <span class="text-secondary"> <?= $_SESSION['first_name']; ?> <?= $_SESSION['last_name']; ?></span> </h6>
        </div>

        <div class="row my-5 d-felx align-items-center">
            <div class="col-6">
                <?php
                require_once("dbConnect.php");
                $sql = "SELECT customer_id, first_name, last_name, city, address, phone_number, email from customer where customer_id = '$customer_id'";


                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //here we will print every row that is returned by our query $sql
                    while ($row = mysqli_fetch_array($result)) {
                        //here we have to write some HTML code, so we will close php tag

                ?>

                        <h4><?php echo $row[1]; ?> <?php echo $row[2] ?></h4>
                        <hr>
                        <div class="d-flex flex-column gap-3">
                            <h5>Customer ID: <?php echo $row[0]; ?></h5>
                            <h5>Email: <?php echo $row[6]; ?></h5>
                            <h5>Contact Number: <?php echo $row[5]; ?></h5>
                            <h5>City: <?php echo $row[3]; ?></h5>
                            <h5>Address: <?php echo $row[4]; ?></h5>
                        </div>


            </div>

            <!-- <div class="col-6">
                <div class=" p-5">
                    <div class="mb-5">
                        <h4 class="text-center text-secondary">Want to change information?</h4>
                    </div>
                    

                </div>
            </div> -->
        </div>
<?php
                    }
                }
?>