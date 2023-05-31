<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PANITIA</h4>
						<div class="heading-elements">
							<a href="panitia_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Panitia Berasil.</div>";
								}
								elseif($_GET['pesan']=="okee"){
									echo "<div class='alert alert-success'>Edit Panitia Berasil.</div>";
								}
								elseif($_GET['pesan']=="hapus"){
									echo "<div class='alert alert-success'>Panitia Berasil di Hapus.</div>";
								}
							}
							?>
							<!-- table panitia -->							
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th width="10%">NIK</th>		
										<th>Nama Lengkap</th>			
										<th>Jenis Kelamin</th>		
										<th>Agama</th>		
										<th>Alamat</th>			
										<th>Jabatan</th>		
										<th>Status Login</th>		
										<th width="15%">Opsi</th>
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
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="panitia_edit.php?id=<?php echo $d['panitia_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['panitia_nama']; ?>" id="panitia_hapus.php?id=<?php echo $d['panitia_id'];?>"><i class="icon-trash-alt"></i></a>
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
		if(confirm("Apakah anda yakin ingin menghapus "+nama+" sebagai Panitia??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>