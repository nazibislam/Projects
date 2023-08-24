<?php
session_start();


if (!isset($_SESSION["email"])) {
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
                            <a class="btn btn-success" class="nav-link" href="userProfilePage.php">Profile</a>
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
        <div class="mt-4 mb-4 text-center">
            <h4>Available Cars</h4>
        </div>

<!-- Search -->
        <form action="userCarSearchPage.php" class="form-inline md-form mr-auto mb-4">
            <input class="form-control mr-sm-2" name='searched_name' type="text" id="given-input" placeholder="Search by brand/model/color/category" aria-label="Search">
            <button class="btn btn-outline-warning mt-2  btn-rounded btn-sm my-0" type="submit">Search</button>
        </form>
        <hr class="mb-4">
        <div>
            <div class="row container">
                <?php
                require_once("dbConnect.php");
                $sql = "SELECT brand, model, specification.category,specification.mpg, specification.transmission_type, specification.fuel_type, specification.fuel_capacity, specification.horse_power, specification.torque, specification.seat_capacity, specification.color, specification.car_id, picture, price FROM car 
                INNER JOIN specification on specification.car_id = car.car_id WHERE car.car_status = 'not-booked' ORDER BY car.car_id DESC";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    //here we will print every row that is returned by our query $sql
                    while ($row = mysqli_fetch_array($result)) {
                        //here we have to write some HTML code, so we will close php tag
                ?>

                        <div class="col-md-4 mb-5">
                            <div class="card bookingCard" style="width: 100%;">
                                <img src="<?php echo $row[12] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-title"><?php echo $row[0]; ?> <?php echo $row[1]; ?></h5>
                                        </div>
                                        <div class="col-6">
                                            <h5><?php echo $row[13] ?>/day</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small>Category: <?php echo $row[2] ?> </small> <br>
                                                <small>MPG: <?php echo $row[3] ?></small><br>
                                                <small>Transmission Type: <?php echo $row[4] ?> </small><br>
                                                <small>Fuel Type: <?php echo $row[5] ?></small><br>
                                                <small>Fuel Capacity: <?php echo $row[6] ?> </small><br>
                                            </div>
                                            <div class="col-md-6">
                                                <small>Horse Power: <?php echo $row[7] ?> </small><br>
                                                <small>Torque: <?php echo $row[8] ?> </small><br>
                                                <small>Seat Capacity: <?php echo $row[9] ?> </small><br>
                                                <small>Color: <?php echo $row[10] ?> </small><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="userConfirmBookingPage.php?car_id=<?php echo $row['car_id']; ?>& price=<?php echo $row['price']; ?>" class="mt-3 btn btn-primary">Book Now</a>
                                        </div>

                                        <!-- Wish List -->
                                        <div class="col-md-6">
                                            <a href="dbAddCarToWishList.php?car_id=<?php echo $row['car_id']; ?>" class="mt-3 btn btn-warning">Add to wishlist</a>
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
    <script src="js/search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>