<?php include('server.php') ?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

    <div class="container">


        <div class="header">
            <h2>Staff Login</h2>
        </div>



        <form action="stafflogin.php" method="post" class="form">

            <?php include('errors.php') ?>


            <div class="input-group">
                <label for="username">Staff ID : </label>
                <input type="text" name="sid" required>
            </div>


            <div class="input-group">
                <label for="password">Password : </label>
                <input type="password" name="sidpassword" required>
            </div>

            <button type="submit" name="staff_login" class="btn">Guest Login</button>
            <p>New User : <a href="registration.php" style="color: red;">Guest Registration</a> </p>
            <p>Existing User: <a href="login.php" style="color: red;">Guest Login</a> </p>
            <p>Administration Login : <a href="adminlogin.php" style="color: red;">Admin Login</a> </p>




        </form>

    </div>

</body>

</html>