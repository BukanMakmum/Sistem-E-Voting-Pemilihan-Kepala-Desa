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
						<h4 class="panel-title">EDIT DATA KATEGORI</h4>
						<div class="heading-elements">
							<a href="kategori.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="kategori_update.php" method="post">
								<?php
								// menangkap data id kategori yang akan di edit
								$id = $_GET['id'];

								// query untuk mengambil data kategori yang ber id seperti yg di dapat di variabel id di atas
								$data = mysqli_query($config,"select * from kategori where kategori_id='$id'");	

								// menampilkan data kategori	
								while($d=mysqli_fetch_array($data)){
									?>									
									<table class="table">
										<tr>
											<th width="20%">Nama Kategori</th>
											<td>
												<input type="hidden" value="<?php echo $d['kategori_id']; ?>" name="id">
												<input type="text" class="form-control" name="nama" required="required" autocomplete="off" value="<?php echo $d['kategori_nama']; ?>">
											</td>
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

<?php include 'footer.php'; ?>