<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem E-Voting Pemilihan Geuchik</title>
	<!-- library template -->
	<!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bgimg-parallax.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bgimg.css" rel="stylesheet" type="text/css">
	<link href="assets/css/font.css" rel="stylesheet" type="text/css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/roboto.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="assets/js/parallax.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	<!-- end library template -->
</head>
<body class="login-container">
	<div class="background" id="background"></div>
	<div class="backdrop"></div>
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<div class="login-form-container" id="login-form">
						
						<div class="panel panel-body">
							
							<center>
								<img src="images/opsi/logo.png" style="width: 100px">
							</center>
							<h4 style="text-align: center;">SISTEM E-VOTING PEMILIHAN GEUCHIK BERBASIS WEB</h4>
							<h6 class="text-center text-muted">PEMERINTAH GAMPONG BLANG MAJRON</h6>
							<br/>
							<?php
										// cek alert gagal
							if(isset($_GET['alert'])){
											// cek jika alert sama dengan gagal
								if($_GET['alert']=="gagal"){
												// maka tampilkan pesan alert berikut
									echo "<div class='alert alert-danger text-center'>Login GAGAL! <br/>Username dan Password tidak sesuai.</div>";
								}
							}
							?>
							<form action="login_act.php" method="post">
								<div class="form-group has-feedback has-feedback-left">
									<input type="text" class="form-control" placeholder="Username" name="username" required="required">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									<input type="password" class="form-control" placeholder="Password" name="password" required="required">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
								<center>Login sebagai :</center>
								<div class="form-group has-feedback has-feedback-left">
									<select class="form-control" name="sebagai" required="required">
										<option value="admin">Admin</option>
										<option value="panitia">Panitia</option>
										<option value="pengawas">Pengawas</option>
									</select>
									<div class="form-control-feedback">
										<i class="icon-question4 text-muted"></i>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn bg-primary btn-block text-bold">LOGIN</button>
									<br/>
									<center>
										
										<a href="index.php" class="text-bold">Kembali</a>
									</center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- /content area -->
	</div>
	<!-- /main content -->
</div>
<!-- /page content -->
</div>
<!-- /page container -->
<script type="text/javascript">
	$('#background').mouseParallax({ moveFactor: 10 });
</script>
</body>
</html>