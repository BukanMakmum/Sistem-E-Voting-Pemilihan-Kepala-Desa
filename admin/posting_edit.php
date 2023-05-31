<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">TAMBAH POSTING BARU</h4>
						<div class="heading-elements">
							<a href="posting.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="posting_update.php" method="post" enctype="multipart/form-data">

								<?php 
								if(isset($_GET['alert'])){
									if($_GET['alert']=="gagal"){
										echo "<div class='alert alert-danger'>Data gagal di simpan. perhatikan data gambar sudah benar.</div>";
									}
								}
								?>


								<?php 
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from posting where posting_id='$id'");
								while($d = mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered table-striped">																		
										<tr>
											<th width="20%">Judul</th>
											<td>
												<input type="hidden" name="id" value="<?php echo $d['posting_id']; ?>">
												<input type="text" class="form-control" name="judul" required="required" autocomplete="off" value="<?php echo $d['posting_judul']; ?>">
											</td>
										</tr>									
										<tr>
											<th width="20%">Tanggal</th>
											<td><input type="date" class="form-control" name="tanggal" required="required" autocomplete="off" value="<?php echo $d['posting_tanggal']; ?>"></td>
										</tr>
										<tr>
											<th width="20%">Kategori</th>
											<td>
												<select name="kategori" class="form-control" required="required">
													<option value="">Pilih</option>

													<?php 
													$kat = mysqli_query($config,"select * from kategori");
													while($k=mysqli_fetch_array($kat)){
														?>
														<option <?php if($d['posting_kategori']==$k['kategori_id']){echo "selected='selected'";} ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
														<?php 
													}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<th width="20%">Gambar Sampul</th>
											<td>
												<input type="file" name="gambar" accept="image/*">
												<small>Kosongkan jika tidak ingin mengganti gambar</small>
											</td>
										</tr>
										<tr>
											<th width="20%">Deskripsi</th>
											<td><textarea name="deskripsi" id="summernote" class="form-control" required="required"><?php echo $d['posting_deskripsi']; ?></textarea></td>
										</tr>									
										<tr>
											<th></th>
											<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
										</tr>		
									</table>
									<?php 
								}
								?>

							</form>
						</div>					
					</div>					
				</div>	


			</div>

		</div>		


	</div>
</div>
<script type="text/javascript">
	$('#summernote').summernote({
		height: 200	
	});
</script>
<?php include 'footer.php'; ?>