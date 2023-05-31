<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">GANTI PASSWORD SAYA</h4>
						<div class="heading-elements">
							<!-- tombol kembali -->
							<a href="index.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- cek notifikasi pergantian password -->
							<?php
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'><b>Password</b> berhasil diganti.</div>";
								}
								if($_GET['pesan']=="gagal"){
									echo "<div class='alert alert-warning'><b>Password</b> anda gagal diganti.</div>";
								}
								if($_GET['pesan']=="tidak_cocok"){
									echo "<div class='alert alert-danger'><b>Konfirmasi Password</b> anda tidak cocok.</div>";
								}
								if($_GET['pesan']=="min5"){
									echo "<div class='alert alert-danger'><b>Password Baru</b> anda masukkan kurang dari 8 karakter.</div>";
								}
								if($_GET['pesan']=="t_passlama"){
									echo "<div class='alert alert-warning'><b>Password Lama</b> anda salah.</div>";
								}
							}
							?>
							<form action="gantipassword_act.php" method="post">
								<table class="table">
									<tr>
										<th width="20%">Password Lama</th>
										<td><input type="password" class="form-control" name="password_lama"></td>
									</tr>
									<tr>
										<th width="20%">Password Baru</th>
										<td><input type="password" class="form-control" name="password_baru"></td>
									</tr>
									<tr>
										<th width="20%">Konfirmasi Password Baru</th>
										<td><input type="password" class="form-control" name="konfirmasi_password"></td>
									</tr>
									<tr>
										<th></th>
										<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>