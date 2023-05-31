<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA KATEGORI POSTING</h4>
						<div class="heading-elements">
							<a href="kategori_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Katogori Berasil.</div>";
								}
								elseif($_GET['pesan']=="hapus"){
									echo "<div class='alert alert-success'>Katagori Berasil di Hapus.</div>";
								}
							}
							?>
							<!-- tabel kategori -->
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%" class="text-center">No</th>									
										<th class="text-center">Nama Kategori</th>													
										<th width="13%" class="text-center">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// no urut di mulai dari 1
									$no = 1; 

									// query untuk mengambil data kategori
									$data = mysqli_query($config,"select * from kategori");	

									// menampilkan data kategori	
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>											
											<td><?php echo $d['kategori_nama'] ?></td>																				
											<td>									
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="kategori_edit.php?id=<?php echo $d['kategori_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['kategori_nama']; ?>" id="kategori_hapus.php?id=<?php echo $d['kategori_id'];?>"><i class="icon-trash-alt"></i></a>
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
		if(confirm("Apakah anda yakin ingin menghapus katagori "+nama+"??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>