<!-- <?php include('server.php') ?> -->
<?php 
//   session_start(); 

  if (!isset($_SESSION['Susername'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: staffInfo.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['Susername']);
  	header("location: staffInfo.php");
  }
?>





<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>

    <style>
    .utext {
        content: "::before";
        background: lightgray;
        border-radius: 1ch;
        padding-inline: 1ch;
        margin-inline-end: 1ch;
    }


    .litext::marker {
        content: "»";
        font-size: 2em;

        --hue: 0;
        color: hsl(var(--hue) 50% 50%);
    }

    .litext {
        padding-inline-start: 1ch;
        text-align: left;
    }
    </style>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>


    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="staffDetails.php" class="navbara">Details</a></li>
    </ul>

    <br>


    <div class="header">
        <h2>Staff Information</h2>
    </div>


    <div class="content">
        <?php if (isset($_SESSION['success'])) : ?>
        <div>
            <h3>
                <?php 	unset($_SESSION['success']); ?>
                <!-- <?php include('errors.php') ?> -->
            </h3>
        </div>

        <?php endif ?>

        <?php  if (isset($_SESSION['Susername'])) : ?>

        <p><strong>Following are the details : </strong></p>
        <ul>

            <?php
                $sid = $_SESSION['Susername'];
                $password = $_SESSION['Spassword'];
                $query = "select * from staff where sid = '$sid' and password = '$password' ";
                $check = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($check);

                $name = $row['Name'];
                $age = $row['Age'];
                $phoneNo = $row['PhoneNo'];
                $dep = $row['Department'];
                $role = $row['Role'];
            ?>
            <li class="litext"><u class="utext">Name</u> : <?php echo $name; ?> </li>
            <li class="litext"><u class="utext">Age</u> : <?php echo $age; ?></li>
            <li class="litext"><u class="utext">Mobile Number</u> :<?php echo $phoneNo; ?></li>
            <li class="litext"><u class="utext">Staff ID</u> : <?php echo $sid; ?></li>
            <li class="litext"><u class="utext">Password</u> : <?php echo $password; ?></li>
            <li class="litext"><u class="utext">Department</u> : <?php echo $dep; ?></li>
            <li class="litext"><u class="utext">Role</u> : <?php echo $role; ?></li>

        </ul>
        </p>
        <?php endif ?>

    </div>

</body>

</html>