<!-- Main Page, leading to food, room and accomodation booking webpages -->

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
    <title>Home</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        padding: 64px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both
    }

    .column-66 {
        float: left;
        width: 66.66666%;
        padding: 20px;
    }

    .column-33 {
        float: left;
        width: 33.33333%;
        padding: 20px;
    }

    .large-font {
        font-size: 48px;
    }

    .xlarge-font {
        font-size: 64px
    }

    .button {
        border: none;
        color: white;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        background-color: #04AA6D;
    }

    img {
        display: block;
        height: auto;
        max-width: 100%;
    }

    @media screen and (max-width: 1000px) {

        .column-66,
        .column-33 {
            width: 100%;
            text-align: center;
        }

        img {
            margin: auto;
        }
    }

    .navbarul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        border: 0px solid #e7e7e7;
        background-color: #f8f8ff;
        position: fixed;
        top: 0;
        left: 1px;
        width: 105%;
    }

    .navbarli {
        float: left;
    }

    .navbara {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navbarli a:hover:not(.active) {
        background-color: #111;
        color: white;
    }

    .active {
        display: block;
        background-color: #04aa6d;
        color: white;
        text-align: center;
        padding: 14px 18px;
        text-decoration: none;
    }
    </style>

</head>

<body>

    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="GuestInfo.php" class="navbara">Profile</a></li>
        <li class="navbarli"><a href="guestDetails.php" class="navbara">Details</a></li>

    </ul>

    <div class="header">
        <h2>Home Page</h2>
    </div>


    <form action="index.php" method="post">



        <div>
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>


                </h3>
            </div>
            <?php endif ?>


            <?php  if (isset($_SESSION['username'])) : ?>


            <div class="form">
                <?php include('errors.php') ?>
                <br>
                <div style="text-align:center">
                    <h2>Welcome</h2>
                </div>
            </div>


            <!-- Go to Room Booking  -->
            <div class="container">
                <div class="row">
                    <div class="column-66">
                        <h1 class="xlarge-font"><b>Book Hotel Rooms</b></h1>
                        <h1 class="large-font" style="color:MediumSeaGreen;"><b>Comfortable Rooms</b></h1>
                        <br>
                        <button type="submit" name="room" class="btn">Book</button>
                    </div>
                    <div class="column-33">
                        <img src="img/hotel.jpeg" width="500" height="500">
                    </div>
                </div>
            </div>

            <!-- Go to Food Booking  -->
            <div class="container" style="background-color:#f1f1f1">
                <div class="row">
                    <div class="column-33">
                        <img src="img/restaurant.jpeg" alt="" width="500" height="500">
                    </div>
                    <div class="column-66">
                        <h1 class="xlarge-font"><b>Menu</b></h1>
                        <h1 class="large-font" style="color:red;"><b>Hungry ?</b></h1>
                        <br>
                        <button type="submit" name="restaurant" class="btn">Check</button>
                    </div>
                </div>
            </div>

            <!-- Go to Car Booking  -->
            <div class="container">
                <div class="row">
                    <div class="column-66">
                        <h1 class="xlarge-font"><b>Book Transportation</b></h1>
                        <h1 class="large-font" style="color:MediumSeaGreen;"><b>Easy Stay</b></h1>
                        <br>
                        <button type="submit" name="transportation" class="btn">Book</button>
                    </div>
                    <div class="column-33">
                        <img src="img/accomodation.jpeg" width="500" height="500">
                    </div>
                </div>
            </div>


            <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
            <?php endif ?>
        </div>
    </form>

</body>

</html>