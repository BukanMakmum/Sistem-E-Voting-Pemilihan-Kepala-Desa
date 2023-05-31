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
						<h4 class="panel-title">EDIT AGENDA KEGIATAN</h4>
						<div class="heading-elements">
							<a href="agenda.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="agenda_update.php" method="post" enctype="multipart/form-data">
								<?php
								// menangkap id data yang ingin di edit
								$id = $_GET['id'];
								// query untuk mengambil data agenda  yang ber id di atas (yang di pilih)
								$data = mysqli_query($config,"select * from agenda where agenda_id='$id'");
										// menampilkan data yang di dapatkan dari query di atas
								while($d=mysqli_fetch_array($data)){
								?>
								<table class="table">
									<tr>
										<th width="20%">Jadwal Mulai</th>
										<td>
											<input type="text" class="jadwal form-control" name="mulai" required="required" autocomplete="off" value="<?php echo $d['agenda_jdw_mulai']; ?>">
										</td>
									</tr>
									<tr>
										<th width="20%">Jadwal Selesai</th>
										<td>
											<input type="text" class="jadwal form-control" name="berakhir" required="required" autocomplete="off" value="<?php echo $d['agenda_jdw_selesai']; ?>">
										</td>
									</tr>
									<tr>
										<th width="20%">Nama Kegiatan</th>
										<td>
										<input type="text" class="form-control" name="nama_kegiatan" required="required" autocomplete="off" value="<?php echo $d['agenda_ket']; ?>"></td>
									</tr>
									<tr>
										<th width="20%">Tempat</th>
										<td>
										<input type="text" class="form-control" name="tempat" required="required" autocomplete="off" value="<?php echo $d['agenda_tmp']; ?>"></td>
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
	jQuery('.jadwal').datetimepicker();
</script>
<?php include 'footer.php'; ?>