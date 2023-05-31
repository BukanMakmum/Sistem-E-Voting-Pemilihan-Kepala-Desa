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
						<h4 class="panel-title">EDIT DATA PEMILIH</h4>
						<div class="heading-elements">
							<a href="pemilih.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
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
							<form action="pemilih_update.php" method="post" enctype="multipart/form-data">
								<?php
								// menangkap data id pemilih yang akan di edit
								$id = $_GET['id'];

								// query untuk mengambil data pemilih yang ber id seperti yg di dapat di variabel id di atas
								$data = mysqli_query($config,"select * from pemilih where pemilih_id='$id'");	

								// menampilkan data pemilih	
								while($d=mysqli_fetch_array($data)){
									?>									
									<table class="table table-bordered table-striped">
										<tr>
											<th width="20%">Username</th>
											<td>
												<input type="hidden" value="<?php echo $d['pemilih_id']; ?>" name="id">
												<input type="text" class="form-control" name="username" required="required" autocomplete="off" value="<?php echo $d['pemilih_username']; ?>">
											</td>
										</tr>
										<tr>
											<th width="20%">Nomor KK</th>
											<td><input type="number" maxlength="16" class="form-control" name="kk" required="required" autocomplete="off" value="<?php echo $d['pemilih_kk']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">NIK</th>
											<td><input type="number" maxlength="16" class="form-control" name="nik" required="required" autocomplete="off" value="<?php echo $d['pemilih_nik']; ?>"></td>
										</tr>										
										<tr>
											<th width="20%">Nama Lengkap</th>
											<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off" value="<?php echo $d['pemilih_nama']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Tempat Lahir</th>
											<td><input type="text" class="form-control" name="tempat_lahir" required="required" autocomplete="off" value="<?php echo $d['pemilih_tempat_lahir']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Tanggal Lahir</th>
											<td><input type="date" class="form-control" name="tanggal_lahir" required="required" autocomplete="off" value="<?php echo $d['pemilih_tgl_lahir']; ?>"></td>
										</tr>											
										<tr>
											<th width="20%">Jenis Kelamin</th>
											<td>
												<select name="jk" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pemilih_jk']=="Laki-laki"){echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
													<option <?php if($d['pemilih_jk']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
												</select>
											</td>
										</tr>									
										<tr>
											<th>Alamat</th>
											<td>
												<select name="alamat" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pemilih_alamat']=="Dusun Tengah"){echo "selected='selected'";} ?> value="Dusun Tengah">Dusun Tengah</option>
													<option <?php if($d['pemilih_alamat']=="Dusun Cot Hagu"){echo "selected='selected'";} ?> value="Dusun Cot Hagu">Dusun Cot Hagu</option>
													<option <?php if($d['pemilih_alamat']=="Dusun Baroh"){echo "selected='selected'";} ?> value="Dusun Baroh">Dusun Baroh</option>												
												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">Agama</th>
											<td>
												<select name="agama" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pemilih_agama']=="Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
													<option <?php if($d['pemilih_agama']=="Katolik"){echo "selected='selected'";} ?> value="Katolik">Katolik</option>
													<option <?php if($d['pemilih_agama']=="Protestan"){echo "selected='selected'";} ?> value="Protestan">Protestan</option>
													<option <?php if($d['pemilih_agama']=="Kong Hu Cu"){echo "selected='selected'";} ?> value="Kong Hu Cu">Kong Hu Cu</option>
													<option <?php if($d['pemilih_agama']=="Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
													<option <?php if($d['pemilih_agama']=="Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
												</select>
											</td>
										</tr>	
										<tr>
											<th width="20%">Status Kawin</th>
											<td>
												<select name="status_kawin" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pemilih_status_kawin']=="Belum Kawin"){echo "selected='selected'";} ?> value="Belum Kawin">Belum Kawin</option>
													<option <?php if($d['pemilih_status_kawin']=="Kawin"){echo "selected='selected'";} ?> value="Kawin">Kawin</option>												
													<option <?php if($d['pemilih_status_kawin']=="Cerai Hidup"){echo "selected='selected'";} ?> value="Cerai Hidup">Cerai Hidup</option>												
													<option <?php if($d['pemilih_status_kawin']=="Cerai Mati"){echo "selected='selected'";} ?> value="Cerai Mati">Cerai Mati</option>		

												</select>
											</td>
										</tr>	
										<tr>
											<th width="20%">Pekerjaan</th>
											<td>
												<select name="pekerjaan" class="form-control" required="required">
													<option value="">-Pilih</option>																								
													<option <?php if($d['pemilih_pekerjaan']=="Petani/Pekebun"){echo "selected='selected'";} ?> value="Petani/Pekebun">Petani/Pekebun</option>
													<option <?php if($d['pemilih_pekerjaan']=="Pelajar/Mahasiswa"){echo "selected='selected'";} ?> value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
													<option <?php if($d['pemilih_pekerjaan']=="IRT"){echo "selected='selected'";} ?> value="IRT">IRT</option>
													<option <?php if($d['pemilih_pekerjaan']=="Wiraswasta"){echo "selected='selected'";} ?> value="Wiraswasta">Wiraswasta</option>
													<option <?php if($d['pemilih_pekerjaan']=="PNS"){echo "selected='selected'";} ?> value="PNS">PNS</option>
													<option <?php if($d['pemilih_pekerjaan']=="Karyawan BUMN"){echo "selected='selected'";} ?> value="Karyawan BUMN">Karyawan BUMN</option>
													<option <?php if($d['pemilih_pekerjaan']=="Karyawan Swasta"){echo "selected='selected'";} ?> value="Karyawan Swasta">Karyawan Swasta</option>
													<option <?php if($d['pemilih_pekerjaan']=="Aparatur Desa"){echo "selected='selected'";} ?> value="Aparatur Desa">Aparatur Desa</option>
													<option <?php if($d['pemilih_pekerjaan']=="Imam Mesjid"){echo "selected='selected'";} ?> value="Imam Mesjid">Imam Mesjid</option>
													<option <?php if($d['pemilih_pekerjaan']=="Imam Desa"){echo "selected='selected'";} ?> value="Imam Desa">Imam Desa</option>
													<option <?php if($d['pemilih_pekerjaan']=="Mukim"){echo "selected='selected'";} ?> value="Mukim">Mukim</option>
													<option <?php if($d['pemilih_pekerjaan']=="TNI/POLRI"){echo "selected='selected'";} ?> value="TNI/POLRI">TNI/POLRI</option>		


												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">Kategori Pemilih</th>
											<td>
												<select name="kategori" class="form-control" required="required">
													<option value="">-Pilih</option>
													<option <?php if($d['pemilih_kategori']=="DPT"){echo "selected='selected'";} ?> value="DPT">DPT</option>
													<option <?php if($d['pemilih_kategori']=="DPTb"){echo "selected='selected'";} ?> value="DPTb">DPTb</option>												
												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">Foto</th>
											<td>
												<input type="file" name="foto">
												<small><i>Kosongkan jika tidak ingin mengubah foto</i></small>
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