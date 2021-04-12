<!DOCTYPE html>
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
