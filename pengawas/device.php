<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">PENGELOLAAN DEVICE</h4>						
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- tabel device -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th width="13%">Nama Device</th>		
										<th>Serial Number</th>		
										<th>Verification Code</th>		
										<th>Activation Code </th>		
										<th>Vkey</th>																						
									</tr>
								</thead>
								<tbody>
									<?php
									// no urut di mulai dari 1
									$no = 1; 

									// query untuk mengambil data device
									$data = mysqli_query($config,"select * from demo_device");	

									// menampilkan data device	
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['device_name']; ?></td>
											<td><code><?php echo $d['sn'] ?></code></td>									
											<td><code><?php echo $d['vc'] ?></code></td>
											<td><code><?php echo $d['ac'] ?></code></td>
											<td><code><?php echo substr ($d['vkey'], 0, 4) ?>.....................</code></td>																						
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