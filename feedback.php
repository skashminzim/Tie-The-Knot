
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
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
<li class="nav-item active"><a href="index.php" class="nav-link"><b>Home</b></a></li></nav>


<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">

   <html>
   <head><title>Please leave your feedback</title></head>
   <style>

   h1 {
     color:#6C3483 ;
     text-decoration: underline;
   }
   body {background-color:#FFF0F5;}

   </style>


   <body>



<?php
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;
?>
<form method="POST">
<p>Your feedback:</p>
<textarea name="data1" rows="5" cols="40"></textarea>
<!--<input type="text" name="data1"><br/>-->
  <br><br>
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
  if(isset($_POST['data1']))
  {
    if(!empty($_POST['data1']))
    {
      //$id = $_POST["idw"];
      $data = $_POST["data1"];

$stid = oci_parse($conn, 'INSERT INTO feedback(customer_name,msg) VALUES(:myid, :mydata)');
oci_bind_by_name($stid, ':myid', $name1);
oci_bind_by_name($stid, ':mydata', $data);
$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "One row inserted";
}

oci_free_statement($stid);
oci_close($conn);
header("Location:feed.php");
//exit;
}
}
}
?>
