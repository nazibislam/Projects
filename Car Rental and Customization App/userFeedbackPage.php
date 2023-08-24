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
                            <a class="btn btn-danger" class="nav-link" href="dbUserSignout.php">Sign Out, <?= $_SESSION['last_name']; ?> </a>
                        </li>
                        <!-- <li class="nav-item ms-2 mx-2">
                            <a class="btn btn-dark" class="nav-link" href="userBooking.php">My Bookings</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </navbar>

    <div class="p-2 border mb-3 text-center">
        <h6>Hello, <span class="text-secondary"> <?= $_SESSION['first_name']; ?> <?= $_SESSION['last_name']; ?></span> </h6>
    </div>

    <div class="container m-auto my-5">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card p-5 border-sign-in">
                <div>
                    <h4 class="text-center text-secondary">Feedback</h4>
                    </h4>
                </div>

                <form action="dbUserFeedback.php" method="post">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input name="feedback_title" type="text" class="form-control w-100" id="exampleFormControlInput1" placeholder="title" />
                        </div>
                        <label for="exampleFormControlTextarea1" class="form-label">Your Objection</label>
                        <textarea name="feedback_message" placeholder="text" class="form-control  w-100" id="exampleFormControlTextarea1" rows="8"></textarea>
                        <button type="submit" class="btn btn-success mt-3">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/search.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>