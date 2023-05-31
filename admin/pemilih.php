<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PEMILIH</h4>						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- tabel pemilih -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>NIK</th>		
										<th>Nama Lengkap</th>		
										<th>Username</th>		
										<th width="1%">Jenis Kelamin</th>		
										<th>Agama</th>													
										<th>Pekerjaan</th>		
										<th>Kategori</th>		
										<th width="1%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// no urut di mulai dari 1
									$no = 1; 

									// query untuk mengambil data pemilih
									$data = mysqli_query($config,"select * from pemilih");	

									// menampilkan data pemilih	
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['pemilih_nik'] ?></td>
											<td><?php echo $d['pemilih_nama'] ?></td>									
											<td><?php echo $d['pemilih_username'] ?></td>
											<td><?php echo $d['pemilih_jk'] ?></td>									
											<td><?php echo $d['pemilih_agama'] ?></td>									
											<td><?php echo $d['pemilih_pekerjaan'] ?></td>										
											<td><?php echo $d['pemilih_kategori'] ?></td>										
											<td>									
												<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="pemilih_detail.php?id=<?php echo $d['pemilih_id'];?>"><i class="icon-search4"></i></a>								
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>					
					</div>					
				</div>	
			</div>
		</div>				

	</div>
</div>

<?php include 'footer.php'; ?>