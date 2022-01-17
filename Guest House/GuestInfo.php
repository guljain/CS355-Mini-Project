<!-- Display Information about guest -->
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
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>


    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="index.php" class="navbara">Home</a></li>
        <li class="navbarli"><a href="guestDetails.php" class="navbara">Details</a></li>
    </ul>
    <br>


    <div class="header">
        <h2>Guest Information</h2>
    </div>


    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
                <?php include('errors.php') ?>

            </h3>
        </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        <p><strong>Following are the details : </strong></p>
        <ul>
            <li class="litext"><u class="utext">Name</u> : <?php echo $_SESSION['Guestname']; ?> </li>
            <li class="litext"><u class="utext">Age</u> : <?php echo $_SESSION['Guestage']; ?></li>
            <li class="litext"><u class="utext">Mobile Number</u> :<?php echo $_SESSION['GuestmobileNumber']; ?></li>
            <li class="litext"><u class="utext">Guest ID</u> : <?php echo $_SESSION['username']; ?></li>
            <li class="litext"><u class="utext">Password</u> : <?php echo $_SESSION['GuestPassword']; ?></li>

        </ul>
        </p>
        <?php endif ?>
    </div>

</body>

</html>