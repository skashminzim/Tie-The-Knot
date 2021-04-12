<?php
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $id=$_SESSION["id"] ;
  $pass=$_SESSION["pass"] ;
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Tie The Knot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><font size="5">Tie The Knot</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link"><b>Home</b></a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Vendors</b></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Photography</a>
                <a class="dropdown-item" href="catering.php">catering</a>
                <!--<a class="dropdown-item" href="venue.html">Venue</a>
				   <a class="dropdown-item" href="dj.html">Music and DJ</a>-->
				   <a class="dropdown-item" href="venue.html">Venue</a>
                <a class="dropdown-item" href="stage.html">Stage Decoration</a>
                  <a class="dropdown-item" href="parlor.html">Parlour & Makeover</a>
                  	<a class="dropdown-item" href="car.html">Car</a>
				   <a class="dropdown-item" href="dj.php">Music and DJ</a>
              </div>
            </li>


			   <li class="nav-item"><a href="start.php" class="nav-link"><b>Log OUT</b></a></li>
			  <!--Copy from here
			  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Sign in</b></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="signup.php">Customer</a>
                <a class="dropdown-item" href="em_login.php">Employee</a>
              </div>
            </li>
			to here-->
	        </ul>
	      </div>
	    </div>
	  </nav>

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/login2.png');"></div>
   <html>
   <head><title>Employee</title></head>
   <style>
   h1 {
     color:#6C3483 ;
     text-decoration: underline;
   }
   body {background-color: #FFF0F5;}
   </style>
   <h1>Employee Profile</h1>
   <body>
<?php
     $conn = oci_connect("project", "project", "//localhost/orcl");

     $query = "select employee.employee_name,employee.employee_address,employee.employee_phone,employee.employee_email,employee.manager_id,employee.designation,salary.salary_amount,employee.salary_month,employee.salary_paid from employee natural join salary
where employee_id='$id'and employee_phone= '$pass'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);

     // Fetch each row in an associative array
    $cars = array("NAME : ", "Address : ", "Phone no : ","Email id : ","Manager ID : ","Designation : ","Salary : ","Salary month : ","Salary Paid : ");
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      $i=0;
      foreach ($row as $item) {
          //echo $cars[$i];
          echo "<p> <font color=blue>$cars[$i]</font> </p>";
          $i=$i+1;
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
          echo "<br>";
      }
      print '</tr>';
     }
     print '</table>';


  /**************************************CUstomer search*******************************************************************/
  echo '<h1>See Customer Status</h1>';
    echo '<form method="POST">Customer ID : <input type="number" name="idw">  <input type="submit" name="submit" value="Confirm">
   </form>';

   if(isset($_POST['idw'])){
     if(!empty($_POST['idw']))
     {
       $id=$_POST['idw'];
     //echo 'xx';
     /////////////////////catering
     $query = "Select * from customer natural join choose natural join catering where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Catering : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
   print '<td>'.'package cost'.'</td>';
     print '<td>'.'guest no'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>'
     ;
     ///photograpgy
     $query = "Select * from customer natural join choose natural join photography where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Photography : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
	 ///parlour
     $query = "Select * from customer natural join choose natural join parlour where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Parlour : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
	 ///venue
     $query = "Select * from customer natural join choose natural join venue where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Venue : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
	 ///stage
     $query = "Select * from customer natural join choose natural join stage where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Stage : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
     ///music dj
     $query = "Select * from customer natural join choose natural join Music_Dj where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "Music Dj : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
   print '<td>'.'package cost'.'</td>';
     print '<td>'.'Total hour'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
 }
 ///car
     $query = "Select * from customer natural join choose natural join car where customer_id='$id'";
     $stid = oci_parse($conn, $query);
     $r = oci_execute($stid);
     echo "car : ";

     print '<table border="1">';
     print '<td>'.'eventid'.'</td>';
     print '<td>'.'customer id'.'</td>';
     print '<td>'.'Customer name'.'</td>';
     print '<td>'.'password'.'</td>';
    print '<td>'.'NID'.'</td>';
           print '<td>'.'Email'.'</td>';
                print '<td>'.'Address'.'</td>';
                     print '<td>'.'Phone num'.'</td>';
   print '<td>'.'package cost'.'</td>';
     print '<td>'.'Total hour'.'</td>';
       print '<td>'.'total cost '.'</td>';
       print '<br>';
     while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
      print '<tr>';
      foreach ($row as $item) {
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      }
      print '</tr>';
     }
     print '</table>';
 }
 else{
    // print 'Please provide customer ID';
 }

?>
     <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
</body>
     </html>
