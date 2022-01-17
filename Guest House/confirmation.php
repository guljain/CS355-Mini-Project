<!-- Shows Confirmation page after succesfull payment -->

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
    </ul>


    <div class="header">
        <h2>Confirmation Page</h2>
    </div>


    <form action="index.php" method="post" class="form">


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

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>


            <div style="text-align:center">
                <h2>Payment Confirmed</h2>
                <br>
            </div>


            <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
            <p> <a href="index.php" style="color: red;">Back</a> </p>
            <?php endif ?>
        </div>
    </form>

</body>

</html>