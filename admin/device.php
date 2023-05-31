<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">PENGELOLAAN DEVICE</h4>
						<div class="heading-elements">
							<a href="device_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Device Berasil.</div>";
								}
								elseif($_GET['pesan']=="okee"){
									echo "<div class='alert alert-success'>Device Berasil di Hapus.</div>";
								}
							}
							?>

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
										<th width="8%">Opsi</th>
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
											<td><code><?php echo $d['vkey']?></code></td>			
											<td>																					
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['device_name']; ?>" id="device_hapus.php?id=<?php echo $d['sn'];?>"><i class="icon-trash-alt"></i></a>
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
<script type="text/javascript">
	$('body').on('click','.btn-hapus',function(){
		var nama = $(this).attr('nama');
		var url = $(this).attr('id');
		if(confirm("Apakah anda yakin ingin menghapus device "+nama+"??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>