 <!-- Accomodation/Room Bill -->
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
     <title>Bill</title>
     <link rel="stylesheet" type="text/css" href="style.css">

     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
     body {
         font-family: Arial;
         font-size: 17px;
         padding: 8px;
     }

     * {
         box-sizing: border-box;
     }

     .row {
         display: -ms-flexbox;
         /* IE10 */
         display: flex;
         -ms-flex-wrap: wrap;
         /* IE10 */
         flex-wrap: wrap;
         margin: 0 -16px;
     }

     .col-25 {
         -ms-flex: 25%;
         /* IE10 */
         flex: 25%;
     }

     .col-50 {
         -ms-flex: 50%;
         /* IE10 */
         flex: 50%;
     }

     .col-75 {
         -ms-flex: 75%;
         /* IE10 */
         flex: 75%;
     }

     .col-25,
     .col-50,
     .col-75 {
         padding: 0 16px;
     }

     .container {
         background-color: #f2f2f2;
         padding: 5px 20px 15px 20px;
         border: 1px solid lightgrey;
         border-radius: 3px;
     }

     input[type=text] {
         width: 100%;
         margin-bottom: 20px;
         padding: 12px;
         border: 1px solid #ccc;
         border-radius: 3px;
     }

     label {
         margin-bottom: 10px;
         display: block;
     }

     .icon-container {
         margin-bottom: 20px;
         padding: 7px 0;
         font-size: 24px;
     }

     .btn {
         background-color: #04AA6D;
         color: white;
         padding: 12px;
         margin: 10px 0;
         border: none;
         width: 100%;
         border-radius: 3px;
         cursor: pointer;
         font-size: 17px;
     }

     .btn:hover {
         background-color: #45a049;
     }

     a {
         color: #2196F3;
     }

     hr {
         border: 1px solid lightgrey;
     }

     span.price {
         float: right;
         color: grey;
         position: left;
     }

     @media (max-width: 800px) {
         .row {
             flex-direction: column-reverse;
         }

         .col-25 {
             margin-bottom: 20px;
         }
     }
     </style>


 </head>

 <body>

     <ul class="navbarul">
         <li class="navbarli"><a class="active" href="index.php?logout='1'" class="navbara">Logout</a></li>
         <li class="navbarli"><a href="GuestInfo.php" class="navbara">Profile</a></li>
         <li class="navbarli"><a href="index.php" class="navbara">Home</a></li>
         <li class="navbarli"><a href="guestDetails.php" class="navbara">Details</a></li>

     </ul>

     <div class="header">
         <h2>Bill</h2>
     </div>

     <form action="restBill.php" method="post">
         <div>
             <?php include('errors.php') ?>
         </div>


         <div class="content">
             <!-- notification message -->
             <?php if (isset($_SESSION['success'])) : ?>
             <div>
                 <h3>
                     <?php 
          	unset($_SESSION['success']);
          ?>

                 </h3>
             </div>
             <?php endif ?>

             <?php  if (isset($_SESSION['username'])) : ?>


             <div class="col-25">
                 <div class="container">
                     <h4>Item <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span>
                     </h4>
                     <br>
                     <p> <?php echo $_SESSION['TYPE']?>
                         <span class="price"> <?php echo $_SESSION['price'] ?> x <?php echo $_SESSION['diffence'] ?>
                         </span>
                     </p>

                     <br>
                     <hr><br>

                     <p>Total <span class="price" style="color:black"><b> &#8377 <?php echo  $_SESSION['bill']?>
                             </b></span></p>

                 </div>
             </div>

             <br>

             <button type="submit" name="Rest_bill" class="btn">Place Order</button>

             <?php endif ?>
         </div>
     </form>
 </body>

 </html>