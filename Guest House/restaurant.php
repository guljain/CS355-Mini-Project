<!-- Details about Menu -->


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
    <title>Restaurant</title>
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
        <h2>Restaurant</h2>
    </div>

    <form action="restaurant.php" method="post">



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

            <?php  if (isset($_SESSION['username'])) : ?>

            <div class="form">
                <?php include('errors.php') ?>
                <br>
                <h2>MENU</h2>
                <p>Please select the quantity of items</p>
            </div>


            <!-- Menu Card -->
            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="img/coffee.jpeg">

                        <h3>Coffee</h3>
                        <h5>Price : &#8377 20</h5>
                        <div class="make">
                            <label for="coffee">Quantity : </label>
                            <input type="number" name="coffee" value="0" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/extracoldcoffee.jpeg">
                        <h3>Extra Cold Coffee</h3>
                        <h5>Price : &#8377 100</h5>
                        <div class="make">
                            <label for="extraColdCoffee">Quantity : </label>
                            <input type="number" name="extraColdCoffee" value="0" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="img/thandai.jpeg">
                        <h3>Thandai</h3>
                        <h5>Price : &#8377 150</h5>
                        <div class="make">
                            <label for="thandai">Quantity : </label>
                            <input type="number" name="thandai" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/pancake.jpeg">
                        <h3>Pancake</h3>
                        <h5>Price : &#8377 50</h5>
                        <div class="make">
                            <label for="pancake">Quantity : </label>
                            <input type="number" name="pancake" value="0" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="column">
                    <div class="card">
                        <img src="img/pasta.jpeg">
                        <h3>Pasta</h3>
                        <h5>Price : &#8377 300</h5>
                        <div class="make">
                            <label for="pasta">Quantity : </label>
                            <input type="number" name="pasta" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/cheeseSandwhich.jpeg">
                        <h3>Cheese Sandwhich</h3>
                        <h5>Price : &#8377 30</h5>
                        <div class="make">
                            <label for="cheeseSandwich">Quantity : </label>
                            <input type="number" name="cheeseSandwich" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/eggsandwich.jpeg">
                        <h3>Egg Sandwhich</h3>
                        <h5>Price : &#8377 40</h5>
                        <div class="make">
                            <label for="eggSandwich">Quantity : </label>
                            <input type="number" name="eggSandwich" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/daalmakhni.jpeg">
                        <h3>Daal Makhni</h3>
                        <h5>Price : &#8377 200</h5>
                        <div class="make">
                            <label for="daalMakhni">Quantity : </label>
                            <input type="number" name="daalMakhni" value="0" required>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">

                <div class="column">
                    <div class="card">
                        <img src="img/vegtandooriplatter.jpeg">
                        <h3>Vegetarian Tandoori Platter</h3>
                        <h5>Price : &#8377 295</h5>
                        <div class="make">
                            <label for="vegetarianTandooriPlatter">Quantity : </label>
                            <input type="number" name="vegetarianTandooriPlatter" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/chickenkorma.jpeg">
                        <h3>Chicken Korma</h3>
                        <h5>Price : &#8377 200</h5>
                        <div class="make">
                            <label for="chickenKorma">Quantity : </label>
                            <input type="number" name="chickenKorma" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/butterchicken.jpeg">
                        <h3>Butter Chicken</h3>
                        <h5>Price : &#8377 200</h5>
                        <div class="make">
                            <label for="butterChicken">Quantity : </label>
                            <input type="number" name="butterChicken" value="0" required>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <img src="img/rumaliroti.jpeg">
                        <h3>Rumali Roti</h3>
                        <h5>Price : &#8377 30</h5>
                        <div class="make">
                            <label for="rumaliRoti">Quantity : </label>
                            <input type="number" name="rumaliRoti" value="0" required>
                        </div>
                    </div>
                </div>



            </div>

            <div class="row">

                <div class="column">
                    <div class="card">
                        <img src="img/butterNaan.jpeg">
                        <h3>Butter Naan</h3>
                        <h5>Price : &#8377 20</h5>
                        <div class="make">
                            <label for="butterNaan">Quantity : </label>
                            <input type="number" name="butterNaan" value="0" required>
                        </div>
                    </div>
                </div>

            </div>


            <br>
            <button type="submit" name="res_bill" class="btn">Calculate Bill</button>
            <?php endif ?>


        </div>
    </form>

</body>

</html>