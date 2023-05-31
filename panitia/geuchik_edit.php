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
						<h4 class="panel-title">EDIT DATA CALON GEUCHIK</h4>
						<div class="heading-elements">
							<a href="geuchik.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<?php 
							if(isset($_GET['alert'])){
								if($_GET['alert']=="nik_sama"){
									echo "<div class='alert alert-warning'><b>NIK TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
								}

								if($_GET['alert']=="nourut_sama"){
									echo "<div class='alert alert-warning'><b>NO. URUT TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
								}

								if($_GET['alert']=="gagal"){
									echo "<div class='alert alert-warning'><b>GAMBAR GAGAL DI UPLOAD</b>. perhatikan format file.</div>";
								}
							}

							?>
						<div class="table-responsive">
							
							<form action="geuchik_update.php" method="post" enctype="multipart/form-data">
								<?php
								// menangkap id data yang ingin di edit
								$id = $_GET['id'];

								// query untuk mengambil data geuchik yang ber id di atas (yang di pilih)
								$data = mysqli_query($config,"select * from geuchik where geuchik_id='$id'");

								// menampilkan data yang di dapatkan dari query di atas		
								while($d=mysqli_fetch_array($data)){
									?>									

									<?php 
									if(isset($_GET['alert'])){
										if($_GET['alert']=="gagal"){
											echo "<div class='alert alert-danger'>Data gagal di simpan. perhatikan data gambar sudah benar.</div>";
										}
									}
									?>


									<table class="table table-bordered table-striped">									
										<tr>
											<th width="20%">No.Urut</th>
											<td>
												<input type="hidden" name="id" value="<?php echo $d['geuchik_id']; ?>">
												<input type="number" class="form-control" name="nomor" required="required" autocomplete="off" value="<?php echo $d['geuchik_nomor']; ?>">
											</td>
										</tr>
										<tr>
											<th width="20%">NIK</th>
											<td><input type="number" class="form-control" name="nik" required="required" autocomplete="off" value="<?php echo $d['geuchik_nik']; ?>"></td>
										</tr>									
										<tr>
											<th width="20%">Nama Lengkap</th>
											<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off" value="<?php echo $d['geuchik_nama']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Foto</th>
											<td>
												<input type="file" name="foto" accept="image/*">
												<small class="text-muted"><i>Kosongkan jika tidak ingin mengubah foto</i></small>
											</td>
										</tr>
										<tr>
											<th width="20%">Tempat Lahir</th>
											<td><input type="text" class="form-control" name="tempat_lahir" required="required" autocomplete="off" value="<?php echo $d['geuchik_tempat_lahir']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Tanggal Lahir</th>
											<td><input type="date" class="form-control" name="tanggal_lahir" required="required" autocomplete="off" value="<?php echo $d['geuchik_tgl_lahir']; ?>"></td>
										</tr>									
										<tr>
											<th width="20%">Jenis Kelamin</th>
											<td>
												<select name="jk" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['geuchik_jk']=="Laki-laki"){echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
													<option <?php if($d['geuchik_jk']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
												</select>
											</td>
										</tr>									
										<tr>
											<th>Alamat</th>
											<td>
												<textarea name="alamat" class="form-control" required="required"><?php echo $d['geuchik_alamat']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th width="20%">Agama</th>
											<td>
												<select name="agama" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['geuchik_agama']=="Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
													<option <?php if($d['geuchik_agama']=="Katolik"){echo "selected='selected'";} ?> value="Katolik">Katolik</option>
													<option <?php if($d['geuchik_agama']=="Protestan"){echo "selected='selected'";} ?> value="Protestan">Protestan</option>
													<option <?php if($d['geuchik_agama']=="Kong Hu Cu"){echo "selected='selected'";} ?> value="Kong Hu Cu">Kong Hu Cu</option>
													<option <?php if($d['geuchik_agama']=="Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
													<option <?php if($d['geuchik_agama']=="Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
												</select>
											</td>
										</tr>	
										<tr>
											<th>Visi</th>
											<td>
												<textarea name="visi" class="form-control" required="required"><?php echo $d['geuchik_visi']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th>Misi</th>
											<td>
												<textarea name="misi" class="form-control" required="required"><?php echo $d['geuchik_misi']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th>Tentang</th>
											<td>
												<textarea name="tentang" class="form-control"><?php echo $d['geuchik_tentang']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th width="20%">Nama Saksi</th>
											<td><input type="text" class="form-control" name="saksi" required="required" autocomplete="off" value="<?php echo $d['geuchik_saksi']; ?>"></td>
										</tr>
										<tr>
											<th></th>
											<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
										</tr>		
									</table>

									<?php 
								} 
								?>
							</form>
						</div>					
					</div>					
				</div>	


			</div>

		</div>		

		<div class="footer text-muted">
			<!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a> -->
		</div>

	</div>
</div>

<?php include 'footer.php'; ?>