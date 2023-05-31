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
						<h4 class="panel-title">TAMBAH CALON GEUCHIK BARU</h4>
						<div class="heading-elements">
							<a href="geuchik.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="geuchik_add_act.php" method="post" enctype="multipart/form-data">

								<?php 
								if(isset($_GET['alert'])){
									if($_GET['alert']=="nik_sama"){
										echo "<div class='alert alert-danger'><b>NIK TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
									}
									elseif($_GET['alert']=="gagal"){
										echo "<div class='alert alert-danger'><b>GAMBAR GAGAL DI UPLOAD</b>. perhatikan format file.</div>";
									}
									elseif($_GET['alert']=="nourut"){
										echo "<div class='alert alert-danger'><b>NO. URUT TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
									}
								}

								?>


								<table class="table table-bordered table-striped">									
									<tr>
										<th width="20%">No.Urut</th>
										<td><input type="number" class="form-control" name="nomor" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">NIK</th>
										<td><input type="number" class="form-control form-nik" maxlength="16" name="nik" required="required" autocomplete="off"></td>
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
										<td>
											<textarea name="alamat" class="form-control" required="required"></textarea>
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
										<th>Visi</th>
										<td>
											<textarea name="visi" class="form-control" required="required"></textarea>
										</td>
									</tr>
									<tr>
										<th>Misi</th>
										<td>
											<textarea name="misi" class="form-control" required="required"></textarea>
										</td>
									</tr>
									<tr>
										<th>Tentang</th>
										<td>
											<textarea name="tentang" class="form-control"></textarea>
										</td>
									</tr>
									<tr>
										<th width="20%">Nama Saksi</th>
										<td><input type="text" class="form-control" name="saksi" required="required" autocomplete="off"></td>
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