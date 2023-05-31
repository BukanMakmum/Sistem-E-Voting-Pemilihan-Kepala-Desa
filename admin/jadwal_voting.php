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
						<h4 class="panel-title">JADWAL VOTING</h4>
						<div class="heading-elements">
							<a href="panitia.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<!-- Notifikasi Update jika berasil -->
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="oke"){
									echo "<div class='alert alert-success'>Jadwal Voting Berhasil di Update.</div>";
								}
							}
							?>

							<form action="jadwal_voting_update.php" method="post">
								<?php								
								$data = mysqli_query($config,"select * from jadwal_voting");		
								while($d=mysqli_fetch_array($data)){
									?>									
									<table class="table">
										<tr>
											<th width="20%">Mulai Voting</th>
											<td>												
												<input type="text" class="jadwal form-control" name="mulai" required="required" autocomplete="off" value="<?php echo $d['jv_mulai']; ?>">												
											</td>
										</tr>	
										<tr>
											<th width="20%">Voting Berakhir</th>
											<td>												
												<input type="text" class="jadwal form-control" name="berakhir" required="required" autocomplete="off" value="<?php echo $d['jv_berakhir']; ?>">
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
<script type="text/javascript">
	jQuery('.jadwal').datetimepicker();
</script>

<?php include 'footer.php'; ?>