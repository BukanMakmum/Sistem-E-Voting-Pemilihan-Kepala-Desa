<?php include 'header.php'; ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA POSTING</h4>
						<div class="heading-elements">
							<a href="posting_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
								<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Penambahan Posting Berasil.</div>";
								}
								elseif($_GET['pesan']=="okee"){
									echo "<div class='alert alert-success'>Edit Posting Berasil.</div>";
								}
								elseif($_GET['pesan']=="hapus"){
									echo "<div class='alert alert-success'>Posting Berasil di Hapus.</div>";
								}
							}
							?>
							<!-- table posting -->							
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%" class="text-center">No</th>									
										<th width="20%" class="text-center">Gambar</th>																							
										<th class="text-center">Judul</th>		
										<th width="14%" class="text-center">Tanggal Posting</th>												
										<th class="text-center">Kategori</th>		
										<th width="13%" class="text-center">Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// nomor urut di awali dari nomor 1
									$no = 1; 
									// query untuk mengambil data posting dari table posting
									$data = mysqli_query($config,"select * from posting,kategori where posting_kategori=kategori_id");
									// menampilkan data posting		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><img style="width: 100%" src="../images/posting/<?php echo $d['posting_gambar']; ?>" class="img-responsive"></td>
											<td><?php echo $d['posting_judul']; ?></td>
											<td><?php echo date('d-m-Y',strtotime($d['posting_tanggal'])); ?></td>																																																																					
											<td><?php echo $d['kategori_nama']; ?></td>
											<td>														
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="posting_edit.php?id=<?php echo $d['posting_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['posting_judul']; ?>" id="posting_hapus.php?id=<?php echo $d['posting_id'];?>"><i class="icon-trash-alt"></i></a>
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
		if(confirm("Apakah anda yakin ingin menghapus posting "+nama+"??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>

<?php include 'footer.php'; ?>