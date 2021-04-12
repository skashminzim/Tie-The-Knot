<!DOCTYPE html>
<?php
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;

  $_SESSION["name"] = $name1;
  $_SESSION["pass"] = $pass1;
?>
<head><title>Profile | Tie the Knot</title></head>
<style>
h1 {
  color:#6C3483 ;
  text-decoration: underline;
}
body {background-color: #AEB6BF;}
</style>
<body>
  <h1>Thank you!</h1>
  <p>Our employee will contact you soon!<p>
<a href="feedback.php" class="txt3">
  <br>give feedback?
</a>


</body>
</html>
<?php
echo '<br>';
echo "<a href='start.php'>
<font color=blue size=4pt>logout?
</font></a>";
?>
