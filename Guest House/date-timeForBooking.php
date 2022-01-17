<!-- Select valid date for Room and Accomodation Booking -->
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="GuestInfo.php" class="navbara">Profile</a></li>
        <li class="navbarli"><a href="index.php" class="navbara">Home</a></li>
        <li class="navbarli"><a href="guestDetails.php" class="navbara">Details</a></li>
    </ul>
    <br>



    <div class="header">
        <h2>Select Date and Timing</h2>
    </div>


    <form action="date-timeForBooking.php" method="post" class="form">
        <?php include('errors.php') ?>

        <div>
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3> <?php echo $_SESSION['success']; 
            unset($_SESSION['success']);?>

                </h3>
            </div>
            <?php endif ?>




            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>
            <div>

                <div class="input-group">
                    <label for="date1"> <?php echo $_SESSION['date1'] ?>: </label>
                    <input type="date" name="date1" required>
                </div>

                <div class="input-group">
                    <label for="date2"> <?php echo $_SESSION['date2'] ?> : </label>
                    <input type="date" name="date2"   required>
                </div>

            </div>


            <button type="submit" class="btn" name="findOptions">Proceed</button>

            <?php endif ?>
        </div>
    </form>

</body>

</html>

</html>