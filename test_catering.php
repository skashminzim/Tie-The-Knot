<!DOCTYPE html>
<html>
<head><title>Customer</title></head>
<style>
h1 {
  color:#6C3483 ;
  text-decoration: underline;
}
body {background-color: #AEB6BF;}
</style>
<h1>Catering Table</h1>
<body>
<?php
// Create connection to Oracle
$conn = oci_connect("project", "project", "//localhost/orcl");

$query = 'SELECT customer.customer_name,event_id,catering.package_cost,catering.guest_no,catering.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN catering where customer_id=158';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
print '<td>'.'Name'.'</td>';
print '<td>'.'event_id'.'</td>';
print '<td>'.'package cost'.'</td>';
print '<td>'.'guest no'.'</td>';
  print '<td>'.'total cost '.'</td>';
  //  print '<td>'.'Select'.'</td>';
  print '<br>';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 foreach ($row as $item) {
     print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
 }
 print '</tr>';
}
print '</table>';
?>
</body>
</html>
