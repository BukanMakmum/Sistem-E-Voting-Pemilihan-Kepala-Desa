<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA CALON GEUCHIK</h4>						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- table geuchik -->							
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th width="5%">No.Urut</th>		
										<th>Nama Lengkap</th>												
										<th>Jenis Kelamin</th>			
										<th>Agama</th>													
										<th width="1%">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// nomor urut di awali dari nomor 1
									$no = 1; 
									// query untuk mengambil data geuchik dari table geuchik
									$data = mysqli_query($config,"select * from geuchik");
									// menampilkan data geuchik		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['geuchik_nomor'] ?></td>
											<td><?php echo $d['geuchik_nama'] ?></td>																				
											<td><?php echo $d['geuchik_jk'] ?></td>									
											<td><?php echo $d['geuchik_agama'] ?></td>																				
											<td>		
												<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="geuchik_detail.php?id=<?php echo $d['geuchik_id'];?>"><i class="icon-search4"></i></a>																								
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