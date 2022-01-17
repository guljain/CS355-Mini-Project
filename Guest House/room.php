<!-- Details about room -->

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
    <title>Hotel Room</title>
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
        <h2>Hotel Room</h2>
    </div>

    <form action="room.php" method="post">

        <div>
            <?php if (isset($_SESSION['success'])) : ?>
            <div>
                <h3>
                    <?php
                unset($_SESSION['success']);
            ?>
                </h3>
            </div>
            <?php endif ?>



            <?php  if (isset($_SESSION['username'])) : ?>


            <div class="form">
                <?php include('errors.php') ?>
                <br>
                <h2>Rooms</h2>
                <p>Please select one of the Options</p>
            </div>


            <!-- Room Details -->
            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="img/singleroom.jpeg">

                        <h3>Single Room</h3>
                        <h5>Price : &#8377 1000 Per Night</h5>

                        <?php if($_SESSION['A'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['A'] ?> </h6>
                        <br>
                        <button class="btn" name="r1">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['A'] ?> </h6>
                        <br>
                        <?php endif; ?>



                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/doubleroom.jpeg">
                        <h3>Double Room</h3>
                        <h5>Price : &#8377 1500 Per Night</h5>
                        <?php if($_SESSION['B'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['B'] ?> </h6>
                        <br>
                        <button class="btn" name="r2">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['B'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/kingroom.jpeg">
                        <h3>King Room</h3>
                        <h5>Price : &#8377 2000 Per Night</h5>
                        <?php if($_SESSION['C'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['C'] ?> </h6>
                        <br>
                        <button type="submit" class="btn" name="r3">Select</button>
                        <br>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['C'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/queenroom.jpeg">
                        <h3>Queen Room</h3>
                        <h5>Price : &#8377 2000 Per Night</h5>
                        <?php if($_SESSION['D'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['D'] ?> </h6>
                        <br>
                        <button class="btn" name="r4">Select</button>
                        <br>
                        <?php else : ?>
                        <h6 class="notok"> <?php echo $_SESSION['D'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="img/twinroom.jpeg">
                        <h3>Twin Room</h3>
                        <h5>Price : &#8377 2000 Per Night</h5>
                        <?php if($_SESSION['E'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['E'] ?> </h6>
                        <br>
                        <button class="btn" name="r5">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['E'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/executiveroom.jpeg">
                        <h3>Executive Room</h3>
                        <h5>Price : &#8377 2500 Per Night</h5>
                        <?php if($_SESSION['F'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['F'] ?> </h6>
                        <br>
                        <button class="btn" name="r6">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['F'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/extendedstay.jpeg">
                        <h3>Extended Stay</h3>
                        <h5>Price : &#8377 3000 Per Night</h5>
                        <?php if($_SESSION['G'] == "Available") : ?>
                        <h6 class="ok"> <?php echo $_SESSION['G'] ?> </h6>
                        <br>
                        <button class="btn" name="r7">Select</button>
                        <?php else : ?>
                        <br>
                        <h6 class="notok"> <?php echo $_SESSION['G'] ?> </h6>
                        <br>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <br>

            <?php endif ?>


        </div>
    </form>
</body>

</html>