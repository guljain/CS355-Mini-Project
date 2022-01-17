<!-- Guest Registration page -->
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
            <h2>Guest Registration</h2>
        </div>

        <form action="registration.php" method="post" class="form">

            <?php include('errors.php') ?>


            <div class="input-group">
                <label for="Employee Name">Guest Name : </label>
                <input type="text" name="name" required>
            </div>

            <div class="input-group">
                <label for="Employee Name">Guest Age : </label>
                <input type="number" name="age" required>
            </div>


            <div class="input-group">
                <label for="mobileNo">Mobile Number : </label>
                <input type="number" name="mobileNo" required>
            </div>

            <div class="input-group">
                <label for="username">Guest ID : </label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="password1">Password : </label>
                <input type="password" name="password_1" required>
            </div>

            <div class="input-group">
                <label for="password2">Confirm Password : </label>
                <input type="password" name="password_2" required>
            </div>


            <button name="reg_user" class="btn">Register</button>

            <p>Existing User : <a href="login.php" style="color: red;">Guest Login</a> </p>
            <p>Staff Login : <a href="stafflogin.php" style="color: red;">Staff Login</a> </p>
            <p>Administration Login : <a href="adminlogin.php" style="color: red;">Admin Login</a> </p>

        </form>
    </div>
</body>

</html>