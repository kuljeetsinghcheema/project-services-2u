<?php include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Park Services</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="colorful.css">
  <link rel="stylesheet" href="model.css">
  <script src="model.js"></script>
  <script src="js/navbar-ontop.js"></script>

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
            <a class="nav-link" href="team.html">Home</a>
          </li>
          <li class="nav-item mx-2 mb-2 my-md-0">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-outline-light" href="map.php">Park</a>
      </div>
    </div>
  </nav>

  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>

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
