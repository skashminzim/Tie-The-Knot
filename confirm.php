<!DOCTYPE html>
<?php
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;
?>
<!--
<form method="POST">
<p>Event Date:</p>
<input type="date" name="idw"><br/>
<p>Enter amount of a table:</p>
<input type="number" name="data1"><br/>
<input type="submit" value="insert">
</form>-->
<style>
h1 {
  color:#6C3483 ;
  text-decoration: underline;
}
body {background-color: #AEB6BF;}
</style>
<body>
  <h1>Please Choose Event Time & date</h1>
<form name="Filter" method="POST">
    Event Date:
    <input type="date" name="idw" />
    <br/>
    Event Start Time:
  <!--  <input type="time" name="data1" />-->
  <select name="data1">
    <option value="evening">evening</option>
    <option value="morning">morning</option>
</select>
    <br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
</body>
<?php
/*
if(isset($_POST['idw']))
{
$new_date = date('Y-m-d', strtotime($_POST['idw']));
echo $new_date;
echo $_POST['data1'];
}*/


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
      $id = date('Y-m-d', strtotime($_POST['idw']));
    //  $id = $_POST["idw"];
      $data = $_POST["data1"];

$stid = oci_parse($conn, "INSERT INTO confirm(customer_name,password,event_date,event_time) VALUES('$name1','$pass1',TO_DATE(:myid,'YYYY-MM-DD'), :mydata)");
oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $data);
$r = oci_execute($stid);  // executes and commits
if ($r) {
    print "One row inserted";
    $_SESSION["name"] = $name1;
    $_SESSION["pass"] = $pass1;
     header("Location:Confirm1.php");
}

oci_free_statement($stid);
oci_close($conn);
//header("Location:blank.php");
//exit;
}
}
}
?>
