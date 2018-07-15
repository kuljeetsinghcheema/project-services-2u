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
  include "serverPark.php";
}

?>
<!DOCTYPE html>
<html>
<body>


<?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "database";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"><br>
<?php
$username = $_SESSION['username'];
echo "username is " . $username;
$sql = "SELECT carplatenumber, makeandmodel, date FROM parkings WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["carplatenumber"]. " - Name: " . $row["makeandmodel"]. " " . $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>
