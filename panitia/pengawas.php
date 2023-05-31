<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PENGAWAS</h4>
						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- tabel pengawas -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th width="10%">NIK</th>		
										<th>Nama Lengkap</th>		
										<th>Jenis Kelamin</th>		
										<th>Agama</th>		
										<th>Alamat</th>		
										<th>HP</th>
										<th width="4%">Opsi</th>		
										
									</tr>
								</thead>
								<tbody>
									<?php
									// no urut di mulai dari 1
									$no = 1; 

									// query untuk mengambil data pengawas
									$data = mysqli_query($config,"select * from pengawas");	

									// menampilkan data pengawas	
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['pengawas_nik'] ?></td>
											<td><?php echo $d['pengawas_nama'] ?></td>
											<td><?php echo $d['pengawas_jk'] ?></td>																			
											<td><?php echo $d['pengawas_agama'] ?></td>									
											<td><?php echo $d['pengawas_alamat'] ?></td>
											<td><?php echo $d['pengawas_hp'] ?></td>
											<td>		
												<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="pengawas_detail.php?id=<?php echo $d['pengawas_id'];?>"><i class="icon-search4"></i></a>	
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