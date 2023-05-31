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
						<h4 class="panel-title" >BIODATA PANITIA</h4>
						<div class="heading-elements">
							<!-- tombol kembali -->
							<a href="index.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">	     

							<?php
							
							$idp = $_SESSION['id'];

								// query untuk mengambil data panitia yang ber id di atas (yang di pilih)
							$data = mysqli_query($config,"select * from panitia where panitia_id='$idp'");

								// menampilkan data yang di dapatkan dari query di atas		
							while($d=mysqli_fetch_array($data)){
								?>									
								<div class="row">
									<div class="col-md-3">
										<td>
											<img style="width: 260px;height: 270px" class="img-thumbnail"" src="../images/panitia/<?php echo $d['panitia_gambar']; ?>">
											
										</td>
									</div>
									<div class="col-md-9">
										<div>
											<table class="table table-striped">
												<tr>
													<th width="20%">Username</th>
													<td><?php echo $d['panitia_username']; ?></td>
												</tr>
												<tr>
													<th width="20%">NIK</th>
													<td><?php echo $d['panitia_nik']; ?></td>
												</tr>										
												<tr>
													<th width="20%">Nama Lengkap</th>
													<td><?php echo $d['panitia_nama']; ?></td>
												</tr>
												<tr>
													<th width="20%">Tempat Lahir</th>
													<td><?php echo $d['panitia_tempat_lahir']; ?></td>
												</tr>
												<tr>
													<th width="20%">Tanggal Lahir</th>
													<td><?php echo date('d F Y',strtotime($d['panitia_tgl_lahir'])); ?></td>
												</tr>
												<tr>
													<th width="20%">Umur</th>
													<td><?php echo date('Y') - date('Y',strtotime($d['panitia_tgl_lahir'])); ?> Tahun</td>
												</tr> 	
												<tr>
													<th width="20%">Jenis Kelamin</th>
													<td>											
														<?php echo $d['panitia_jk']; ?>
													</td>
												</tr>									
												<tr>
													<th>Alamat</th>
													<td>
														<?php echo $d['panitia_alamat']; ?>
													</td>
												</tr>
												<tr>
													<th width="20%">Agama</th>
													<td>
														<?php echo $d['panitia_agama'];?>												
													</td>
												</tr>	
												<tr>
													<th width="20%">Jabatan</th>
													<td>
														<?php echo $d['panitia_jabatan'];?>
													</td>
												</tr>	
												<tr>
													<th width="20%">No. HP</th>
													<td>
														<?php echo $d['panitia_hp'];?>
													</td>
												</tr>
												<tr>
													<th width="20%">Status Akses</th>
													<td>
														<?php echo $d['panitia_status'];?>
													</td>
												</tr>

											</table>

											<?php 
										} 
										?>							
									</div>					
								</div>					
							</div>	

						</div>
					</div>		
				</div>
			</div>

			<?php include 'footer.php'; ?>