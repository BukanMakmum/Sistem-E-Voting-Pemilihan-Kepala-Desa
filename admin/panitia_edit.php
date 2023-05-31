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
						<h4 class="panel-title">EDIT DATA PANITIA</h4>
						<div class="heading-elements">
							<a href="panitia.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php
							if(isset($_GET['alert'])){
								if($_GET['alert']=="nik_sama"){
									echo "<div class='alert alert-warning'><b>NIK TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
								}
								if($_GET['alert']=="username_sama"){
									echo "<div class='alert alert-warning'><b>USERNAME TIDAK DAPAT DI SIMPAN</b>. karena sudah pernah di gunakan.</div>";
								}
								if($_GET['alert']=="gagal"){
									echo "<div class='alert alert-warning'><b>GAMBAR GAGAL DI UPLOAD</b>. perhatikan format file.</div>";
								}
							}
							?>
							<form action="panitia_update.php" method="post" enctype="multipart/form-data">
								<?php
								// menangkap id data yang ingin di edit
								$id = $_GET['id'];
								// query untuk mengambil data panitia yang ber id di atas (yang di pilih)
								$data = mysqli_query($config,"select * from panitia where panitia_id='$id'");
										// menampilkan data yang di dapatkan dari query di atas
								while($d=mysqli_fetch_array($data)){
								?>
								<table class="table">
									<tr>
										<th width="20%">Username</th>
										<td>
											<input type="hidden" value="<?php echo $d['panitia_id']; ?>" name="id">
											<input type="text" class="form-control" name="username" required="required" autocomplete="off" value="<?php echo $d['panitia_username']; ?>">
										</td>
									</tr>
									<tr>
										<th width="20%">Password</th>
										<td>
											<input type="password" class="form-control" name="password">
											<small class="text-muted"><i>Kosongkan jika tidak ingin mengubah password panitia.</i></small>
										</td>
									</tr>
									<tr>
										<th width="20%">NIK</th>
										<td><input type="text" class="form-control form-nik" name="nik" required="required" autocomplete="off" value="<?php echo $d['panitia_nik']; ?>"></td>
									</tr>
									<tr>
										<th width="20%">Nama Lengkap</th>
										<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off" value="<?php echo $d['panitia_nama']; ?>"></td>
									</tr>
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
									<td><input type="text" class="form-control" name="tempat_lahir" required="required" autocomplete="off" value="<?php echo $d['panitia_tempat_lahir']; ?>"></td>
								</tr>
								<tr>
									<th width="20%">Tanggal Lahir</th>
									<td><input type="date" class="form-control" name="tanggal_lahir" required="required" autocomplete="off" value="<?php echo $d['panitia_tgl_lahir']; ?>"></td>
								</tr>
								
								<tr>
									<th width="20%">Jenis Kelamin</th>
									<td>
										<select name="jk" class="form-control" required="required">
											<option value="">-Pilih</option>
											<option <?php if($d['panitia_jk']=="Laki-laki"){echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
											<option <?php if($d['panitia_jk']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>Alamat</th>
									<td><textarea class="form-control" name="alamat" required="required"><?php echo $d['panitia_alamat']; ?></textarea></td>
								</tr>
								<tr>
									<th width="20%">Agama</th>
									<td>
										<select name="agama" class="form-control" required="required">
											<option value="">-Pilih</option>
											<option <?php if($d['panitia_agama']=="Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
											<option <?php if($d['panitia_agama']=="Katolik"){echo "selected='selected'";} ?> value="Katolik">Katolik</option>
											<option <?php if($d['panitia_agama']=="Protestan"){echo "selected='selected'";} ?> value="Protestan">Protestan</option>
											<option <?php if($d['panitia_agama']=="Kong Hu Cu"){echo "selected='selected'";} ?> value="Kong Hu Cu">Kong Hu Cu</option>
											<option <?php if($d['panitia_agama']=="Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
											<option <?php if($d['panitia_agama']=="Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
										</select>
									</td>
								</tr>
								<tr>
									<th width="20%">No. HP</th>
									<td><input type="number" class="form-control" name="hp" required="required" value="<?php echo $d['panitia_hp']; ?>" autocomplete="off"></td>
								</tr>
								<tr>
									<th width="20%">Jabatan</th>
									<td>
										<select name="jabatan" class="form-control" required="required">
											<option value="">-Pilih</option>
											<option <?php if($d['panitia_jabatan']=="Ketua"){echo "selected='selected'";} ?> value="Ketua">Ketua</option>
											<option <?php if($d['panitia_jabatan']=="Sekretaris"){echo "selected='selected'";} ?> value="Sekretaris">Sekretaris</option>
											<option <?php if($d['panitia_jabatan']=="Bendahara"){echo "selected='selected'";} ?> value="Bendahara">Bendahara</option>
											<option <?php if($d['panitia_jabatan']=="Anggota"){echo "selected='selected'";} ?> value="Anggota">Anggota</option>
										</select>
									</td>
								</tr>
								<tr>
									<th width="20%">Status Akses Login</th>
									<td>
										<select name="status" class="form-control" required="required">
											<option value="">-Pilih</option>
											<option <?php if($d['panitia_status']=="aktif"){echo "selected='selected'";} ?> value="aktif">aktif</option>
											<option <?php if($d['panitia_status']=="non-aktif"){echo "selected='selected'";} ?> value="non-aktif">non-aktif</option>
										</select>
									</td>
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
</div>
</div>
<?php include 'footer.php'; ?>