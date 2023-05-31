<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Pengawas - Sistem E-Voting Pemilihan Geuchik</title>
	
	<!-- Global stylesheets -->
	<!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">-->
	<link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="../assets/js/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/roboto.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../images/opsi/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/opsi/favicon.ico" type="image/x-icon">
	<!-- /global stylesheets -->
	

	<!-- Core JS files -->
	<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="../assets/js/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script type="text/javascript" src="../assets/js/pages/editor_summernote.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/highchart.js"></script>
	<script type="text/javascript" src="../assets/datatable/jquery.dataTables.js"></script>	
	<script type="text/javascript" src="../assets/datatable/datatables.js"></script>				
	<script type="text/javascript" src="../assets/js/core/app.js"></script>
	<script type="text/javascript" src="../assets/js/datetimepicker-master/jquery.datetimepicker.js"></script>
	<!--<script type="text/javascript" src="../assets/js/pages/dashboard.js"></script>-->
	<script type="text/javascript" src="../assets/js/pages/layout_fixed_native.js"></script>
	<!-- /theme JS files -->		
	<!-- end library template -->


	<?php 
	// mengaktifkan session	
	session_start();

	// cek apakah sudah login atau belum
	if($_SESSION['status'] != "pengawas_login"){
		// jika belum login di alihkan kembali ke halaman login
		header("location:../login.php");
	}
	?>

	<!-- menghubungkan file koneksi database -->
	<?php include '../config.php'; ?>
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top header-highlight">
		<div class="navbar-header">		
			<a class="navbar-brand" href="../index.php"><img src="../images/opsi/logo8.png"></a>
			<ul class="nav navbar-nav visible-xs-block">
				<!-- <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li> -->
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>				
			</ul>

			<p class="navbar-text"><span class=""><b>SISTEM E-VOTING PEMILIHAN GEUCHIK BERBASIS WEB</b> | Pemerintah Gampong Blang Majron</span></p>
			
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">

							Anda Login Sebagai : <span class="text-bold"><?php echo $_SESSION['nama']; ?> (Pengawas)</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="pengawas_detail.php?id="><i class="icon-user"></i> <span>Profil</span></a></li>
							<li><a href="gantipassword.php"><i class="icon-user-lock"></i> <span>Ganti Password</span></a></li>
							<li><a href="logout.php"><i class="icon-switch2"></i> <span>Logout</span></a></li>
						</ul>
						
					</li>
				</ul>
			</div>
		</div>
	</div>

</div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-main sidebar-fixed">
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="category-content">
						<div class="media">
							<?php 
								$id_session = $_SESSION['id'];
								$user = mysqli_query($config,"select * from pengawas where pengawas_id='$id_session'");
								$u = mysqli_fetch_assoc($user);
								?>
								<a href="pengawas_detail.php?id=" class="media-left"><img src="../images/pengawas/<?php echo $u['pengawas_gambar'];  ?>" class="img-circle img-sm" alt=""></a>
							<div class="media-body">
								<!-- menampilkan session nama -->
								<span class="media-heading text-semibold"><?php echo $_SESSION['nama']; ?></span>
								<div class="text-size-mini text-muted">
									Pengawas
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">
							
							<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
							<li><a href="index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
							<li><a href="#"><i class="icon-stack2"></i> <span>Data Master</span></a>
								<ul>																				
									<li><a href="panitia.php"><i class="icon-users"></i> <span>&nbsp; Data Panitia</span></a></li>
									<li><a href="geuchik.php"><i class="icon-user-tie"></i> <span>&nbsp; Data Calon Geuchik</span></a></li>								
									<li><a href="pemilih.php"><i class="icon-users4"></i> <span>Data Pemilih</span></a></li>								
								</ul>
							</li>

							<li><a href="#"><i class="icon-stack2"></i><span>Laporan</span></a>
								<ul>																				
										<li><a href="laporanpemilih.php"><i class="icon-file-stats"></i><span>Laporan Pemilih</span></a></li>
										<li><a href="laporan.php"><i class="icon-file-stats"></i> <span>Laporan Rekapitulasi</span></a></li>													
									</ul>
								</li>
							<li><a href="log.php"><i class="glyphicon glyphicon-log-in"></i> <span>Log Pemilih</span></a></li>	
							<li><a href="device.php"><i class="icon-cog"></i> <span>Device</span></a></li>								

						</ul>
					</div>
				</div>

			</div>
		</div>

		<!-- /main sidebar -->







