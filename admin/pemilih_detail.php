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
						<h4 class="panel-title">DETAIL DATA PEMILIH</h4>
						<div class="heading-elements">
							<a href="pemilih.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">							
							<?php
								// menangkap data id pemilih yang akan di tampilkan
							$id = $_GET['id'];

								// query untuk mengambil data pemilih yang ber id seperti yg di dapat di variabel id di atas
							$data = mysqli_query($config,"select * from pemilih where pemilih_id='$id'");	

								// menampilkan data pemilih	
							while($d=mysqli_fetch_array($data)){
								?>									
								<div class="row">
					            <div class="col-md-3">
					            <td>
											<?php if($d['pemilih_foto']!=""){ ?>
											<img style="width: 260px;height: 270px" class="img-thumbnail"" src="../images/pemilih/<?php echo $d['pemilih_foto']; ?>">
											<?php }else{ ?>
											Belum ada foto.
											<?php } ?>
								</td>
					            </div>
					            <div class="col-md-9">
					              <div>
					                <table class="table table-striped"> 
									<tr>
										<th width="20%">Username</th>
										<td><?php echo $d['pemilih_username']; ?></td>
									</tr>
									<tr>
										<th width="20%">Nomor KK</th>
										<td><?php echo $d['pemilih_kk']; ?></td>
									</tr>
									<tr>
										<th width="20%">NIK</th>
										<td><?php echo $d['pemilih_nik']; ?></td>
									</tr>										
									<tr>
										<th width="20%">Nama Lengkap</th>
										<td><?php echo $d['pemilih_nama']; ?></td>
									</tr>
									<tr>
										<th width="20%">Tempat Lahir</th>
										<td><?php echo $d['pemilih_tempat_lahir']; ?></td>
									</tr>
									<tr>
										<th width="20%">Tanggal Lahir</th>
										<td><?php echo date('d F Y',strtotime($d['pemilih_tgl_lahir'])); ?></td>
									</tr>
									<tr>
										<th width="20%">Umur</th>
										<td><?php echo $d['pemilih_umur']; ?> Tahun</td>
									</tr>	
									<tr>
										<th width="20%">Jenis Kelamin</th>
										<td>
											<?php echo $d['pemilih_jk']; ?>
										</td>
									</tr>									
									<tr>
										<th>Alamat</th>
										<td>
											<?php echo $d['pemilih_alamat']; ?>
										</td>
									</tr>
									<tr>
										<th width="20%">Agama</th>
										<td>
											<?php echo $d['pemilih_agama'];?>												
										</td>
									</tr>	
									<tr>
										<th width="20%">Status Kawin</th>
										<td>
											<?php echo $d['pemilih_status_kawin'];?>
										</td>
									</tr>	
									<tr>
										<th width="20%">Pekerjaan</th>
										<td>
											<?php echo $d['pemilih_pekerjaan'];?>
										</td>
									</tr>
									<tr>
										<th width="20%">Kategori Pemilih</th>
										<td>
											<?php echo $d['pemilih_kategori'];?>
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