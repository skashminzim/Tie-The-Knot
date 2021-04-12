<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tie The Knot</title>
    <style>
.error {color: #FF0000;}
</style>
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

	          <!--<li class="nav-item"><a href="contact.html" class="nav-link"><b>Contact</b></a></li>-->
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
<?php
  $nameErr = $emailErr = $addressErr = $NIDErr = $passErr= $phoneErr = "";
  $name = $email = $address = $phone = $NID = $pass = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
    //  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    //    $nameErr = "Only letters and white space allowed";
    //  }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["password"])) {
        $passErr = "Password is required";
      } else {
        $pass = test_input($_POST["password"]);
        }
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["phone"])) {
          $phoneErr = "Password is required";
        } else {
          $phone = test_input($_POST["phone"]);
          }
        }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["address"])) {
      $address = "";
    } else {
      $address = test_input($_POST["address"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    //  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      //  $websiteErr = "Invalid URL";
    //  }
    }

    if (empty($_POST["NID"])) {
      $NID = "";
    } else {
      $NID = test_input($_POST["NID"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <h2><br>Please Sign up</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="number" name="password">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  NID: <input type="number" name="NID">
  <span class="error"> <?php echo $NIDErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" >
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Address: <input type="text" name="address">
  <span class="error"> <?php echo $addressErr;?></span>
  <br><br>
  Phone: <input type="number" name="phone" >
  <span class="error">* <?php echo $phoneErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <div class="w-full text-center">

    <a href="login_cat.php" class="txt3">
      Already has an account?
    </a>
</form><?php
session_start();
$conn = oci_connect("project", "project", "//localhost/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else{
  if(isset($_POST['name']))
  {
    if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone']))
    {
      //$id = rand(10,60);
      //$expense = 300;
      //$data = $_POST["idw"];*/

$stid = oci_parse($conn, 'INSERT INTO customer(customer_id, customer_name , password , nid , customer_email , customer_address , customer_phone ) VALUES(customer_id_seq.nextval,:myid, :mydata, :hu, :fu, :mu, :lu)');
oci_bind_by_name($stid, ':myid', $name);
oci_bind_by_name($stid, ':mydata', $pass);
oci_bind_by_name($stid, ':hu', $NID);
oci_bind_by_name($stid, ':fu', $email);
oci_bind_by_name($stid, ':mu', $address);
oci_bind_by_name($stid, ':lu', $phone);
$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "One row inserted";
    //$nameErr = $emailErr = $addressErr = $NIDErr = $passErr= $phoneErr = "";
    //$name = $email = $address = $phone = $NID = $pass = "";
    $_SESSION["name"] = $name;
     $_SESSION["pass"] = $pass;
     header("Location:catering.php");

}

oci_free_statement($stid);
oci_close($conn);

//header("Location: blank.php");
//$_SESSION["name"] = $name;
//$_SESSION["pass"] = $pass;
//echo '<script>window.location.href = "index.php";</script>';
//exit;
}
}
}
?>
    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
