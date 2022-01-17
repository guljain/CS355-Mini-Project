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
    <link rel="stylesheet" type="text/css" href="table.css">


</head>

<body>


    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="staffInfo.php" class="navbara">Profile</a></li>
    </ul>

    <br>


    <div class="header">
        <h2>Staff Information</h2>
    </div>


    <div class="content">
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 	unset($_SESSION['success']); ?>
                <?php include('errors.php') ?>
            </h3>
        </div>

        <?php endif ?>

        <?php  if (isset($_SESSION['Susername'])) : ?>

        <p><strong>Following are the details of your duty: </strong></p>

        <?php
                $sid = $_SESSION['Susername'];
                $password = $_SESSION['Spassword'];
                $query = "select * from dutySchecule where sid = '$sid'";
                $query_ = "select sum(wage) as A from dutySchecule where sid = '$sid'";

                $check = mysqli_query($db, $query);
                $check_ = mysqli_query($db, $query_);

                $row_ = mysqli_fetch_assoc($check_);

            ?>

        <table class="styled-table">

            <tr>
                <th colspan="4">
                    <h2>Record</h2>
                </th>
            </tr>
            <thead>
            </thead>


            <thead>
                <tr>
                    <th>Name</th>
                    <th>Wage</th>
                </tr>
            </thead>

            <tbody>
                <?php while(($rows=mysqli_fetch_array($check)))  { ?>

                <tr>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['wage']; ?></td>
                </tr>
                <?php } ?>

            </tbody>


            <thead>
                <tr>
                    <th>Total</th>
                    <th> <?php echo $row_['A'] ?></th>
                </tr>
            </thead>



        </table>



        </p>
        <?php endif ?>

    </div>

</body>

</html>