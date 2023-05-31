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
						<h4 class="panel-title">TAMBAH PEMILIH BARU</h4>
						<div class="heading-elements">
							<a href="pemilih.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert']=="nik_sama"){
								echo "<div class='alert alert-danger'>Data gagal di simpan karena <b>NIK</b> yang di isi sudah ada.</div>";
							}else if($_GET['alert']=="nik_username"){
								echo "<div class='alert alert-danger'>Data gagal di simpan karena <b>Username</b> yang di isi sudah ada.</div>";
							}
							elseif($_GET['alert']=="gagal1"){
								echo "<div class='alert alert-danger'>Format Gambar Tidak didukung.</div>";
							}
							elseif($_GET['alert']=="gagal"){
								echo "<div class='alert alert-danger'>Ada isian yang kosong.</div>";
							}
						}

						?>

						<div class="table-responsive">
							<form action="pemilih_add_act.php" method="post" enctype="multipart/form-data">
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Username</th>
										<td><input type="text" class="form-control" name="username" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Nomor KK</th>
										<td><input type="number" maxlength="16" class="form-control form-kk" name="kk" required="required" autocomplete="off"></td>
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
										<td>
											<select name="alamat" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="Dusun Tengah">Dusun Tengah</option>
												<option value="Dusun Cot Hagu">Dusun Cot Hagu</option>
												<option value="Dusun Baroh">Dusun Baroh</option>												
											</select>
										</td>
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
										<th width="20%">Status Kawin</th>
										<td>
											<select name="status_kawin" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="Belum Kawin">Belum Kawin</option>
												<option value="Kawin">Kawin</option>												
												<option value="Cerai Hidup">Cerai Hidup</option>												
												<option value="Cerai Mati">Cerai Mati</option>												
											</select>
										</td>
									</tr>	
									<tr>
										<th width="20%">Pekerjaan</th>
										<td>
											<select name="pekerjaan" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="Petani/Pekebun">Petani/Pekebun</option>
												<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
												<option value="IRT">IRT</option>
												<option value="Wiraswasta">Wiraswasta</option>
												<option value="PNS">PNS</option>
												<option value="Karyawan BUMN">Karyawan BUMN</option>
												<option value="Karyawan Swasta">Karyawan Swasta</option>
												<option value="Aparatur Desa">Aparatur Desa</option>
												<option value="Imam Mesjid">Imam Mesjid</option>
												<option value="Imam Desa">Imam Desa</option>
												<option value="Mukim">Mukim</option>
												<option value="TNI/POLRI">TNI/POLRI</option>												
											</select>
										</td>
									</tr>
									<tr>
										<th width="20%">Kategori Pemilih</th>
										<td>
											<select name="kategori" class="form-control" required="required">
												<option value="">-Pilih</option>
												<option value="DPT">DPT</option>
												<option value="DPTb">DPTb</option>												
											</select>
										</td>
									</tr>
									<tr>
										<th width="20%">Foto</th>
										<td><input type="file" name="foto" required="required"></td>
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
	$(".form-kk").keyup(function(){
		var jumlah = $(".form-kk").val();
		
		if(jumlah.length > 16){
			alert("Nomor KK tidak boleh lebih dari 16 angka");
			$(".form-kk").val("");
		}
	});

	$(".form-nik").keyup(function(){
		var jumlah = $(".form-nik").val();
		
		if(jumlah.length > 16){
			alert("Nomor NIK tidak boleh lebih dari 16 angka");
			$(".form-nik").val("");
		}
	});
</script>
<?php include 'footer.php'; ?>