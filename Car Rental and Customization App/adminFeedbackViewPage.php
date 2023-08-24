<?php
session_start();

if (!isset($_SESSION["admin_name"])) {
    header("location: userSigninPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRONOS | Admin Panel</title>
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
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="adminPanel.php">Admin Panel</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-danger" class="nav-link" href="dbAdminSignout.php">Sign Out, <?= $_SESSION['admin_name']; ?> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </navbar>
    <!-- Main Tag-->
    <h6 class="text-center mt-4">Hello, <span class="text-secondary"><?= $_SESSION['admin_name']; ?></span></h6>
    <div class="text-center text-success mb-5"><small>Logged as Admin</small></div>


    <div class="container">
        <div class="text-center mt-5 mb-4">
            <h3>Feedbacks</h3>
        </div>

        <div>
            <div class="row container">
                <?php
                require_once("dbConnect.php");
                $sql = "SELECT feedback_id, feedback_date, feedback_title, feedback_message, customer.customer_id, customer.first_name, customer.last_name, customer.email FROM feedback INNER JOIN customer on feedback.customer_id = customer.customer_id ORDER BY feedback_date DESC";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //here we will print every row that is returned by our query $sql
                    while ($row = mysqli_fetch_array($result)) {
                        //here we have to write some HTML code, so we will close php tag
                ?>

                        <div class="col-md-4 mb-5">
                            <div class="card bookingCard" style="width: 22rem;">
                                <div class="card-body p-5">
                                    <div class="feedback-title">
                                        <h5 class="card-title"><?php echo $row[2]; ?></h5>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <q><i><?php echo $row[3] ?></i></q>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12"><small><?php echo $row[5] ?><?php echo $row[6] ?> </small> <br>
                                                <small><?php echo $row[1] ?></small><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>