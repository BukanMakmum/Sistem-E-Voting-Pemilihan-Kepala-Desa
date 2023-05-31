<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA CALON GEUCHIK</h4>
						<div class="heading-elements">
							<a href="geuchik_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Calon Geuchik Berasil.</div>";
								}
								elseif($_GET['pesan']=="okee"){
									echo "<div class='alert alert-success'>Edit Calon Geuchik Berasil.</div>";
								}
								elseif($_GET['pesan']=="hapus"){
									echo "<div class='alert alert-success'>Calon Geuchik Berasil di Hapus.</div>";
								}
							}
							?>
							<!-- table geuchik -->							
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>									
										<th width="5%">No.Urut</th>		
										<th>Nama Lengkap</th>												
										<th>Jenis Kelamin</th>			
										<th>Agama</th>													
										<th width="15%">Opsi</th>
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
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="geuchik_edit.php?id=<?php echo $d['geuchik_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['geuchik_nama']; ?>" id="geuchik_hapus.php?id=<?php echo $d['geuchik_id'];?>"><i class="icon-trash-alt"></i></a>
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
		if(confirm("Apakah anda yakin ingin menghapus "+nama+" sebagai Calon Geuchik??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>