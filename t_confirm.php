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
<h1>Confirm</h1>
<body>
<?php
// Create connection to Oracle
$conn = oci_connect("project", "project", "//localhost/orcl");

$query = 'select * from confirm';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
print '<table border="1">';
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
