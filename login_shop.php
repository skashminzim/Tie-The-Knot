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
	<link rel="stylesheet" href="css/login.css">


    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	 <link href="css/landing-page.min.css" rel="stylesheet">
  </head>
  <body class="goto-here">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><font size="5">Tie The Knot</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="start.php" class="nav-link"><b>Home</b></a></li>
	          <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Vendors</b></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Photography</a>
                <a class="dropdown-item" href="catering.php">catering</a>
                <a class="dropdown-item" href="venue.html">Venue</a>



				   <a class="dropdown-item" href="dj.html">Music and DJ</a>




              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link"><b>About</b></a></li>-->

	          <!--<li class="nav-item"><a href="contact.html" class="nav-link"><b>Contact</b></a></li>
			  <li class="nav-item"><a href="signup.html" class="nav-link"><b>Signup</b></a></li>
			  <li class="nav-item"><a href="login.html" class="nav-link"><b>Login</b></a></li>-->



	        </ul>
	      </div>
	    </div>
	  </nav>


<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
            <h3 class="login-heading mb-4">Please Login</h3>
            <form method="POST">
            <p>Enter Customer Name:</p>
            <input type="text" name="idw"><br/>
            <p>Password:</p>
            <input type="number" name="data1"><br/><br/>
            <input type="submit" value="insert">
            <div class="w-full text-center">

              <a href="signup_shop.php" class="txt3">
                Create a new account?
              </a>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</html>
<?php
session_start();
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
      $name = $_POST["idw"];
      $pass = $_POST["data1"];
      $query = "SELECT customer_name from customer where customer_name='$name'and password= '$pass'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      $s = oci_fetch_array($stid, OCI_ASSOC);
      if ($s) {
         print "One row inserted";
       $_SESSION["name"] = $name;
       $_SESSION["pass"] = $pass;
        header("Location:shop.php");
      }
      else {
        //  print "Sorry!wrong User ID or Password";
        header("Location:blank2.php");
      }
      oci_close($conn);


/*
$stid = oci_parse($conn, 'INSERT INTO loan (LOAN_ID,AMOUNT) VALUES(:myid, :mydata)');
oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $data);
$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "One row inserted";
}

oci_free_statement($stid);
oci_close($conn);*/
//header("Location:blank.php");
//exit;
}
}
}
?>
