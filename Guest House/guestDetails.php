<!-- Displays All Booking made by guest and other relevent details -->
<?php include('server.php') ?>

<?php 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: staffInfo.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: staffInfo.php");
  }
?>





<!DOCTYPE html>
<html>

<head>
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="table.css">
</head>

<body>


    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
        <li class="navbarli"><a href="GuestInfo.php" class="navbara">Profile</a></li>
        <li class="navbarli"><a href="index.php" class="navbara">Home</a></li>

    </ul>

    <br>
    <div class="header">
        <h2>Guest Details</h2>
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

        <?php  if (isset($_SESSION['username'])) : ?>


        <?php
                $gid = $_SESSION['username'];
                $password = $_SESSION['GuestPassword'];
                $acc = mysqli_query($db, "select * from Accomodation where gid = '$gid'");
                $res = mysqli_query($db, "select * from restaurant where gid = '$gid'");
                $hotel = mysqli_query($db, "select * from Room where gid = '$gid'");
                $payment = mysqli_query($db, "select * from payment where gid = '$gid'");

                $A = mysqli_fetch_assoc($acc);
                $H = mysqli_fetch_assoc($hotel);
                $P = mysqli_fetch_assoc($payment);

                $rid;
                $room;
                $aid;
                $car;
                $totalMoney ;
                $totalResBill;

                if($res) {
                    $query = mysqli_fetch_assoc(mysqli_query($db, "Select sum(bill) as A from restaurant where gid = '$gid'"));
                    $totalResBill = $query['A'];
                }

                if($P) {
                    $totalMoney = $P['totalBill'];
                }

                
                if($H) {
                    $rid = $H['RID'];
                    $room = mysqli_fetch_assoc(mysqli_query($db, "Select * from optionsR where rid = '$rid'  "));
                }
                
                if($A) {
                    $aid = $A['AID'];
                    $sid = $A['SID'];
                    $car = mysqli_fetch_assoc(mysqli_query($db, "Select * from optionsA where aid = '$aid' "));
                    $driver = mysqli_fetch_assoc(mysqli_query($db, "Select * from staff where sid = '$sid' "));
                }

            ?>


        <!-- If there is no booking/payment done by guest, then go in folloring if statement -->
        <?php if(mysqli_num_rows($hotel)==0 && mysqli_num_rows($acc)==0 && mysqli_num_rows($res) ==0): ?>
        <p><strong>You have no payments right now ! </strong> </p>
        <?php else: ?><br>



        <p><strong>Following are the required details: </strong></p>


        <!-- If there is a Room Booking by the guest, Display the details -->
        <?php if($H) :  ?>
        <table class="styled-table">
            <tr>
                <th colspan="4">
                    <h2>Room Information</h2>
                </th>
            </tr>
        </table>
        <ul>
            <?php
                $roomname = $room['description'];
                $roomprice = $room['price'];
                $bookdateroom = $H['date'];
                $totalroomprice = $H['bill'];
            ?>
            <li class="litext"><u class="utext">Room Type </u> : <?php echo $roomname; ?> </li>
            <li class="litext"><u class="utext">Room Price</u> : <?php echo $roomprice; ?></li>
            <li class="litext"><u class="utext">Payment Date</u> : <?php echo $bookdateroom; ?></li>
            <li class="litext"><u class="utext">Total Payment</u> : <?php echo $totalroomprice; ?></li>

        </ul>
        <br>
        <?php endif ?>



        <!-- If accomodation booking by guest, show details of Car and driver as well -->
        <?php if($A) :  ?>
        <table class="styled-table">
            <tr>
                <th colspan="4">
                    <h2>Accomodation Information</h2>
                </th>
            </tr>
        </table>
        <ul>
            <?php
                $carname = $car['carName'];
                $cardesc = $car['description'];
                $carprice = $car['price'];
                $bookdateacc = $A['accomodationDate'];
                $drivername = $driver['Name'] ;
                $driverage = $driver['Age'];
                $driverphn = $driver['PhoneNo'];
            ?>

            <li class="litext"><u class="utext">Car Name </u> : <?php echo $carname; ?> </li>
            <li class="litext"><u class="utext">Car Description </u> : <?php echo $cardesc; ?> </li>
            <li class="litext"><u class="utext">Price</u> : <?php echo $carprice; ?></li>
            <li class="litext"><u class="utext">Payment Date</u> : <?php echo $bookdateacc; ?></li>
            <br>
            <table class="styled-table">
                <tr>
                    <th colspan="4">
                        <h2>Driver Information</h2>
                    </th>
                </tr>
            </table>
            <li class="litext"><u class="utext">Driver Name</u> : <?php echo $drivername; ?></li>
            <li class="litext"><u class="utext">Driver Age</u> : <?php echo $driverage; ?></li>
            <li class="litext"><u class="utext">Driver Phone Number</u> : <?php echo $driverphn; ?></li>
            <br>
        </ul>
        <br>
        <?php endif ?>



        <!-- if any food booking by guest, show the date and bill -->
        <?php if(mysqli_num_rows($res)) :  ?>
        <table class="styled-table">
            <tr>
                <th colspan="4">
                    <h2>Restaurant Information</h2>
                </th>
            </tr>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($res)))  { ?>
                <tr>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['bill']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <thead>
                <tr>
                    <th>Total</th>
                    <th> <?php echo $totalResBill ?></th>
                </tr>
            </thead>
        </table>
        <?php endif ?>

        </p>


        <?php endif ?>
        <?php endif ?>


    </div>
</body>

</html>