<?php session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: team.html');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: team.html");
}

?>
<!DOCTYPE html>

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9e6Xdis8iU8o7d2EwUoC4bkNkUgbi_No&callback=myMap"></script>

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


<form action="park.php" method="get">
<div class="form-group input-group">
    <input type="text" id="search_location" class="form-control" placeholder="Search location">
    <div class="input-group-btn">
        <button class="btn btn-default get_map" type="submit">
            Locate
        </button>
    </div>
</div>
</form>


<!-- display google map -->
<div class="center" style="width:50%;height:400px;border:solid black 2px" id="geomap"></div>

<!-- display selected location information -->
<form action="park.php" >
<!--h4>Location Details</h4-->
<p>Address: </p>
<input type="text" name="location" class="search_addr" size="45">
<button class="btn btn-default btn-primary" type="submit" >Use This Location</button>
</form>
</div>
<?php $location = $_GET['location']; ?>
<script>

var geocoder;
var map;
var marker;

/*
 * Google Map with marker
 */
function initialize() {
    var initialLat = $('.search_latitude').val();
    var initialLong = $('.search_longitude').val();
    initialLat = initialLat?initialLat:43.7734666;
    initialLong = initialLong?initialLong:-79.3362051;

    var latlng = new google.maps.LatLng(initialLat, initialLong);
    var options = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("geomap"), options);

    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: latlng
    });

    google.maps.event.addListener(marker, "dragend", function () {
        var point = marker.getPosition();
        map.panTo(point);
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            }
        });
    });

}

$(document).ready(function () {
    //load google map
    initialize();

    /*
     * autocomplete location search
     */
    var PostCodeid = '#search_location';
    $(function () {
        $(PostCodeid).autocomplete({
            source: function (request, response) {
                geocoder.geocode({
                    'address': request.term
                }, function (results, status) {
                    response($.map(results, function (item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            lat: item.geometry.location.lat(),
                            lon: item.geometry.location.lng()
                        };
                    }));
                });
            },
            select: function (event, ui) {
                $('.search_addr').val(ui.item.value);
                $('.search_latitude').val(ui.item.lat);
                $('.search_longitude').val(ui.item.lon);
                var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                marker.setPosition(latlng);
                initialize();
            }
        });
    });

    /*
     * Point location on google map
     */
    $('.get_map').click(function (e) {
        var address = $(PostCodeid).val();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $('.search_addr').val(results[0].formatted_address);
                $('.search_latitude').val(marker.getPosition().lat());
                $('.search_longitude').val(marker.getPosition().lng());
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
    });

    //Add listener to marker for reverse geocoding
    google.maps.event.addListener(marker, 'drag', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('.search_addr').val(results[0].formatted_address);
                    $('.search_latitude').val(marker.getPosition().lat());
                    $('.search_longitude').val(marker.getPosition().lng());
                }
            }
        });
    });
});
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
<?php $m = $_GET['search_addr']; ?>
</body>

</html>
