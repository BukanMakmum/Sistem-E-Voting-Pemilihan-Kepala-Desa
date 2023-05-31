<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA LOG</h4>						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- tabel log -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th class="text-center" width="1%">No</th>									
										<th class="text-center">Waktu Login</th>
										<th class="text-center" width="30%">Nama Pemilih</th>		
										<th class="text-center" width="40%">Data</th>																																		
									</tr>
								</thead>
								<tbody>
									<?php
									// no urut di mulai dari 1
									$no = 1; 

									// query untuk mengambil data log
									$data = mysqli_query($config,"select * from demo_log,pemilih where demo_log.user_name=pemilih.pemilih_id order by log_time desc");	

									// menampilkan data log	
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td class="center"><?php echo $no++; ?></td>
											<td class="text-right"><?php echo date('d-m-Y    H:i:s',strtotime ($d['log_time']));?> WIB</td>
											<td ><?php echo $d['pemilih_nama'] ?></td>									
											<td class="text-right"><code><?php echo $d['data'] ?></code></td>																															
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