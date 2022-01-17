<!-- This is the login page for administration login, password : 123 -->


<?php include('server.php') ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>

    <div class="container">

        <div class="header">
            <h2>Administration Login</h2>
        </div>

        <form action="adminlogin.php" method="post" class="form">

            <?php include('errors.php') ?>

            <div class="input-group">
                <label for="password">Password : </label>
                <input type="password" name="password" required>
            </div>



            <button type="submit" name="admin_login" class="btn">Login</button>
            <p>New User : <a href="registration.php" style="color: red;">Guest Registration</a> </p>
            <p>Existing User : <a href="login.php" style="color: red;">Guest Login</a> </p>
            <p>Staff Login : <a href="stafflogin.php" style="color: red;">Staff Login</a> </p>



        </form>

    </div>

</body>

</html>