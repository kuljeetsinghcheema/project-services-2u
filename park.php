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

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Park Services</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="colorful.css">
  <link rel="stylesheet" href="model.css">
  <script src="model.js"></script>
  <script src="js/navbar-ontop.js"></script>


</head>

<body>
  <nav class=" navbar-expand-md fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <b>Parking Like Never Before</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="agenda.php">Agenda</a>
          </li>
          <li class="nav-item mx-2 mb-2 my-md-0">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-outline-light" href="register.php">Register</a>
      </div>
    </div>
  </nav>

  <div style="margin-top:80px">
  <hr>
  <div class="row">
  <div class="col-md-4 ">
  <div class="" style="margin:20px;border:solid black 2px;width:50%;height:200px">
  <img src="./images/Places-user-identity-icon.png" style="width:100%;height:200px">
  </div>
  </div>
  <div class="col-md-4" >
  <div class="" style="margin:20px;">
  <form action="serverPark.php">
  <label>Name: </label>
  <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
  <p></p>
  <fieldset>
    <p>Location: <strong><?php echo $location ?></strong>
  </fieldset>
  <label> Car Plate Number: </label>
  <input type="text" name="carPlateNumber" placeholder="XXX 000" value="<?php echo $carPlateNumber; ?>">
  <!--<label for="make-and-model">Make and Model:</label>
      <select id="sel-options" class="form-control">
         <option value="">Select Make and Model</option>
         <option *ngFor="bmw"       [ngValue]="u.UserId">BMW X1</option>-->
  </select>
      <select id="makeAndModel" name="make-and-model">
      <option value="0">--Select make and model--</option>
      <option value="BMW 4 Series">BMW 4 Series</option>
      <option value="Audi A Series">Audi A Series</option>
      <option value="Hyundai Elantra">Hyundai Elantra</option>
      <option value="Honda Accord">Honda Accord</option>
      <option value="Merc Benz E Class">Merc Benz E Class</option>
  </select>



  <p>Date in:</p>
  <input type="date" name="date" value="<?php echo $date; ?>">
  <p>Time in:</p>
  <input type="time" name="time" value="<?php echo $time; ?>">
  <p>Time interval:</p>
  <input type="text" name="timeInterval" placeholder="in hours" value="<?php echo $interval; ?>">
  <p><button class="btn" type="submit" style="background-color:black;color:white" name= "book" href="submitted.php">Submit</button>
  </p>
</form>
  </div>
  </div>

  </div>
  </div>


  <script>

  if($_POST['submit'] && $_POST['submit'] != 0)
  {
     $makeAndModel=$_POST['makeAndModel'];

  }

  document.getElementById("btn").onclick = function () {
          location.href = "submitted.php";
      };

  </script>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="js/smooth-scroll.js"></script>

  <div class="text-white bg-dark" id="where">
    <div class="container">
      <div class="row">
        <div class="p-5 col-md-12">
          <h3>
            <b>Park Services</b>
          </h3>
          <p class="">Lambton College, Toronto</p>
          <p class="">parkservices@services2u.com</p>
          <p class="mb-3">1800-PARK-0909</p>
          <a href="#" target="_blank">
            <i class="fa d-inline fa-lg mr-3 text-white fa-linkedin"></i>
          </a>
          <a href="#" target="_blank">
            <i class="fa fa-facebook d-inline fa-lg mr-3 text-white"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-muted">© Copyright 2018 Park Services - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
