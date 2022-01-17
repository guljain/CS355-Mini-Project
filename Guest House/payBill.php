<!-- Bill Payement page -->
<?php include('server.php') ?>

<?php 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        flex: 50%;
        margin: 5px 5px 5px 5px;
    }

    .col-75 {
        -ms-flex: 75%;
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
        margin: 5px 5px 5px 5px;

    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #04AA6D;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }


    }

    .bill {
        width: 350px;
        padding: 10px;
        border: 5px solid gray;
        margin: 0;
        background-color: white;
    }
    </style>
</head>

<body>

    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="GuestInfo.php" class="navbara">Profile</a></li>
        <li class="navbarli"><a href="index.php" class="navbara">Home</a></li>
        <li class="navbarli"><a href="guestDetails.php" class="navbara">Details</a></li>
    </ul>

    <div class="header">
        <h2>Payment</h2>
    </div>

    <form action="payBill.php" method="post">


        <div class="content">
            <?php if (isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php 
          	unset($_SESSION['success']);
          ?>

                </h3>
            </div>
            <?php endif ?>

            <?php include('errors.php') ?>


            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>

            <h2>Order Checkout </h2>

            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <form action="payBill.php">

                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Details</h3>
                                    <br>
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="fname" name="name" placeholder="John M. Doe" required>

                                    <label for="city"> <i class="fa fa-phone"></i> Phone Number
                                    </label>
                                    <input type="number" id="city" name="phoneNo" placeholder="12345" required>

                                    <label for="username"><i class="fa fa-id-card"></i> Guest ID</label>
                                    <input type="text" id="email" name="username" placeholder="1901CS22" required>


                                    <label for="username"><i class="fa fa-money"></i> Bill</label>
                                    <div class="bill"> &#8377 <?php echo  $_SESSION['bill']?> </div>
                                </div>


                                <div class="col-50">
                                    <br>
                                    <h3>Payment</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>

                                    <label for="ccnum">Credit card number</label>
                                    <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"
                                        required>

                                    <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Exp Year</label>
                                            <input type="number" id="expyear" name="expyear" placeholder="2018"
                                                required>
                                        </div>

                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="number" id="cvv" name="cvv" placeholder="352" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <input type="submit" name="payIt" value="Continue to checkout" class="btn">
                        </form>
                    </div>
                </div>

            </div>

            <?php endif ?>
        </div>
    </form>

</body>

</html>