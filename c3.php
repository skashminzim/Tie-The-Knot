<!DOCTYPE html>
<?php

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;
?>
<html lang="en">
  <head>
    <title>Car|Tie the knot</title>
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
 <!-- <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text"></span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>-->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><font size="5">Tie The Knot</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link"><b>Home</b></a></li>
	          <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Vendors</b></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Photography</a>
                <a class="dropdown-item" href="catering.html">catering</a>
                <a class="dropdown-item" href="venue.html">Venue</a>



				   <a class="dropdown-item" href="dj.html">Music and DJ</a>




              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link"><b>About</b></a></li>

	          <li class="nav-item"><a href="contact.html" class="nav-link"><b>Contact</b></a></li>
			  <li class="nav-item"><a href="signup.php" class="nav-link"><b>Signup</b></a></li>
			  <li class="nav-item"><a href="login.html" class="nav-link"><b>Login</b></a></li>-->



	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/food.jpg');"></div>
<form method="POST">
<p>Enter hour :</p>
<input type="number" name="idw"><br/>
<input type="submit" value="insert">
</form>
<?php
//session_start();
$conn = oci_connect("project", "project", "//localhost/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else{
  if(isset($_POST['idw']))
  {
    if(!empty($_POST['idw']))
    {
      //$id = rand(5,60);
      $expense = 2000;
      $data = $_POST["idw"];

$stid = oci_parse($conn, 'INSERT INTO car(event_id, package_cost , hour_needed ) VALUES(eve_id_seq.nextval, :mydata, :hu)');
//oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $expense);
oci_bind_by_name($stid, ':hu', $data);

$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "One row inserted";
    $_SESSION["name"] = $name1;
    $_SESSION["pass"] = $pass1;
}

oci_free_statement($stid);
//choose table
$stid = oci_parse($conn, 'INSERT INTO choose(event_id ,customer_id ) SELECT choose_eve_id_seq.nextval,customer.customer_id FROM customer where customer.customer_name=:myname and customer.password=:mypass');
oci_bind_by_name($stid, ':myname', $name1);
oci_bind_by_name($stid, ':mypass', $pass1);
$r = oci_execute($stid);  // executes and commits
if ($r) {
  //  print "Your order is added to the cart!";

    $_SESSION["name"] = $name1;
    $_SESSION["pass"] = $pass1;

}

oci_free_statement($stid);
oci_close($conn);
header("Location:blank.php");
//exit;
}
}
}
?>
