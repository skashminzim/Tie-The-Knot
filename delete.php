<?php
 session_start();
$name1=$_SESSION["name"] ;
$pass1=$_SESSION["pass"] ;
$even1= $_SESSION["event"];
$tab=$_SESSION["tab"];
$_SESSION["name"] =  $name1;
$_SESSION["pass"] = $pass1 ;
 $_SESSION["event"] = $even1;
echo $tab;
$conn = oci_connect("project", "project", "//localhost/orcl");

$stid = oci_parse($conn, "DELETE from choose where event_id='$even1'");
//oci_bind_by_name($stid, ':myid', $id);
//oci_bind_by_name($stid, ':mydata', $even1);
$r = oci_execute($stid);  // executes and commits
/*if ($r) {
    print "Order has been confirmed";
    echo "<br>";
    $_SESSION["name"] = $name1;
    $_SESSION["pass"] = $pass1;
}*/
oci_free_statement($stid);
if($tab == "photography")
{
  $stid = oci_parse($conn, "DELETE from photography where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "catering")
{
  $stid = oci_parse($conn, "DELETE from catering where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "music")/***change***/
{
  $stid = oci_parse($conn, "DELETE from music_dj where event_id='$even1'");/***change***/
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "parlour")
{
  $stid = oci_parse($conn, "DELETE from parlour where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "stage")
{
  $stid = oci_parse($conn, "DELETE from stage where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "venue")
{
  $stid = oci_parse($conn, "DELETE from venue where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
if($tab == "car")
{
  $stid = oci_parse($conn, "DELETE from car where event_id='$even1'");
  //oci_bind_by_name($stid, ':myid', $id);
//  oci_bind_by_name($stid, ':mydata', $even1);
  $r = oci_execute($stid);  // executes and commits
  if ($r) {
    //  print "Order has been confirmed";
    //  echo "<br>";
      $_SESSION["name"] = $name1;
      $_SESSION["pass"] = $pass1;
      header("Location:cust_profile.php");
  }
}
 ?>
