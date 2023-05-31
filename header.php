<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem E-Voting Pemilihan Geuchik Gampong Blang Majron</title>
  <!-- Global stylesheets -->
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">-->
  <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet"  type="text/css">
  <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="assets/js/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
  <link href="assets/css/roboto.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="images/opsi/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/opsi/favicon.ico" type="image/x-icon">

  <!-- /global stylesheets -->
  <!-- Core JS files -->
  <!-- <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script> -->
  <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
  <!-- /core JS files -->
  <!-- Theme JS files -->
  <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
  <script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/js/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
  <script type="text/javascript" src="assets/js/plugins/editors/summernote/summernote.min.js"></script>
  <script type="text/javascript" src="assets/js/pages/editor_summernote.js"></script>
  <script type="text/javascript" src="assets/js/highcharts/highcharts.js"></script>
  <script type="text/javascript" src="assets/js/highcharts/highcharts-more.js"></script>
  <script type="text/javascript" src="assets/datatable/jquery.dataTables.js"></script>
  <script type="text/javascript" src="assets/datatable/datatables.js"></script>
  <script type="text/javascript" src="assets/js/core/app.js"></script>
  <script type="text/javascript" src="assets/js/datetimepicker-master/jquery.datetimepicker.js"></script>
  <!-- <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>-->
  <!-- /theme JS files -->
  <!-- end library template -->
  
</head>
<body class="layout-boxed">
  <?php session_start(); ?>
  <?php include 'config.php'; ?>
  <div class="navbar bg-blue">
    <br/>
    <br/>
    <div class="row">
      <div class="col-md-2">
        <center>
          <a href="index.php"><img src="images/opsi/logo.png" style="width: 100px"></a>
        </center>
      </div>
      <div class="col-md-8">
        <h1><b>SISTEM E-VOTING PEMILIHAN GEUCHIK BERBASIS WEB</b><br/> PEMERINTAH GAMPONG BLANG MAJRON</h1>
      </div>
      <div class="col-md-2">
        <center><a href="voting.php"><img src="images/opsi/golput4.png" style="width: 150px"></a></center>
      </div>
    </div>
    <br/>
    <br/>
      <!-- text Berjalan
        <marquee class="hakko" behavior="scroll" direction="left" style="font-size: 12pt" onmouseover="this.stop();" onmouseout="this.start();" >Selamat datang pada halaman Sistem E-Voting Pemilihan Geuchik Bermasis Web, Pemerintah Gampong Blang Majron</marquee>-->
      </div>
      <!-- Main navbar -->
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-paragraph-justify3"></i></a></li>
          </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><i class="fa fa-home"></i><span>  HOME</span></a></li>
            <li><a href="pemilih.php"><span>CEK PEMILIH</span></a></li>
            <li><a href="geuchik.php"><span>CALON GEUCHIK</span></a></li>
            <li><a href="jadwal.php"><span>JADWAL VOTING</span></a></li>
            <li><a href="voting.php"><span>VOTING</span></a></li>
            <li><a href="hasil.php"><span>HASIL VOTING</span></a></li>
            <li><a href="about.php"><span>ABOUT</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><i class="fa fa-key"></i> <span> LOGIN</span></a></li>
          </ul>
        </div>
      </div>
      <!-- /main navbar -->
      <!-- Page container -->
      <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
          <!-- Main content -->
          <div class="content-wrapper">