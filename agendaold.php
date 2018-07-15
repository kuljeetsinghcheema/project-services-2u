<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<html>

   <head>
      <title>Agenda</title>
   </head>

   <body>
     <p>Name: <strong><?php echo $_SESSION['username']; ?></strong></p>
     <?php



     $b = $_GET['carPlateNumber'];
     $c = $_GET['c'];
     $d = $_GET['d'];
     $e = $_GET['e'];
     $f = $_GET['f'];
     $g = $_GET['g'];

      $a =array($b,$c,$d,$e,$f,$g);
             $c=0;
			 $t=0;
			 $y=0;
			 $ad=0;
			 $s=0;

			  
			  echo  "Car Plate Number:$b<br>";

			  echo"</h3>";
      ?>
	   </body>
</html>
