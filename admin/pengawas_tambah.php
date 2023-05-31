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
						<h4 class="panel-title">TAMBAH PENGAWAS BARU</h4>
						<div class="heading-elements">
							<a href="pengawas.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert']=="nik_sama"){
								echo "<div class='alert alert-danger'>Data gagal di simpan karena NIK yang di isi sudah ada.</div>";
							}
							elseif(isset($_GET['alert'])){
							if($_GET['alert']=="gagal"){
								echo "<div class='alert alert-danger'>Format Gambar Tidak didukung.</div>";
							}
							elseif($_GET['alert']=="gagal"){
								echo "<div class='alert alert-danger'>Ada isian yang kosong.</div>";
							}
							elseif($_GET['alert']=="nik_username"){
								echo "<div class='alert alert-danger'>Data gagal di simpan karena Username yang di isi sudah ada.</div>";
							}
						}
					}

						?>

						<div class="table-responsive">
							<form action="pengawas_add_act.php" method="post" enctype="multipart/form-data">
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Username</th>
										<td><input type="text" class="form-control" name="username" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Password</th>
										<td><input type="password" class="form-control" name="password" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">NIK</th>
										<td><input type="number" maxlength="16" class="form-control form-nik" name="nik" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Nama Lengkap</th>
										<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Foto</th>
										<td><input type="file" name="foto" required="required" accept="image/*"></td>
									</tr>
									<tr>
										<th width="20%">Tempat Lahir</th>
										<td><input type="text" class="form-control" name="tempat_lahir" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Tanggal Lahir</th>
										<td><input type="date" class="form-control" name="tanggal_lahir" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Jenis Kelamin</th>
										<td>
											<select name="jk" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</td>
									</tr>									
									<tr>
										<th>Alamat</th>
										<td><textarea class="form-control" name="alamat" required="required"></textarea></td>
									</tr>
									<tr>
										<th width="20%">Agama</th>
										<td>
											<select name="agama" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="Islam">Islam</option>
												<option value="Katolik">Katolik</option>
												<option value="Protestan">Protestan</option>
												<option value="Kong Hu Cu">Kong Hu Cu</option>
												<option value="Hindu">Hindu</option>
												<option value="Budha">Budha</option>
											</select>
										</td>
									</tr>	
									<tr>
										<th width="20%">No. HP</th>
										<td><input type="number" class="form-control" name="hp" required="required" autocomplete="off"></td>
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

<script type="text/javascript">	
	$(".form-nik").keyup(function(){
		var jumlah = $(".form-nik").val();
		
		if(jumlah.length > 16){
			alert("Nomor NIK tidak boleh lebih dari 16 angka");
			$(".form-nik").val("");
		}
	});
</script>

<?php include 'footer.php'; ?>