<!DOCTYPE html>
<?php

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;
?>

<html>
<head><title>Photography|Tie the Knot</title></head>
<style>
h1 {
  color:#6C3483 ;

}
body {background-color: #AEB6BF;}
</style>
<h1>Thanks for selecting us!</h1>
<body>
<?php
// Create connection to Oracle
$conn = oci_connect("project", "project", "//localhost/orcl");

//$query = 'INSERT INTO LOAN (LOAN_ID,AMOUNT) VALUES(l2, 22)';

//$stid = oci_parse($conn, $query);
//$r = oci_execute($stid);
//$id = rand(13,28);
$expense = 15000;

$stid = oci_parse($conn, 'INSERT INTO Photography(event_id ,package_cost ) VALUES(eve_id_seq.nextval, :mydata )');
//oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $expense);
$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "Your order is added to the cart!";
    echo "<br>";
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
  echo "<a href='index.php'>
<font color=blue size=4pt> Click here to
return to the homepage.
</font></a>";
    $_SESSION["name"] = $name1;
    $_SESSION["pass"] = $pass1;
}

oci_free_statement($stid);
oci_close($conn);
?>
</body>
</html>
