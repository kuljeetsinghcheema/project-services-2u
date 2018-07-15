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

$username = $_GET['username'];
$carPlateNumber = $_GET['carPlateNumber'];
$makeAndModel = $_GET['make-and-model'];
$date = $_GET['date'];
$time = $_GET['time'];
$timeInterval = $_GET['timeInterval'];
$location = $_GET['location'];
$spot = $_GET['spot'];

$sql = "INSERT INTO parkings (username, carplatenumber, makeandmodel, date, time, timeinterval, location, spot)
VALUES ('$username', '$carPlateNumber', '$makeAndModel', '$date', '$time', '$timeInterval', '$location', '$spot')";

if (mysqli_query($conn, $sql)) {
  echo "Your parking has been added sucesfully";
    ?>
    <a href="agenda.php">Agenda</a>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
