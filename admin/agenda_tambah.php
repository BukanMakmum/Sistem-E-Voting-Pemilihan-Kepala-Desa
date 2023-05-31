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
						<h4 class="panel-title">TAMBAH AGENDA KEGIATAN BARU</h4>
						<div class="heading-elements">
							<a href="agenda.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="agenda_add_act.php" method="post" enctype="multipart/form-data">
								<table class="table table-bordered table-striped">
									<tr>
										<th width="20%">Jadwal Mulai</th>
										<td>
											<input type="text" class="jadwal form-control" name="mulai" required="required" autocomplete="off">
										</td>
									</tr>
									<tr>
										<th width="20%">Jadwal Selesai</th>
										<td>
											<input type="text" class="jadwal form-control" name="berakhir" required="required" autocomplete="off">
										</td>
									</tr>
									<tr>
										<th width="20%">Nama Kegiatan</th>
										<td>
										<input type="text" class="form-control" name="nama_kegiatan" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Tempat</th>
										<td>
										<input type="text" class="form-control" name="tempat" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th></th>
										<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer text-muted">
			
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery('.jadwal').datetimepicker();
</script>
<?php include 'footer.php'; ?>