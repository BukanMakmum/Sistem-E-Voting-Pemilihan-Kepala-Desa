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
						<h4 class="panel-title">TAMBAH DEVICE BARU</h4>
						<div class="heading-elements">
							<a href="device.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="device_add_act.php" method="post">
								<table class="table">
									<tr>
										<th width="20%">Nama Device</th>
										<td><input type="text" class="form-control" name="nama" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Serial Number</th>
										<td><input type="text" class="form-control" name="sn" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Verification Code</th>
										<td><input type="text" class="form-control" name="vc" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Activation Code</th>
										<td><input type="text" class="form-control" name="ac" required="required" autocomplete="off"></td>
									</tr>
									<tr>
										<th width="20%">Vkey</th>
										<td><input type="text" class="form-control" name="vkey" required="required" autocomplete="off"></td>
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
		

	</div>
</div>

<?php include 'footer.php'; ?>