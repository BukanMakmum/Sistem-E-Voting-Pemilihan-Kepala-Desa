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
						<h4 class="panel-title">EDIT DATA PENGAWAS</h4>
						<div class="heading-elements">
							<a href="pengawas.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
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
							<form action="pengawas_update.php" method="post" enctype="multipart/form-data">
								<?php
								// menangkap data id pengawas yang akan di edit
								$id = $_GET['id'];

								// query untuk mengambil data pengawas yang ber id seperti yg di dapat di variabel id di atas
								$data = mysqli_query($config,"select * from pengawas where pengawas_id='$id'");	

								// menampilkan data pengawas	
								while($d=mysqli_fetch_array($data)){
									?>									
									<table class="table">
										<tr>
											<th width="20%">Username</th>
											<td>
												<input type="hidden" value="<?php echo $d['pengawas_id']; ?>" name="id">
												<input type="text" class="form-control" name="username" required="required" autocomplete="off" value="<?php echo $d['pengawas_username']; ?>">
											</td>
										</tr>
										<tr>
											<th width="20%">Password</th>
											<td>
												<input type="password" class="form-control" name="password">
												<small class="text-muted"><i>Kosongkan jika tidak ingin mengubah password pengawas.</i></small>
											</td>
										</tr>
										<tr>
											<th width="20%">NIK</th>
											<td><input type="text" class="form-control" name="nik" required="required" autocomplete="off" value="<?php echo $d['pengawas_nik']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Nama Lengkap</th>
											<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off" value="<?php echo $d['pengawas_nama']; ?>"></td>
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
											<td><input type="text" class="form-control" name="tempat_lahir" required="required" autocomplete="off" value="<?php echo $d['pengawas_tempat_lahir']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Tanggal Lahir</th>
											<td><input type="date" class="form-control" name="tanggal_lahir" required="required" autocomplete="off" value="<?php echo $d['pengawas_tgl_lahir']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Jenis Kelamin</th>
											<td>
												<select name="jk" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pengawas_jk']=="Laki-laki"){echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
													<option <?php if($d['pengawas_jk']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
												</select>
											</td>
										</tr>									
										<tr>
											<th>Alamat</th>
											<td><textarea class="form-control" name="alamat" required="required"><?php echo $d['pengawas_alamat']; ?></textarea></td>
										</tr>
										<tr>
											<th width="20%">Agama</th>
											<td>
												<select name="agama" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pengawas_agama']=="Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
													<option <?php if($d['pengawas_agama']=="Katolik"){echo "selected='selected'";} ?> value="Katolik">Katolik</option>
													<option <?php if($d['pengawas_agama']=="Protestan"){echo "selected='selected'";} ?> value="Protestan">Protestan</option>
													<option <?php if($d['pengawas_agama']=="Kong Hu Cu"){echo "selected='selected'";} ?> value="Kong Hu Cu">Kong Hu Cu</option>
													<option <?php if($d['pengawas_agama']=="Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
													<option <?php if($d['pengawas_agama']=="Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">No. HP</th>
											<td><input type="number" class="form-control" name="hp" required="required" value="<?php echo $d['pengawas_hp']; ?>" autocomplete="off"></td>
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