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
    <title>Transportation</title>
    <link rel="stylesheet" type="text/css" href="style.css">


    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .column {
        float: left;
        width: 25%;
        padding: 0 10px;
    }

    .row {
        margin: 0 -5px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
        margin: 5px 5px 5px 5px;
    }




    .make {
        margin: 5px 0px 5px 0px;
        position: relative;
    }


    .make label {
        text-align: left;
        margin: 1px;
    }

    .make input {
        height: 20px;
        width: 40%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 2px;
        border: 1px solid gray;
    }

    img {
        width: 300px;
        height: 300px;
        object-fit: cover;
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
        <h2>Transportation</h2>
    </div>

    <form action="transportation.php" method="post">




        <div>
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php
                unset($_SESSION['success']);
            ?>
                </h3>
            </div>
            <?php endif ?>

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>



            <div class="form">
                <?php include('errors.php') ?>
                <br>
                <h2>Rides</h2>
                <p>Please select one of the Options</p>
            </div>


            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="img/sedan.jpeg">
                        <h3>Sedan</h3>
                        <h5>Price : &#8377 2000 Per Day</h5>

                        <?php if($_SESSION['A'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['A'] ?> </h6>
                        <br>
                        <button class="btn" name="a1">Select</button>

                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['A'] ?> </h6>
                        <br>

                        <?php endif; ?>


                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/suv.jpeg">
                        <h3>SUV</h3>
                        <h5>Price : &#8377 3000 Per Day</h5>

                        <?php if($_SESSION['B'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['B'] ?> </h6>
                        <br>
                        <button class="btn" name="a2">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['B'] ?> </h6>
                        <br>
                        <?php endif; ?>




                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/jeep.jpeg">
                        <h3>Jeep</h3>
                        <h5>Price : &#8377 3000 Per Day</h5>

                        <?php if($_SESSION['C'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['C'] ?> </h6>
                        <br>
                        <button class="btn" name="a3">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['C'] ?> </h6>
                        <br>
                        <?php endif; ?>



                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/indigo.jpeg">
                        <h3>Indigo</h3>
                        <h5>Price : &#8377 1500 Per Day</h5>

                        <?php if($_SESSION['D'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['D'] ?> </h6>
                        <br>
                        <button class="btn" name="a4">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['D'] ?> </h6>
                        <br>
                        <?php endif; ?>




                    </div>
                </div>

            </div>



            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="img/taxi.jpeg">

                        <h3>Taxi</h3>
                        <h5>Price : &#8377 1000 Per Day</h5>

                        <?php if($_SESSION['E'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['E'] ?> </h6>
                        <br>
                        <button class="btn" name="a5">Select</button>

                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['E'] ?> </h6>
                        <br>
                        <?php endif; ?>



                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/i10.jpeg">
                        <h3>i10</h3>
                        <h5>Price : &#8377 1500 Per Day</h5>

                        <?php if($_SESSION['F'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['F'] ?> </h6>
                        <br>
                        <button class="btn" name="a6">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['F'] ?> </h6>
                        <br>
                        <?php endif; ?>




                    </div>
                </div>



            </div>





            <br>
            <!-- <button type="submit" name="res_bill" class="btn">Calculate Bill</button> -->
            <p> <a href="index.php" style="color: red;">Back</a> </p>
            <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
            <?php endif ?>


        </div>
    </form>

</body>

</html>