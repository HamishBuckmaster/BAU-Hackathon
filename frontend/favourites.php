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
  <title>BnB - Manage Favourites</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
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
            <span class="nav-link-text">Join Journey</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="createadventure.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Create Journey</span>
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
        <div class="card-header"> <h1> Manage Your Favourites </h1> </div>
        <!-- Favourites information-->
        <p></p>
        <!-- Adding a new brew to your favourites list -->
        <h3>Add New Favourite</h3>
        <!-- Section for selecting the brew -->
        <h4 class="mt-3">Brew:</h4>
        <select class="form-control" placeholder="Search for...">
          <option value="">Select your brew</option>
          <option value="Carlton Draught">Carlton Draught</option>
          <option value="Victorian Bitter">Victorian Bitter</option>
          <option value="Carona">Carona</option>
          <option value="Melbourne Bitter">Melbourne Bitter</option>
          <option value="Pure Blonde">Pure Blonde</option>
        </select>

        <!-- Section for checking the bootle, can, tap -->
        <h4 class="mt-3">Delivery</h4>
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
          <button class="btn btn-lg btn-primary">Add</button>
        </div>

        <!-- Managing existing favourite brews -->
        <h3 class="mt-5">Current Favourites</h3>

        <div class="panel panel-primary mt-2">
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">
                <label class="mt-1">
                  <h5>Victoria Bitter</h5>
                </label>
                <div class="pull-right action-buttons">
                  <a href="http://www.jquery2dotnet.com" class="trash"><span class="fa fa-trash fa-2x mr-2"></span></a>
                  <a href="http://www.jquery2dotnet.com" class="flag"><span class="fa fa-location-arrow fa-2x"></span></a>
                </div>
              </li>
              <li class="list-group-item">
                <label class="mt-1">
                  <h5>Corona</h5>
                </label>
                <div class="pull-right action-buttons">
                  <a href="http://www.jquery2dotnet.com" class="trash"><span class="fa fa-trash fa-2x mr-2"></span></a>
                  <a href="http://www.jquery2dotnet.com" class="flag"><span class="fa fa-location-arrow fa-2x"></span></a>
                </div>
              </li>
              <li class="list-group-item">
                <label class="mt-1">
                  <h5>Carlton Dry</h5>
                </label>
                <div class="pull-right action-buttons">
                  <a href="http://www.jquery2dotnet.com" class="trash"><span class="fa fa-trash fa-2x mr-2"></span></a>
                  <a href="http://www.jquery2dotnet.com" class="flag"><span class="fa fa-location-arrow fa-2x"></span></a>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
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
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
        <script src="js/sb-admin-charts.min.js"></script>
      </div>
    </div>
  </div>
</body>

</html>
