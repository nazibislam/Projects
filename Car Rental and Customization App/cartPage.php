<?php
session_start();

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
                        <li class="nav-item">
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
                            <a class="btn btn-warning" class="nav-link" href="userPurchaseHistory.php">Purchases</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-danger" class="nav-link" href="dbUserSignout.php">Sign Out, <?= $_SESSION['last_name']; ?> </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </navbar>

    <main class="container-fluid my-5">
        <div class="text-center">
            <h2>Cart</h2>
        </div>
        <div>
            <table class="table my-4">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Parts ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Model</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                        <!-- <th scope="col">Purchase</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("dbConnect.php");
                    $sql = "SELECT partscart.parts_id, parts.category, parts.model, parts.brand, parts.price, cart_id FROM partscart INNER JOIN parts on parts.parts_id = partscart.parts_id INNER JOIN customer on customer.customer_id = partscart.customer_id WHERE partscart.customer_id='$customer_id' ORDER BY cart_id DESC;";

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

                                <td><button class="btn btn-success"><a href="dbRemoveCartPartsByUser.php
                                ?cart_id=<?php echo $row[5]; ?>">Remove</a></button></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>


            <div class="d-flex justify-content-center my-5">
                <button type="button" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#myModal">Purchase</button>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Payment</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                            <!-- after submitting the form -->
                                <form action="dbConfirmPurchaseByUser.php" method="get">
                                    <div class="my-4">
                                        <h4 class="my-3">Install Parts</h4>
                                        <label class="col mx-2 my-2">
                                            <select name='inst_options' style='height:30px;width:170px;border:1px solid #fff;'>
                                                <option selected="selected" disabled="disabled">Options</option>
                                                <option value='on_your_own'>On Your Own</option>
                                                <option value='at_workshop'>At Workshop</option>
                                            </select>
                                        </label>
                                        <label class="col mx-2 my-2">
                                            <input class="form-control" name='date' type="date" placeholder="Choose a date"></input>
                                        </label>
                                    </div>
                                    <div class="my-4">
                                        <h4 class="my-3">Billing Details</h4>
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
                                        <h4 class="my-3">Credit/Debit detail</h4>
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
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type=" submit" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>


</div>