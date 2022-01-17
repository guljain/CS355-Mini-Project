<!-- Login Page for registered guest  -->
<?php include('server.php') ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>



<body>

    <div class="container">

        <div class="header">
            <h2>Guest Login</h2>
        </div>

        <form action="login.php" method="post" class="form">

            <?php include('errors.php') ?>

            <div class="input-group">
                <label for="username">Guest ID : </label>
                <input type="text" name="gid" required>
            </div>

            <div class="input-group">
                <label for="password">Password : </label>
                <input type="text" name="password" required>
            </div>



            <button type="submit" name="login_user" class="btn">Login</button>
            <p>New User : <a href="registration.php" style="color: red;">Guest Registration</a> </p>
            <p>Staff Login : <a href="stafflogin.php" style="color: red;">Staff Login</a> </p>
            <p>Administration Login : <a href="adminlogin.php" style="color: red;">Admin Login</a> </p>

        </form>

    </div>

</body>

</html>