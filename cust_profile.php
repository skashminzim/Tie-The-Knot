<!DOCTYPE html>
<?php
   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
   //echo $_SESSION['id'];
  $name1=$_SESSION["name"] ;
  $pass1=$_SESSION["pass"] ;
  $_SESSION["name"] =  $name1;
  $_SESSION["pass"] = $pass1 ;
?>
<html>
<head><title>Profile | Tie the Knot</title></head>
<style>
h1 {
  color:#6C3483 ;
  text-decoration: underline;
}
body {background-color: #AEB6BF;}
</style>
<h1>Customer Info</h1>
<body>
<?php
// Create connection to Oracle
$conn = oci_connect("project", "project", "//localhost/orcl");

$query = "SELECT customer_id,customer_name,customer_phone,customer_email,customer_address from customer where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

// Fetch each row in an associative array
$cars = array("ID : ", "NAME : ","Phone no : ","Email ID : ","Address : ");
 while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
  print '<tr>';
  $i=0;
  foreach ($row as $item) {
  echo "<b>". $cars[$i]."</b>";
      $i=$i+1;
      print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      echo "<br>";
  }
 }
// fetch selected_Cart

$sum=0;
echo "<p> <font color=blue>Your selected orders:</font> </p>";
//catering
$query = "SELECT event_id,catering.package_cost,catering.guest_no,catering.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN catering where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
echo "Catering : ";
     $k=0;
      print '<table border="1">';
        print '<td>'.'event_id'.'</td>';
      print '<td>'.'package cost'.'</td>';
        print '<td>'.'guest no'.'</td>';
          print '<td>'.'total cost '.'</td>';
            print '<td>'.'Select'.'</td>';
          print '<br>';
      while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
       print '<tr>';
       foreach ($row as $item) {
           print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
           //<a href="index.php" class="txt3">Remove Item</a>
         //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
       if($k=0){
           $_SESSION["event"] =  $item;
         }
           $k=$k+1;
       } //print '<td>'.'ll'.'</td>';
      // echo "<td><a href='delete.php'>Remove Item</a></td>";
   echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
</form></td>';

       print '</tr>';
      }

      print '</table>';
      //go to delete page
      $_SESSION["name"] =  $name1;
      $_SESSION["pass"] = $pass1 ;
    /*  if(isset($_POST['submit'])){
          //header("Location:delete.php");
      echo '<br>';
        echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
      </form>';
            if(isset($_POST['idw'])){
              if(!empty($_POST['idw']))
              {
           $_SESSION["event"] = $_POST['idw'] ;
           $_SESSION["tab"] = 'catering';
            header("Location:delete.php");
              //echo 'xx';
          }else{
            echo 'Please confirm Event ID';
          }}
      }
*/
      //photograpgy
      $query = "SELECT event_id,photography.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN photography where customer_name='$name1'and password= '$pass1'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      // Fetch each row in an associative array
      echo "Photography : ";
           $k=0;
            print '<table border="1">';
              print '<td>'.'event_id'.'</td>';
            print '<td>'.'package cost'.'</td>';
                  print '<td>'.'Select'.'</td>';
                print '<br>';
            while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
             print '<tr>';
             foreach ($row as $item) {
                 print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                 //<a href="index.php" class="txt3">Remove Item</a>
               //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
             if($k=0){
                 $_SESSION["event"] =  $item;
               }
                 $k=$k+1;
             } //print '<td>'.'ll'.'</td>';
            // echo "<td><a href='delete.php'>Remove Item</a></td>";
         echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
      </form></td>';

             print '</tr>';
            }

            print '</table>';
            //go to delete page
            $_SESSION["name"] =  $name1;
            $_SESSION["pass"] = $pass1 ;
          /*  if(isset($_POST['submit'])){
                //header("Location:delete.php");
            echo '<br>';
              echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
            </form>';
                  if(isset($_POST['idw'])){
                    if(!empty($_POST['idw']))
                    {
                 $_SESSION["event"] = $_POST['idw'] ;
                  $_SESSION["tab"] = 'photography';
                  header("Location:delete.php");
                    //echo 'xx';
                }else{
                  echo 'Please confirm Event ID';
                }}
            }*/
            //Music_dj
            //$query = "SELECT event_id,music_dj.expense_per_hour, music_dj.hour_needed,music_dj.total_cost  FROM customer NATURAL JOIN choose NATURAL JOIN music_dj where customer_name='$name1'and password= '$pass1'";/***change***/
			$query = "SELECT event_id,music_dj.expense_per_hour,music_dj.hour_needed,music_dj.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN music_dj where customer_name='$name1'and password= '$pass1'";
            $stid = oci_parse($conn, $query);
            $r = oci_execute($stid);
            // Fetch each row in an associative array
            echo "Music Dj : ";/***change***/
                 $k=0;
                  print '<table border="1">';
                    print '<td>'.'event_id'.'</td>';
					 print '<td>'.'expense_per_hour'.'</td>';
					  print '<td>'.'hour_needed'.'</td>';
                  print '<td>'.'total cost'.'</td>';/***change(table er row name wise change)***/
                        print '<td>'.'Select'.'</td>';
                      print '<br>';
                  while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
                   print '<tr>';
                   foreach ($row as $item) {
                       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                       //<a href="index.php" class="txt3">Remove Item</a>
                     //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
                   if($k=0){
                       $_SESSION["event"] =  $item;
                     }
                       $k=$k+1;
                   } //print '<td>'.'ll'.'</td>';
                  // echo "<td><a href='delete.php'>Remove Item</a></td>";
               echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
            </form></td>';

                   print '</tr>';
                  }

                  print '</table>';
                  //go to delete page
                  $_SESSION["name"] =  $name1;
                  $_SESSION["pass"] = $pass1 ;
              /*   if(isset($_POST['submit'])){
                      //header("Location:delete.php");
                  echo '<br>';
                    echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
                  </form>';
                        if(isset($_POST['idw'])){
                          if(!empty($_POST['idw']))
                          {
                       $_SESSION["event"] = $_POST['idw'] ;
                        $_SESSION["tab"] = 'music';
                        header("Location:delete.php");

                      }else{
                        echo 'Please confirm Event ID';
                      }}
                  }*/

				  //parlor
      $query = "SELECT event_id,parlour.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN parlour where customer_name='$name1'and password= '$pass1'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      // Fetch each row in an associative array
      echo "Parlour  : ";
           $k=0;
            print '<table border="1">';
              print '<td>'.'event_id'.'</td>';
            print '<td>'.'package cost'.'</td>';
                  print '<td>'.'Select'.'</td>';
                print '<br>';
            while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
             print '<tr>';
             foreach ($row as $item) {
                 print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                 //<a href="index.php" class="txt3">Remove Item</a>
               //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
             if($k=0){
                 $_SESSION["event"] =  $item;
               }
                 $k=$k+1;
             } //print '<td>'.'ll'.'</td>';
            // echo "<td><a href='delete.php'>Remove Item</a></td>";
         echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
      </form></td>';

             print '</tr>';
            }

            print '</table>';
            //go to delete page
            $_SESSION["name"] =  $name1;
            $_SESSION["pass"] = $pass1 ;
      /*      if(isset($_POST['submit'])){
                //header("Location:delete.php");
            echo '<br>';
              echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
            </form>';
                  if(isset($_POST['idw'])){
                    if(!empty($_POST['idw']))
                    {
                 $_SESSION["event"] = $_POST['idw'] ;
                  $_SESSION["tab"] = 'parlour';
                  header("Location:delete.php");
                    //echo 'xx';
                }else{
                  echo 'Please confirm Event ID';
                }}
            }
*/

			//stage
      $query = "SELECT event_id,stage.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN stage where customer_name='$name1'and password= '$pass1'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      // Fetch each row in an associative array
      echo "Stage  : ";
           $k=0;
            print '<table border="1">';
              print '<td>'.'event_id'.'</td>';
            print '<td>'.'package cost'.'</td>';
                  print '<td>'.'Select'.'</td>';
                print '<br>';
            while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
             print '<tr>';
             foreach ($row as $item) {
                 print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                 //<a href="index.php" class="txt3">Remove Item</a>
               //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
             if($k=0){
                 $_SESSION["event"] =  $item;
               }
                 $k=$k+1;
             } //print '<td>'.'ll'.'</td>';
            // echo "<td><a href='delete.php'>Remove Item</a></td>";
         echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
      </form></td>';

             print '</tr>';
            }

            print '</table>';
            //go to delete page
            $_SESSION["name"] =  $name1;
            $_SESSION["pass"] = $pass1 ;
    /*        if(isset($_POST['submit'])){
                //header("Location:delete.php");
            echo '<br>';
              echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
            </form>';
                  if(isset($_POST['idw'])){
                    if(!empty($_POST['idw']))
                    {
                 $_SESSION["event"] = $_POST['idw'] ;
                  $_SESSION["tab"] = 'stage';
                  header("Location:delete.php");
                    //echo 'xx';
                }else{
                  echo 'Please confirm Event ID';
                }}
            }
*/

			//venue
      $query = "SELECT event_id,venue.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN venue where customer_name='$name1'and password= '$pass1'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      // Fetch each row in an associative array
      echo "Venue  : ";
           $k=0;
            print '<table border="1">';
              print '<td>'.'event_id'.'</td>';
            print '<td>'.'package cost'.'</td>';
                  print '<td>'.'Select'.'</td>';
                print '<br>';
            while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
             print '<tr>';
             foreach ($row as $item) {
                 print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                 //<a href="index.php" class="txt3">Remove Item</a>
               //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
             if($k=0){
                 $_SESSION["event"] =  $item;
               }
                 $k=$k+1;
             } //print '<td>'.'ll'.'</td>';
            // echo "<td><a href='delete.php'>Remove Item</a></td>";
         echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
      </form></td>';

             print '</tr>';
            }

            print '</table>';
            //go to delete page
            $_SESSION["name"] =  $name1;
            $_SESSION["pass"] = $pass1 ;
      /*      if(isset($_POST['submit'])){
                //header("Location:delete.php");
            echo '<br>';
              echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
            </form>';
                  if(isset($_POST['idw'])){
                    if(!empty($_POST['idw']))
                    {
                 $_SESSION["event"] = $_POST['idw'] ;
                  $_SESSION["tab"] = 'venue';
                  header("Location:delete.php");
                    //echo 'xx';
                }else{
                  echo 'Please confirm Event ID';
                }}
            }

*/
			//car
$query = "SELECT event_id,car.package_cost,car.hour_needed,car.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN car where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
echo "Car : ";
     $k=0;
      print '<table border="1">';
        print '<td>'.'event_id'.'</td>';
      print '<td>'.'package_cost'.'</td>';
        print '<td>'.'hour_needed'.'</td>';
          print '<td>'.'total_cost '.'</td>';
            print '<td>'.'Select'.'</td>';
          print '<br>';
      while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
       print '<tr>';
       foreach ($row as $item) {
           print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
           //<a href="index.php" class="txt3">Remove Item</a>
         //  <a><?php echo( "<button onclick= \"location.href='inc/index.php'\">Remove Item</button>");?//></a>
       if($k=0){
           $_SESSION["event"] =  $item;
         }
           $k=$k+1;
       } //print '<td>'.'ll'.'</td>';
      // echo "<td><a href='delete.php'>Remove Item</a></td>";
   echo '<td><form method="POST"><input type="submit" name="submit" value="Remove Item">
</form></td>';

       print '</tr>';
      }

      print '</table>';
      //go to delete page
      $_SESSION["name"] =  $name1;
      $_SESSION["pass"] = $pass1 ;
      if(isset($_POST['submit'])){
          //header("Location:delete.php");
      echo '<br>';
        echo '<form method="POST">Confirm Event ID : <input type="number" name="idw"><input type="submit" name="submit" value="Confirm">
      </form>';
            if(isset($_POST['idw'])){
              if(!empty($_POST['idw']))
              {
           $_SESSION["event"] = $_POST['idw'] ;
           $_SESSION["tab"] = 'car';
            header("Location:delete.php");
              //echo 'xx';
          }else{
            echo 'Please confirm Event ID';
          }}
      }


//$_SESSION["name"] =  $name1;
//$_SESSION["pass"] = $pass1 ;
////////******************************************************************************cost_sum_count*************************************************************/////////
$sum=0;
//echo "<p> <font color=blue>Your selected orders:</font> </p>";
//catering
$query = "SELECT catering.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN catering where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
//echo "Catering cost : ";
//$cars = array("package cost : ", "guest no : ","total cost : ");
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 $i=0;
 foreach ($row as $item) {
     $i=$i+1;
  //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            $sum=$item + $sum;
        }
      //  print '<br>';
      }
    //  print '<br>';
//Music_Dj
      $query = "SELECT music_dj.total_cost FROM music_dj NATURAL JOIN choose NATURAL JOIN customer where customer_name='$name1'and password= '$pass1'";
      $stid = oci_parse($conn, $query);
      $r = oci_execute($stid);
      // Fetch each row in an associative array
    //  echo "Music_dj cost : ";
      //$cars = array("package cost : ", "guest no : ","total cost : ");
      while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
       print '<tr>';
       $i=0;
       foreach ($row as $item) {
           $i=$i+1;
        //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
             $sum=$item + $sum;
              }
            }
          //  print '<br>';
            //photography
                                    $query = "SELECT photography.package_cost FROM photography NATURAL JOIN choose NATURAL JOIN customer where customer_name='$name1'and password= '$pass1'";
                                    $stid = oci_parse($conn, $query);
                                    $r = oci_execute($stid);
                                    // Fetch each row in an associative array
                                    //echo "Photography cost : ";
                                    //$cars = array("package cost : ", "guest no : ","total cost : ");
                                    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
                                     print '<tr>';
                                     $i=0;
                                     foreach ($row as $item) {
                                         $i=$i+1;
                                //         print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                                          $sum=$item + $sum;
                                            }
                                          //  print '<br>';
                                          }
                                        //  print '<br>';
		//parlour
$query = "SELECT parlour.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN parlour where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
//echo "Catering cost : ";
//$cars = array("package cost : ", "guest no : ","total cost : ");
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 $i=0;
 foreach ($row as $item) {
     $i=$i+1;
  //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            $sum=$item + $sum;
        }
      //  print '<br>';
      }
//stage
$query = "SELECT stage.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN stage where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
//echo "Catering cost : ";
//$cars = array("package cost : ", "guest no : ","total cost : ");
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 $i=0;
 foreach ($row as $item) {
     $i=$i+1;
  //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            $sum=$item + $sum;
        }
      //  print '<br>';
      }

//venue
$query = "SELECT venue.package_cost FROM customer NATURAL JOIN choose NATURAL JOIN venue where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
//echo "Catering cost : ";
//$cars = array("package cost : ", "guest no : ","total cost : ");
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 $i=0;
 foreach ($row as $item) {
     $i=$i+1;
  //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            $sum=$item + $sum;
        }
      //  print '<br>';
      }

//car
$query = "SELECT car.total_cost FROM customer NATURAL JOIN choose NATURAL JOIN car where customer_name='$name1'and password= '$pass1'";
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);
// Fetch each row in an associative array
//echo "Car cost : ";
//$cars = array("package cost : ", "guest no : ","total cost : ");
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
 print '<tr>';
 $i=0;
 foreach ($row as $item) {
     $i=$i+1;
  //   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
            $sum=$item + $sum;
        }
      //  print '<br>';
      }
    //  print '<br>';

//total_sum
echo "<p> <font color=blue>Total cost :</font> </p>";
echo $sum;
print '<br>';
$_SESSION["name"] =  $name1;
$_SESSION["pass"] = $pass1 ;
//print '</table>';
?>
  <a href="index.php" class="txt3">
    <br>Order more?
  </a>
  <a href="confirm.php" class="txt3">
    <br>Confirm?
  </a>


</body>
</html>
