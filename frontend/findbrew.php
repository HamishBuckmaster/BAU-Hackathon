<?php

session_start();
require_once('../backend/includes/auth.php');

// you have to be logged in to view this page
require_login();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BnB - Find Brew</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style>
    /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
    #map {
      height: 400px;
      width: 100%;
      position: absolute;
      background-color: grey;
    }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Beer 'n' Buddies</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="findbrew.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Find a Brew</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="favourites.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">View Favourites</span>
          </a>
        </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="joinadventure.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Join Adventure</span>
          </a>
        </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="createadventure.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Create Adventure</span>
          </a>
        </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link"  href="logout_process.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card-header"> <h1> Find a Brew <h1> </div>
      <form>
        <!-- Section for selecting the brew -->
        <h3>Brew:<h3>
        <select class="form-control" placeholder="Search for...">
            <option value="">Select your brew</option>
            <option value="Carlton Draught">Carlton Draught</option>
            <option value="Victorian Bitter">Victorian Bitter</option>
            <option value="Carona">Carona</option>
            <option value="Melbourne Bitter">Melbourne Bitter</option>
            <option value="Pure Blonde">Pure Blonde</option>
          </select>

        <!-- Section for checking the bootle, can, tap -->
        <h3 class="mt-3">Delivery</h3>
        <div class="form-group">
          <div class="row mt-3 ml-1">
            <div class="col-xs-3 mr-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="bottlesbox" type="checkbox" class="form-check-input" checked="true">
                  Bottles
                </label>
              </div>
            </div>
            <div class="col-xs-3 ml-2 mr-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="cansbox" type="checkbox" class="form-check-input" checked="true">
                  Cans
                </label>
              </div>
            </div>
            <div class="col-xs-3 ml-2 mr-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="tapsbox" type="checkbox" class="form-check-input" checked="true">
                  Tap
                </label>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Section for establishment -->
        <h3 class="mt-3">Establishment Type</h3>
        <div class="form-group">
          <div class="row mt-3 ml-1">
            <div class="col-xs-3 mr-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="barsbutton" type="checkbox" class="form-check-input" checked="true">
                  Bars/Pubs
                </label>
              </div>
            </div>
            <div class="col-xs-3 ml-2 mr-2">
              <div class="form-check">
                <label class="form-check-label">
                  <input id="cafesbox"type="checkbox" class="form-check-input" checked="true">
                  Cafés
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- Section for establishment -->
        <h3 class="mt-3">Distance Range (Kilometers)</h3>
        <div class="form-group">
            <input type="text" class="form-control" id="distance">
        </div>
      </form>

      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->

      <div class="container h-100 w-100">
        <div id="map"></div>
      </div>

      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>BnB Team - Melbourne Hackathon 2017</small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary"  href="logout_process.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <script>
          // required options:
          // zoom: integer
          // center: lat, lng
          // zoom levels:
          //   1: world
          //   5: landmass/continent
          //   10: city
          //   15: streets
          //   20: buildings
          var melbourneLocation = {lat: -37.8136, lng: 144.9631};
          function initMap() {
              var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 15,
                  center: melbourneLocation
              });
              var infoWindow = new google.maps.InfoWindow;
              var marker = [];

              // Change this depending on the name of your PHP or XML file
              downloadUrl('mastertoxml.php', function(data) {
                  // Read from XML file and store information
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName('marker');
                  Array.prototype.forEach.call(markers, function(markerElem) {
                      var id = markerElem.getAttribute('CustomerID');
                      var name = markerElem.getAttribute('POCName');
                      var state = markerElem.getAttribute('State');
                      var bde = markerElem.getAttribute('BusinessDevelopmentExecutive');
                      var sm = markerElem.getAttribute('SalesManager');
                      var channel = markerElem.getAttribute('Channel');
                      var psc = markerElem.getAttribute('PrimarySubChannel');
                      var sizetier = markerElem.getAttribute('SizeTier');
                      var orderonline = markerElem.getAttribute('Dotheyorderonline');
                      var point = new google.maps.LatLng(
                          parseFloat(markerElem.getAttribute('Latitude')),
                          parseFloat(markerElem.getAttribute('Longitude'))
                      );
                  
                      // Generate Information Window content
                      var infowincontent = document.createElement('div');

                      // Name of business
                      var strong = document.createElement('strong');
                      strong.textContent = name;
                      infowincontent.appendChild(strong);
                      infowincontent.appendChild(document.createElement('br'));

                      // Type of business
                      var businessType = document.createElement('text');
                      businessType.textContent = psc;
                      infowincontent.appendChild(businessType);
                      infowincontent.appendChild(document.createElement('br'));

                      // Business location (lat + long)
                      var loc = document.createElement('text');
                      loc.textContent = point;
                      infowincontent.appendChild(loc);

                      var tempMarker = new google.maps.Marker({
                          map: map,
                          position: point,
                      });   

                      tempMarker.addListener('click', function() {
                          infoWindow.setContent(infowincontent);
                          infoWindow.open(map, tempMarker);
                      });

                      marker.push(tempMarker);
                  });

                  var markerCluster = new MarkerClusterer(map, marker,
                  {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
              });
          }
          
          function downloadUrl(url,callback) {
              var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

              request.onreadystatechange = function() {
                  if (request.readyState == 4) {
                      request.onreadystatechange = doNothing;
                      callback(request, request.status);
                  }
              };

              request.open('GET', url, true);
              request.send(null);
          }

          function doNothing() {}
      </script>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper/popper.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      <!-- <script src="js/sb-admin-charts.min.js"></script> -->

      <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>    
      <script $(document).ready(function() {async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1e4XhQeYiztIJG3rqxeXA-xx1ZsZxcAI&callback=initMap"});></script>
    </div>
  </div>
</body>

</html>
