<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PENGAWAS</h4>
						<div class="heading-elements">
							<a href="pengawas_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Pengawas Berasil.</div>";
								}
								elseif($_GET['pesan']=="okee"){
									echo "<div class='alert alert-success'>Edit Pengawas Berasil.</div>";
								}
								elseif($_GET['pesan']=="hapus"){
									echo "<div class='alert alert-success'>Pengawas Berasil Hapus.</div>";
								}
							}
							?>

							<!-- tabel pengawas -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th>NIK</th>		
										<th>Nama Lengkap</th>		
										<th>Username</th>		
										<th>Jenis Kelamin</th>		
										<th>Agama</th>		
										<th>Alamat</th>		
										<th>HP</th>		
										<th width="14%">Opsi</th>
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
											<td><?php echo $d['pengawas_username'] ?></td>
											<td><?php echo $d['pengawas_jk'] ?></td>												
											<td><?php echo $d['pengawas_agama'] ?></td>									
											<td><?php echo $d['pengawas_alamat'] ?></td>
											<td><?php echo $d['pengawas_hp'] ?></td>
											<td>	
												<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="pengawas_detail.php?id=<?php echo $d['pengawas_id'];?>"><i class="icon-search4"></i></a>								
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="pengawas_edit.php?id=<?php echo $d['pengawas_id'];?>"><i class="icon-wrench3"></i></a>

												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['pengawas_nama']; ?>" id="pengawas_hapus.php?id=<?php echo $d['pengawas_id'];?>"><i class="icon-trash-alt"></i></a>
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
		if(confirm("Apakah anda yakin ingin menghapus "+nama+" sebagai Pengawas??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>