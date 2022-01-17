<!-- Details about Guest House and Booking -->

<?php include('server.php') ?>
<?php 

  if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: adminlogin.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header("location: adminlogin.php");
  }
?>



<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="table.css">
</head>

<body>


    <ul class="navbarul">
        <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
    </ul>

    <br>


    <div class="header">
        <h2>Information</h2>
    </div>


    <form action="admin.php" method="post">



        <br>
        <button type="submit" name="G" class="btn">Guest</button>
        <button type="submit" name="S" class="btn">Staff</button>
        <button type="submit" name="R" class="btn">Rooms</button>
        <button type="submit" name="M" class="btn">Menu</button>
        <button type="submit" name="V" class="btn">Vehicles</button>
        <br>
        <br>
        <button type="submit" name="MonthlyBookingGuest" class="btn">Monthly Guest Booking</button>
        <button type="submit" name="MonthlyBookingRoom" class="btn">Monthly Room Booking</button>
        <button type="submit" name="MonthlyBookingFood" class="btn">Monthly Food Booking</button>
        <br>
        <br>
        <button type="submit" name="MonthlyBookingCar" class="btn">Monthly Car Booking</button>
        <button type="submit" name="MonthlyBookingStaff" class="btn">Monthly Staff Payment</button>




        <!-- details for monthly guest booking, given month is entered -->

        <?php if(isset($_POST['month_detailsGuest_btn'])) :?>
        <?php 
                $monthNo = mysqli_real_escape_string($db, $_POST['monthGuest']);
                $_SESSION['monthNo'] = $monthNo;
                if(empty($monthNo) || (!($monthNo >=1 && $monthNo <= 12))) {
                    array_push($errors, "Please enter valid month number, ie, between 1 and 12" ); }
                    else {
                    $query=mysqli_query($db, "select * from payment where MONTH(date) = '$monthNo'" ); } 
                    if(!empty ($query) && mysqli_num_rows($query) == 0) {
                        array_push($errors, "No Booking in this month" ); 
                    } ?>

        <?php if(count($errors) == 0) :?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Month Payment Details by Guest</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>Date</th>
                    <th>Total Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['GID']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['totalBill']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="form">
            <?php include('errors.php') ?>
        </div>
        <?php endif?>
        <?php endif ?>





        <!-- details for monthly Room booking, given month is entered -->

        <?php if(isset($_POST['month_detailsRoom_btn'])) :?>
        <?php 
                $monthNo = mysqli_real_escape_string($db, $_POST['monthRoom']);
                $_SESSION['monthNo'] = $monthNo;

                if(empty($monthNo) || (!($monthNo >=1 && $monthNo <= 12))) {
                    array_push($errors, "Please enter valid month number, ie, between 1 and 12" ); }
                    else {
                    $query=mysqli_query($db, "select * from Room where MONTH(date) = '$monthNo'" ); } 
                    if(!empty ($query) && mysqli_num_rows($query) == 0) {
                        array_push($errors, "No Booking in this month" ); 
                    } ?>

        <?php if(count($errors) == 0) :?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Month Details by Room Booking</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>Room ID</th>
                    <th>Date</th>
                    <th>Total Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['GID']; ?></td>
                    <td><?php echo $rows['RID']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['bill']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="form">
            <?php include('errors.php') ?>
        </div>
        <?php endif?>
        <?php endif ?>







        <!-- details for monthly Food booking, given month is entered -->

        <?php if(isset($_POST['month_detailsFood_btn'])) :?>
        <?php 
                $monthNo = mysqli_real_escape_string($db, $_POST['monthFood']);
                $_SESSION['monthNo'] = $monthNo;
                if(empty($monthNo) || (!($monthNo >=1 && $monthNo <= 12))) {
                    array_push($errors, "Please enter valid month number, ie, between 1 and 12" ); }
                    else {
                    $query=mysqli_query($db, "select * from restaurant where MONTH(date) = '$monthNo'" ); } 
                    if(!empty ($query) && mysqli_num_rows($query) == 0) {
                        array_push($errors, "No Booking in this month" ); 
                    } ?>
        <?php if(count($errors) == 0) :?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Month Details by Food Booking</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>Date</th>
                    <th>Total Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['gid']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['bill']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="form">
            <?php include('errors.php') ?>
        </div>
        <?php endif?>
        <?php endif ?>






        <!-- details for monthly Car booking, given month is entered -->

        <?php if(isset($_POST['month_details_btnCar'])) :?>
        <?php 
                $monthNo = mysqli_real_escape_string($db, $_POST['monthCar']);
                $_SESSION['monthNo'] = $monthNo;
                if(empty($monthNo) || (!($monthNo >=1 && $monthNo <= 12))) {
                    array_push($errors, "Please enter valid month number, ie, between 1 and 12" ); }
                    else {
                    $query=mysqli_query($db, "select * from Accomodation where MONTH(accomodationDate) = '$monthNo'" ); } 
                    if(!empty ($query) && mysqli_num_rows($query) == 0) {
                        array_push($errors, "No Booking in this month" ); 
                    } ?>
        <?php if(count($errors) == 0) :?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Month Payment Details of Accomodation Booking</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>Staff ID</th>
                    <th>Car ID</th>
                    <th>Date</th>
                    <th>Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['GID']; ?></td>
                    <td><?php echo $rows['SID']; ?></td>
                    <td><?php echo $rows['AID']; ?></td>
                    <td><?php echo $rows['accomodationDate']; ?></td>
                    <td> <?php 
                        if($rows['AID'] == 'A1' ) {
                            echo 2000;
                        }
                        else if($rows['AID'] == 'A2') {
                            echo 3000;
                        }
                        else if($rows['AID'] == 'A3') {
                            echo 3000;
                        }
                        else if($rows['AID'] == 'A4') {
                            echo 1500;
                        }
                        else if($rows['AID'] == 'A6') {
                            echo 1000;
                        }
                        else echo 1500;
                    ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php else : ?>

        <div class="form">
            <?php include('errors.php') ?>
        </div>
        <?php endif?>
        <?php endif ?>





        <!-- details for monthly Staff work, given month is entered -->

        <?php if(isset($_POST['month_detailsStaff_btn'])) :?>
        <?php 
                $monthNo = mysqli_real_escape_string($db, $_POST['monthStaff']);
                $_SESSION['monthNo'] = $monthNo;

                if(empty($monthNo) || (!($monthNo >=1 && $monthNo <= 12))) {
                    array_push($errors, "Please enter valid month number, ie, between 1 and 12" ); }
                    else {
                    $query=mysqli_query($db, "select * from dutySchecule where MONTH(date) = '$monthNo'" ); } 
                    if(!empty ($query) && mysqli_num_rows($query) == 0) {
                        array_push($errors, "No Booking in this month" ); 
                    } ?>

        <?php if(count($errors) == 0) :?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Month Payment Details Of Staff</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Date</th>
                    <th>Day Wage</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['sid']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['wage']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="form">
            <?php include('errors.php') ?>
        </div>
        <?php endif?>
        <?php endif ?>





        <!-- Enter month to get details for monthly Food booking, given month is entered -->

        <?php if(isset($_POST['MonthlyBookingGuest'])) :?>
        <div class="form">
            <?php include('errors.php') ?>
            <div class="container">
                <div class="input-group">
                    <label>Enter Month Number : </label>
                    <input type="text" name="monthGuest">
                </div>
            </div>
            <br>
            <button class="btn" type='submit' name="month_detailsGuest_btn">
                Get Month Details
            </button>
        </div>
        <?php endif ?>


        <!-- Enter month to get details for monthly Room booking, given month is entered -->

        <?php if(isset($_POST['MonthlyBookingRoom'])) :?>
        <div class="form">
            <?php include('errors.php') ?>
            <div class="container">
                <div class="input-group">
                    <label>Enter Month Number : </label>
                    <input type="text" name="monthRoom">
                </div>
            </div>
            <br>
            <button class="btn" type='submit' name="month_detailsRoom_btn">
                Get Month Details
            </button>
        </div>
        <?php endif ?>


        <!-- Enter month to get details for monthly Food booking, given month is entered -->

        <?php if(isset($_POST['MonthlyBookingFood'])) :?>
        <div class="form">
            <?php include('errors.php') ?>
            <div class="container">
                <div class="input-group">
                    <label>Enter Month Number : </label>
                    <input type="text" name="monthFood">
                </div>
            </div>
            <br>
            <button class="btn" type='submit' name="month_detailsFood_btn">
                Get Month Details
            </button>
        </div>
        <?php endif ?>



        <!-- Enter month to get details for monthly Car booking, given month is entered -->

        <?php if(isset($_POST['MonthlyBookingCar'])) :?>
        <div class="form">
            <?php include('errors.php') ?>
            <div class="container">
                <div class="input-group">
                    <label>Enter Month Number : </label>
                    <input type="text" name="monthCar">
                </div>
            </div>
            <br>
            <button class="btn" type='submit' name="month_details_btnCar">
                Get Month Details
            </button>
        </div>
        <?php endif ?>


        <!-- Enter month to get details for monthly Staff scheduled work, given month is entered -->

        <?php if(isset($_POST['MonthlyBookingStaff'])) :?>
        <div class="form">
            <?php include('errors.php') ?>
            <div class="container">
                <div class="input-group">

                    <label>Enter Month Number : </label>
                    <input type="text" name="monthStaff">
                </div>
            </div>
            <br>
            <button class="btn" type='submit' name="month_detailsStaff_btn">
                Get Month Details
            </button>
        </div>

        <?php endif ?>




        <!-- Details of Guest -->

        <?php if(isset($_POST['G'])) :?>
        <?php $query = mysqli_query($db,  "Select * from guest"); ?>
        <table class="styled-table">
            <tr>
                <th colspan="4">
                    <h2>Guest Details</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Total Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <?php $gid = $rows['gid'];
                      $payment = mysqli_fetch_array( mysqli_query($db,  "select totalBill from payment where GID = '$gid' ")); ?>
                <tr>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['age']; ?></td>
                    <td><?php echo $rows['phoneNo']; ?></td>
                    <td><?php if(empty($payment)) echo 0;
                        else echo $payment['totalBill']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php endif ?>



        <!-- Details of Staff -->

        <?php if(isset($_POST['S'])) :?>
        <?php $query = mysqli_query($db,  "Select * from staff"); ?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Staff Details</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Total Wage enerned till Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <?php $sid = $rows['SID'];
                        $payment = mysqli_fetch_array( mysqli_query($db,  "select sum(wage) as A from dutySchecule where sid = '$sid' "));
                        ?>
                <tr>
                    <td><?php echo $rows['Name']; ?></td>
                    <td><?php echo $rows['Age']; ?></td>
                    <td><?php echo $rows['PhoneNo']; ?></td>
                    <td><?php echo $rows['Department']; ?></td>
                    <td><?php echo $rows['Role']; ?></td>
                    <td><?php if(empty($payment['A'])) echo 0;
                        else echo $payment['A']; ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php endif ?>





        <!-- Details of Room -->

        <?php if(isset($_POST['R'])) :?>
        <?php $query = mysqli_query($db,  "Select * from optionsR"); ?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Room Details</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Room Name</th>
                    <th>Price (per day)</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['price']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php endif ?>






        <!-- Details of Menu -->

        <?php if(isset($_POST['M'])) :?>
        <?php $query = mysqli_query($db,  "Select * from menu"); ?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>MENU</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price (per plate)</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <tr>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['price']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php endif ?>




        <!-- Details of Cars -->

        <?php if(isset($_POST['V'])) :?>
        <?php $query = mysqli_query($db,  "Select * from optionsA"); ?>
        <table class="styled-table">
            <tr>
                <th colspan="6">
                    <h2>Vehicle Information</h2>
                </th>
            </tr>
            <thead>
            </thead>
            <thead>

                <tr>
                    <th>Car Name</th>
                    <th>Description</th>
                    <th>Price (per day)</th>
                    <th>Total Earned by using this Car</th>
                </tr>
            </thead>
            <tbody>
                <?php while(($rows=mysqli_fetch_array($query)))  { ?>
                <?php 
                        $aid = $rows['AID'];
                        $Price = $rows['price'];
                        $payment = mysqli_fetch_array(mysqli_query($db, "select count(*) as A from Accomodation where AID = '$aid' "));
                        ?>
                <tr>
                    <td><?php echo $rows['carName']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['price']; ?></td>
                    <td><?php echo $payment['A'] * $Price; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php endif ?>



    </form>
</body>

</html>