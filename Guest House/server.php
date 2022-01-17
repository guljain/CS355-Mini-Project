<?php
    session_start();

    $errors = array();
    

    // connect to dbms
    $db = mysqli_connect('localhost', 'root', '', 'dblab') or die("couldn't connect");

     
 
          


    if(isset($_POST['admin_login'])) {
        $pass = mysqli_real_escape_string($db, $_POST['password']);
        if($pass == '123') {
            $_SESSION['admin'] = "good";
            header('location: admin.php');
        }
        else {
            array_push($errors, "Wrong Admin Password");
        }
        
    }


    

   
    // REGISTER Users
    if (isset($_POST['reg_user'])) {


        // storing the user input in variables
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $age = mysqli_real_escape_string($db, $_POST['age']);
        $mobileNumber = mysqli_real_escape_string($db, $_POST['mobileNo']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

     



        // form validation
        if (empty($username)) {
            array_push($errors, "Guest ID is required");
        }
        if (empty($name)) {
            array_push($errors, "Guest Name is required");
        }
        if (empty($mobileNumber)) {
            array_push($errors, "Phone Number is required");
        }
        if (empty($age)) {
            array_push($errors, "age is required");
        }
        if (empty($password_1) || empty($password_2)) array_push($errors, "Password is required");
        if ($password_1 != $password_2) array_push($errors, "Passwords do not match");

       
    
        $user_check_query = "SELECT * FROM guest WHERE GID = '$username'";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {  // is "errors" array is not empty, or user exists, then enter the following in "errors" array
            array_push($errors, "Guest ID already exists, please proceed to login");
        }
            
    
        // if no errors then proceed to enter into database
        if (count($errors) == 0) {
            $query = "INSERT INTO guest (GID, name, age, phoneNo, password) VALUES ( '$username', '$name', '$age', '$mobileNumber', '$password_1' ) ";
            $check = mysqli_query($db, $query);
            
            $_SESSION['username'] = $username;
            $_SESSION['Guestname'] = $name;
            $_SESSION['GuestmobileNumber'] = $mobileNumber;
            $_SESSION['Guestage'] = $age;
            $_SESSION['GuestPassword'] = $password_1;
           

            $_SESSION['success'] = "You are now Logged In";
            header('location: GuestInfo.php');
        }
    }




    // LOGIN USER
    if (isset($_POST['login_user'])) {

        // storing input from user in variables
        $username = mysqli_real_escape_string($db, $_POST['gid']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // neither of fields should be empty
        if (empty($username)) {
            array_push($errors, "Guest ID is required");
        }
        if (empty($password)) array_push($errors, "Password is required");
        
        if (count($errors) == 0) {
            $query = "SELECT * FROM guest WHERE GID = '$username' AND password = '$password' ";
            $results = mysqli_query($db, $query);
                
            if (mysqli_num_rows($results) == 1) {
                $row = mysqli_fetch_assoc($results);

                //stored in SESSION for further display in index.php
                $_SESSION['username'] = $username;
                $_SESSION['Guestname'] = $row["name"];
                $_SESSION['GuestmobileNumber'] = $row["phoneNo"];
                $_SESSION['Guestage'] = $row["age"];
                $_SESSION['GuestPassword'] = $row["password"];

                
                $_SESSION['success'] = "You are now logged in";
                header('location: GuestInfo.php');
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

     if (isset($_POST['restaurant'])) {
         $_SESSION['success'] = "You are now logged in";
         header('location: restaurant.php');
     }


     if (isset($_POST['room'])) {
         $_SESSION['success'] = "You are now logged in";
         
         $_SESSION['date1']= "Check In Date";
         $_SESSION['date2']= "Check Out Date";

         header('location: date-timeForBooking.php');
     }



     if (isset($_POST['transportation'])) {
         $_SESSION['date1']= "Pick Up Date";
         $_SESSION['date2']= "Drop Date";

         $_SESSION['success'] = "You are now logged in";
         header('location: date-timeForBooking.php');
     }


      if (isset($_POST['findOptions'])) {
          date_default_timezone_set('Asia/Kolkata');
        
          $timezone = date('Y-m-d');

          $date1 = mysqli_real_escape_string($db, $_POST['date1']);
          $date2 = mysqli_real_escape_string($db, $_POST['date2']);

          $_SESSION['orderDate']  = $date2;

          if ($date2 < $date1) {
              array_push($errors, "Dates not valid");
          } elseif ($date1 < $timezone) {
              array_push($errors, "Please enter date after or today");
          } elseif ($_SESSION['date1'] == "Check In Date") {
              $query1 = "Select date from resourceStatus where id ='R1' and date  between '$date1' AND '$date2'";
              $query2 = "Select date from resourceStatus where id ='R2' and date  between '$date1' AND '$date2'";
              $query3 = "Select date from resourceStatus where id ='R3' and date  between '$date1' AND '$date2'";
              $query4 = "Select date from resourceStatus where id ='R4' and date  between '$date1' AND '$date2'";
              $query5 = "Select date from resourceStatus where id ='R5' and date  between '$date1' AND '$date2'";
              $query6 = "Select date from resourceStatus where id ='R6' and date  between '$date1' AND '$date2'";
              $query7 = "Select date from resourceStatus where id ='R7' and date  between '$date1' AND '$date2'";
            
              $results1 = mysqli_fetch_assoc(mysqli_query($db, $query1));
              $results2 = mysqli_fetch_assoc(mysqli_query($db, $query2));
              $results3 = mysqli_fetch_assoc(mysqli_query($db, $query3));
              $results4 = mysqli_fetch_assoc(mysqli_query($db, $query4));
              $results5 = mysqli_fetch_assoc(mysqli_query($db, $query5));
              $results6 = mysqli_fetch_assoc(mysqli_query($db, $query6));
              $results7 = mysqli_fetch_assoc(mysqli_query($db, $query7));


              $_SESSION['A'] = "Available";
              $_SESSION['B'] = "Available";
              $_SESSION['C'] = "Available";
              $_SESSION['D'] = "Available";
              $_SESSION['E'] = "Available";
              $_SESSION['F'] = "Available";
              $_SESSION['G'] = "Available";


              if (!empty($results1)) {
                  $_SESSION['A'] = "Not Available";
              }

              if (!empty($results2)) {
                  $_SESSION['B'] = "Not Available";
              }
            
              if (!empty($results3)) {
                  $_SESSION['C'] = "Not Available";
              }

              if (!empty($results4)) {
                  $_SESSION['D'] = "Not Available";
              }

              if (!empty($results5)) {
                  $_SESSION['E'] = "Not Available";
              }

              if (!empty($results6)) {
                  $_SESSION['F'] = "Not Available";
              }

              if (!empty($results7)) {
                  $_SESSION['G'] = "Not Available";
              }

              $_SESSION['startDateRoom'] = $date1;
              $_SESSION['endDateRoom'] = $date2;
              
              $_SESSION['success'] = "You are now logged in";
              header('location: room.php');
          } else {
              if ($date1 == $date2) {
                  $query1 = "Select date from resourceStatus where id ='A1' and date  between '$date1' AND '$date2'";
                  $query2 = "Select date from resourceStatus where id ='A2' and date  between '$date1' AND '$date2'";
                  $query3 = "Select date from resourceStatus where id ='A3' and date  between '$date1' AND '$date2'";
                  $query4 = "Select date from resourceStatus where id ='A4' and date  between '$date1' AND '$date2'";
                  $query5 = "Select date from resourceStatus where id ='A5' and date  between '$date1' AND '$date2'";
                  $query6 = "Select date from resourceStatus where id ='A6' and date  between '$date1' AND '$date2'";
                
                  $results1 = mysqli_fetch_assoc(mysqli_query($db, $query1));
                  $results2 = mysqli_fetch_assoc(mysqli_query($db, $query2));
                  $results3 = mysqli_fetch_assoc(mysqli_query($db, $query3));
                  $results4 = mysqli_fetch_assoc(mysqli_query($db, $query4));
                  $results5 = mysqli_fetch_assoc(mysqli_query($db, $query5));
                  $results6 = mysqli_fetch_assoc(mysqli_query($db, $query6));


                  $_SESSION['A'] = "Available";
                  $_SESSION['B'] = "Available";
                  $_SESSION['C'] = "Available";
                  $_SESSION['D'] = "Available";
                  $_SESSION['E'] = "Available";
                  $_SESSION['F'] = "Available";


                  if (!empty($results1)) {
                      $_SESSION['A'] = "Not Available";
                  }

                  if (!empty($results2)) {
                      $_SESSION['B'] = "Not Available";
                  }
                
                  if (!empty($results3)) {
                      $_SESSION['C'] = "Not Available";
                  }

                  if (!empty($results4)) {
                      $_SESSION['D'] = "Not Available";
                  }

                  if (!empty($results5)) {
                      $_SESSION['E'] = "Not Available";
                  }

                  if (!empty($results6)) {
                      $_SESSION['F'] = "Not Available";
                  }

                  $_SESSION['startDateACC'] = $date1;

                  $_SESSION['success'] = "You are now logged in";
                  header('location: transportation.php');
              } else {
                  array_push($errors, "Transportation Booking can be done only for one day");
              }
          }

      }



     if (isset($_POST['placed_order'])) {
         $_SESSION['success'] = "You are now logged in";
         $_SESSION['what'] = "restaurant";
         header('location: payBill.php');
     }



      if (isset($_POST['Rest_bill'])) {
         $_SESSION['success'] = "You are now logged in";
         header('location: payBill.php');
     }

    


    if (isset($_POST['payIt'])) {


     
        $gid = $_SESSION['username'];
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
        $username = mysqli_real_escape_string($db, $_POST['username']);

        $cardname = mysqli_real_escape_string($db, $_POST['cardname']);
        $cardnumber = mysqli_real_escape_string($db, $_POST['cardnumber']);
        $expmonth = mysqli_real_escape_string($db, $_POST['expmonth']);
        $expyear = mysqli_real_escape_string($db, $_POST['expyear']);
        $cvv = mysqli_real_escape_string($db, $_POST['cvv']);

        $query = "SELECT * from guest where gid = '$gid'";
        $row = mysqli_fetch_assoc(mysqli_query($db, $query));

        if ($username !== $gid) {
            array_push($errors, "Guest ID does not match");
        }

        date_default_timezone_set('Asia/Kolkata');
        $timezone = date('Y-m-d');
        
       
        $year = date('Y', strtotime($timezone));
        $month = date('F', strtotime($timezone));
        
        
        if ($expmonth !== "January"  &&
            $expmonth !== "February" &&
            $expmonth !== "March" &&
            $expmonth !== "April" &&
            $expmonth !== "May" &&
            $expmonth !== "June" &&
            $expmonth !== "July" &&
            $expmonth !== "August" &&
            $expmonth !== "September" &&
            $expmonth !== "October" &&
            $expmonth !== "November"  &&
            $expmonth !== "December") {
            array_push($errors, "Please enter valid Expiry Month");
        }
       


            $month = date("m", strtotime($month));
            $expmonth = date("m", strtotime($expmonth));

 
            echo $month, $expmonth;

        if ($expyear < $year) {
            array_push($errors, "Card has expired");
        } elseif ($expyear === $year && $expmonth < $month) {
            array_push($errors, "Card has expired");
        }

        if (count($errors)==0) {


            
            $bill = $_SESSION['bill'];
            $check = mysqli_query($db, "Select * from payment where gid = '$gid' ");
            
            if (mysqli_num_rows($check) == 1) {

                $update_ = "update payment set totalbill = totalbill + '$bill' , date = '$timezone' where gid = '$gid' ";
                $row = mysqli_query($db, $update_);
            } else {
                $insert = "Insert into payment (GID, date, totalBill) VALUES ( '$gid' , '$timezone', '$bill' )";
                $check = mysqli_query($db, $insert);
               
            }




            if($_SESSION['what'] === "restaurant"){
               $insert = "INSERT INTO restaurant (gid, date, bill) VALUES ('$gid', '$timezone', '$bill')";
               mysqli_query($db, $insert);


               $staff = "INSERT INTO dutySchecule (sid, date, wage) VALUES ('S3', '$timezone', 50)";
               mysqli_query($db, $staff);

               $staff_ = "INSERT INTO dutySchecule (sid, date, wage) VALUES ('S1', '$timezone', 200)";
               mysqli_query($db, $staff_);

               
            }
            
            else if($_SESSION['what'] == "room") {

               $rid = $_SESSION['Roomrid'];
               $date1 = $_SESSION['startDateRoom'];
               $date2 = $_SESSION['endDateRoom'];

               $diff = abs(strtotime($date2) - strtotime($date1));
               $years   = floor($diff / (365*60*60*24)); 
               $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
               $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

               $insert = "INSERT INTO Room (rid, gid, date, bill) VALUES ('$rid', '$gid', '$timezone', '$bill' )";
               $B = mysqli_query($db, $insert);
               
               while($days--) {
                   echo $date1;
                   echo " ";
                    $insert_ = "INSERT INTO resourceStatus (id, date, isAvailable) VALUES ('$rid','$date1', 0 )";
                    $date1 = date('Y-m-d', strtotime("+1 day", strtotime($date1)));
                    $A = mysqli_query($db, $insert_ );
               }

               $staff = "INSERT INTO dutySchecule (sid, date, wage) VALUES ('S6', '$timezone', 100)";
               mysqli_query($db, $staff);
                    
            }
            else if($_SESSION['what'] == "accomodation") {

                $order = $_SESSION['Cardate'];
                $aid = $_SESSION['Caraid'];

                $insert = "INSERT INTO Accomodation (aid, gid, sid, accomodationDate) VALUES ('$aid', '$gid', 'S4', '$order' )";
                $B = mysqli_query($db, $insert);

                $insert_ = "INSERT INTO resourceStatus (id, date, isAvailable) VALUES ('$aid','$order', 0 )";
                $A = mysqli_query($db, $insert_ );


                $staff = "INSERT INTO dutySchecule (sid, date, wage) VALUES ('S4', '$order', 1000)";
                mysqli_query($db, $staff);
                    
            }


            header('location: confirmation.php');
        }
    }



      if (isset($_POST['res_bill'])) {
            $_SESSION['coffee'] = mysqli_real_escape_string($db, $_POST['coffee']);//20
            $_SESSION['extraColdCoffee'] = mysqli_real_escape_string($db, $_POST['extraColdCoffee']);//100
            $_SESSION['thandai'] = mysqli_real_escape_string($db, $_POST['thandai']);//150
            $_SESSION['pancake'] = mysqli_real_escape_string($db, $_POST['pancake']);//50
            $_SESSION['pasta'] = mysqli_real_escape_string($db, $_POST['pasta']);//300
            $_SESSION['cheeseSandwich'] = mysqli_real_escape_string($db, $_POST['cheeseSandwich']);//30
            $_SESSION['eggSandwich'] = mysqli_real_escape_string($db, $_POST['eggSandwich']);//40
            $_SESSION['daalMakhni'] = mysqli_real_escape_string($db, $_POST['daalMakhni']);//200
            $_SESSION['vegetarianTandooriPlatter'] = mysqli_real_escape_string($db, $_POST['vegetarianTandooriPlatter']);//395
            $_SESSION['chickenKorma'] = mysqli_real_escape_string($db, $_POST['chickenKorma']);//200
            $_SESSION['butterChicken'] = mysqli_real_escape_string($db, $_POST['butterChicken']);//200
            $_SESSION['rumaliRoti'] = mysqli_real_escape_string($db, $_POST['rumaliRoti']);//30
            $_SESSION['butterNaan'] = mysqli_real_escape_string($db, $_POST['butterNaan']);//20

         
         $_SESSION['bill'] =    $_SESSION['coffee']  * 20 +
                                $_SESSION['extraColdCoffee'] * 100 +
                                $_SESSION['thandai'] * 150 +
                                $_SESSION['pancake'] * 50 +
                                $_SESSION['pasta'] * 300 +
                                $_SESSION['cheeseSandwich'] * 30 +
                                $_SESSION['eggSandwich'] * 40 +
                                $_SESSION['daalMakhni'] * 200 +
                                $_SESSION['vegetarianTandooriPlatter'] * 200 +
                                $_SESSION['chickenKorma'] * 200 +
                                $_SESSION['butterChicken'] * 200 +
                                $_SESSION['rumaliRoti'] * 30 +
                                $_SESSION['butterNaan'] * 20
                            ;
         

          $_SESSION['success'] = "You are now logged in";
          header('location: restaurantBill.php');
      }


      
      if( 
        isset($_POST['r1']) || 
        isset($_POST['r2']) ||
        isset($_POST['r3']) ||
        isset($_POST['r4']) ||
        isset($_POST['r5']) ||
        isset($_POST['r6']) ||
        isset($_POST['r7'])
        ) 
        
        {
            $gid = $_SESSION['username'];
            $see = "Select rid from Room where gid = '$gid' " ;
            $results = mysqli_query($db, $see);
                
            if (mysqli_num_rows($results) ) {
                array_push($errors, "Room has already been booked");
            }
            else {

                $price;
                $rid;
                $TYPE;

                if(isset($_POST['r1'])) {
                    $price = 1000;
                    $rid = 'R1';
                    $TYPE  = "Single Room";
                } 
                else if(isset($_POST['r2'])) {
                    $price = 1500;
                    $rid = 'R2';
                    $TYPE = "Double Room";
                }
                else if(isset($_POST['r3'])) {
                    $price = 2000;
                    $rid = 'R3';
                    $TYPE = "King Room";
                }
                else if(isset($_POST['r4'])) {
                    $price = 2000;
                    $rid = 'R4';
                    $TYPE = "Queen Room"; 
                }
                else if( isset($_POST['r5'])) {
                    $price = 2000;
                    $rid = 'R5';
                    $TYPE = "Twin Room";
                }
                else if( isset($_POST['r6'])) {
                    $price = 2500;
                    $rid = 'R6';
                    $TYPE = "Executive Suite";
                }
                else  {
                    $price = 3000;
                    $rid = 'R7';
                    $TYPE = "Room for Extended Stay";
                    
                }

                $gid = $_SESSION['username'];
                $date1 = $_SESSION['startDateRoom'];
                $date2 = $_SESSION['endDateRoom'];

                $diff = ceil(abs(strtotime($date2) - strtotime($date1)) / 86400);
                $bill = $diff * $price;
                
                $_SESSION['Roomdate']=  $_SESSION['orderDate'];
                $_SESSION['bill'] =  $bill;
                $_SESSION['price'] = $price;
                $_SESSION['diffence']= $diff; 
                $_SESSION['TYPE'] = $TYPE;
                $_SESSION['Roomrid'] = $rid;


                $_SESSION['what'] = "room"; 

                header('location: restBill.php');
            }

        }

         if( 
        isset($_POST['a1']) || 
        isset($_POST['a2']) ||
        isset($_POST['a3']) ||
        isset($_POST['a4']) ||
        isset($_POST['a5']) ||
        isset($_POST['a6']) 
        ) 
        {

            $date1 = $_SESSION['startDateACC'];

            $query = "Select SID from staff where role = 'Driver' and SID not in (select sid from dutySchecule where date = '$date1' ) ";
            $res = mysqli_query($db, $query);
            
            if(mysqli_num_rows($res)) {

                $price;
                $aid;
                $TYPE;

                if(isset($_POST['a1'])) {
                    $price = 2000;
                    $aid = 'A1';
                    $TYPE  = "Sedan";
                } 
                else if(isset($_POST['a2'])) {
                    $price = 3000;
                    $aid = 'A2';
                    $TYPE = "SUV";
                }
                else if(isset($_POST['a3'])) {
                    $price = 3000;
                    $aid = 'A3';
                    $TYPE = "Jeep";
                }
                else if(isset($_POST['a4'])) {
                    $price = 1500;
                    $aid = 'A4';
                    $TYPE = "Indigo"; 
                }
                else if( isset($_POST['a5'])) {
                    $price = 1000;
                    $aid = 'A5';
                    $TYPE = "Taxi";
                }
                else if( isset($_POST['a6'])) {
                    $price = 1500;
                    $aid = 'A6';
                    $TYPE = "i10";
                }
                

                $gid = $_SESSION['username'];
                $diff = 1;
                $bill = $price ;


                
                
                $_SESSION['Cardate']= $_SESSION['orderDate'];
                $_SESSION['bill'] =  $bill;
                $_SESSION['price'] = $price;
                $_SESSION['diffence']= $diff; 
                $_SESSION['TYPE'] = $TYPE;
                $_SESSION['Caraid'] = $aid;


                $_SESSION['what'] = "accomodation"; 
                header('location: restBill.php');
            }
            else array_push($errors, "Sorry, no driver available");
        }

    


      
      

    if (isset($_POST['staff_login'])) {


        // storing input from user in variables
        $username = mysqli_real_escape_string($db, $_POST['sid']);
        $password = mysqli_real_escape_string($db, $_POST['sidpassword']);

        //neither of fields should be empty
        if (empty($username)) array_push($errors, "Employee ID is required");
        if (empty($password))array_push($errors, "Password is required");
        
        if (count($errors) == 0) { // if no errors then proceed

            $query = "SELECT * FROM staff WHERE sid = '$username' AND password = '$password'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {

                // query to update
              
                $row_ = mysqli_fetch_assoc($results); // stores details about the same employee after update
                            
                $_SESSION['Susername'] = $username;
                $_SESSION['Spassword'] = $password;
                $_SESSION['success'] = "You are now logged in";
                header('location: staffInfo.php');

            }
            else {
                array_push($errors, "Wrong username/password combination on Profile Update Page");
            }
            
        }
    }