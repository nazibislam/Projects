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
                            <a class="nav-link active" aria-current="page" href="customizationPage.php">customizationPage</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="wishListPage.php">Wish List</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="userFeedbackPage.php">Feedback</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="cartPage.php">Cart</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-danger" class="nav-link" href="dbUserSignout.php">Sign Out, <?= $_SESSION['last_name']; ?> </a>
                        </li>
                        <li class="nav-item ms-2 mx-2">
                            <a class="btn btn-dark" class="nav-link" href="userBookingHistory.php">My Bookings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </navbar>



    <div class="container m-auto">
        <div class="p-2 border mb-3 text-center">
            <h6>Hello, <span class="text-secondary"> <?= $_SESSION['first_name']; ?> <?= $_SESSION['last_name']; ?></span> </h6>
        </div>

        <div>
            <?php
            require_once("dbConnect.php");
            $car_id = $_GET['car_id'];
            $_SESSION['car_id_session'] = $car_id;
            // $car_id = $_SESSION['car_id'];
            $price = $_GET['price'];
            $_SESSION['price_session'] = $price;
            $sql = "SELECT brand, model, specification.category,specification.mpg, specification.transmission_type, specification.fuel_type, specification.fuel_capacity, specification.horse_power, specification.torque, specification.seat_capacity, specification.boot_space, specification.color, specification.car_id, picture , price FROM car INNER JOIN specification on specification.car_id = car.car_id where car.car_id = '$car_id'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                //here we will print every row that is returned by our query $sql
                while ($row = mysqli_fetch_array($result)) {
                    //here we have to write some HTML code, so we will close php tag
            ?>
                    <div class="d-flex align-items-center">
                        <div class="w-50">
                            <img class="img-fluid" src="<?php echo $row[13] ?>" alt="" srcset="">
                            <div class="d-flex" id="per-day-price">
                                <h4><?php echo $row[14] ?></h4>
                                <h4>/day</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6"><small>Category: <?php echo $row[2] ?> </small> <br>
                                    <small>MPG: <?php echo $row[3] ?></small><br>
                                    <small>Transmission Type: <?php echo $row[4] ?> </small><br>
                                    <small>Fuel Type: <?php echo $row[5] ?></small><br>
                                    <small>Fuel Capacity: <?php echo $row[6] ?> </small><br>
                                </div>
                                <div class="col-md-6"> <small>Horse Power: <?php echo $row[7] ?> </small><br>
                                    <small>Torque: <?php echo $row[8] ?> </small><br>
                                    <small>Seat Capacity: <?php echo $row[9] ?> </small><br>
                                    <small>Boot Space: <?php echo $row[10] ?> </small><br>
                                    <small>Color: <?php echo $row[11] ?> </small><br>
                                </div>
                            </div>
                        </div>
                        <div class="w-50 mb-5">
                            <form action="dbAddBooking.php" method="get">
                                <div class="my-4">
                                    <h3 class="my-3">Pick Up detail</h3>
                                    <div class="row">
                                        <label class="col mx-2 my-2">
                                            <select name='pick_area' style='height:30px;width:170px;border:1px solid #fff;'>
                                                <option selected="selected" disabled="disabled">Pickup location</option>
                                                <option value='Banani'>Banani</option>
                                                <option value='Mohakhali'>Mohakhali</option>
                                                <option value='Uttara'>Uttara</option>
                                            </select>
                                        </label>

                                        <script>
                                            function getSelectValue() {
                                                let x = document.getElementById("days").value;
                                                console.log(x)
                                                let y = document.getElementById("per-day-price").getElementsByTagName("h4")[0].innerText;
                                                console.log(y);
                                                let res = eval(x * y)
                                                console.log(res);
                                                document.getElementById("total").innerText = res;
                                            }
                                        </script>


                                        <label class="col mx-2 my-2 days">
                                            <select id="days" onchange="getSelectValue()" name='days' style='height:30px;width:170px;border:1px solid #fff;'>
                                                <option selected="selected" disabled="disabled">Hire for (day):</option>
                                                <option value='01 '>01</option>
                                                <option value='02 '>02</option>
                                                <option value='03 '>03</option>
                                                <option value='05 '>05</option>
                                                <option value='07 '>07</option>
                                                <option value='08 '>08</option>
                                                <option value='09 '>09</option>
                                                <option value='10 '>10</option>
                                                <option value='11 '>11</option>
                                                <option value='12 '>12</option>
                                                <option value='13 '>13</option>
                                                <option value='14 '>14</option>
                                                <option value='15 '>15</option>
                                                <option value='16 '>16</option>
                                                <option value='17 '>17</option>
                                                <option value='18 '>18</option>
                                                <option value='19 '>19</option>
                                                <option value='20 '>20</option>
                                                <option value='21 '>21</option>
                                                <option value='22 '>22</option>
                                                <option value='23 '>23</option>
                                                <option value='24 '>24</option>
                                                <option value='25 '>25</option>
                                                <option value='26 '>26</option>
                                                <option value='27 '>27</option>
                                                <option value='28 '>28</option>
                                                <option value='29 '>29</option>
                                                <option value='30 '>30</option>
                                                <option value='31 '>31</option>

                                            </select>
                                        </label>
                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='phone_number' type="text" placeholder="Phone" />
                                        </label>
                                    </div>

                                </div>


                                <div class="my-4">
                                    <h3 class="my-3">Billing Details</h3>
                                    <div class="row my-3">
                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='fname' type="text" placeholder="First Name" />
                                        </label>
                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='lname' type="text" placeholder="Last Name" />
                                        </label>


                                    </div>
                                    <div class="row my-3">
                                        <label class="col mx-2 my-2">
                                            <input class="form-control w-25" name='zipcode' type="text" placeholder="Zip Code" />
                                        </label>
                                    </div>
                                    <div class="row my-3">
                                        <label class="col mx-2 my-2">
                                            <textarea class="form-control" name='address' type="text" placeholder="Address"></textarea>
                                        </label>
                                    </div>
                                </div>


                                <div class="my-4">
                                    <h3 class="my-3">Credit/Debit detail</h3>
                                    <div>
                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='card_number' type="text" placeholder="Card Number" />
                                        </label>

                                        <label class="col mx-2 my-2">
                                            <select name='card_brand' style='height:30px;width:170px;border:1px solid #fff;'>
                                                <option selected="selected" disabled="disabled">Card Brand</option>
                                                <option value='Master Card'>Master Card</option>
                                                <option value='Visa'>Visa</option>
                                                <option value='Discover'>Discover</option>
                                                <option value='American Express'>American Express</option>
                                            </select>
                                        </label>

                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='expiration_date' type="text" placeholder="06/25" />
                                        </label>


                                    </div>
                                </div>
                                <h3>Total: <span id="total">0</span> taka</h3>
                                <button type="submit" value="Confirm Booking" class="btn btn-success mt-2">
                                    Confirm Booking
                                </button>

                            </form>

                        </div>
                    </div>

        </div>

<?php
                }
            }
?>

    </div>
    <!-- <script src="js/calculate.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>