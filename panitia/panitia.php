<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PANITIA</h4>						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- table panitia -->							
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>NIK</th>		
										<th>Nama Lengkap</th>			
										<th>Jenis Kelamin</th>		
										<th>Agama</th>		
										<th>Alamat</th>													
										<th>Jabatan</th>												
										<th>Status Login</th>
										<th width="1%">Opsi</th>												
									</tr>
								</thead>
								<tbody>
									<?php
									// nomor urut di awali dari nomor 1
									$no = 1; 
									// query untuk mengambil data panitia dari table panitia
									$data = mysqli_query($config,"select * from panitia");
									// menampilkan data panitia		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['panitia_nik'] ?></td>
											<td><?php echo $d['panitia_nama'] ?></td>
											<td><?php echo $d['panitia_jk'] ?></td>								
											<td><?php echo $d['panitia_agama'] ?></td>									
											<td><?php echo $d['panitia_alamat'] ?></td>									
											<td><?php echo $d['panitia_jabatan'] ?></td>											
											<td><?php echo $d['panitia_status'] ?></td>	
											<td>		
												<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="panitia_detail.php?id=<?php echo $d['panitia_id'];?>"><i class="icon-search4"></i></a>																								
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