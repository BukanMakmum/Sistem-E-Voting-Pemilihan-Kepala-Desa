	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			
			<!-- Dashboard content -->
			<div class="row">
				<div class="col-lg-12">
					
					<!-- Quick stats boxes -->
					<div class="row">
						<div class="col-lg-3">

							<!-- Members online -->
							<div class="panel bg-teal-400">
								<div class="panel-body">
									<?php $geuchik=mysqli_query($config,"select * from geuchik"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($geuchik) . " Geuchik"; ?></h3>
									Jumlah Calon Geuchik
									
								</div>

								<div class="container-fluid">
									<div id="members-online"></div>
								</div>
							</div>
							<!-- /members online -->

						</div>

						<div class="col-lg-3">

							<!-- Current server load -->
							<div class="panel bg-pink-400">
								<div class="panel-body">
									<?php $pemilih=mysqli_query($config,"select * from pemilih"); ?>
									<?php $dpt=mysqli_query($config,"select * from pemilih where pemilih_kategori='DPT'"); ?>
									<?php $dptb=mysqli_query($config,"select * from pemilih where pemilih_kategori='DPTb'"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($pemilih) . " Pemilih"; ?></h3>
									Jumlah Pemilih <?php echo mysqli_num_rows($dpt) . " DPT"; ?> | <?php echo mysqli_num_rows($dptb) . " DPTb"; ?>
									
								</div>

								<div id="server-load"></div>
							</div>
							<!-- /current server load -->

						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-blue-400">
								<div class="panel-body">									
									<?php $panitia=mysqli_query($config,"select * from panitia"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($panitia) . " Panitia"; ?></h3>
									Jumlah Panitia								
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->

						</div>

						<div class="col-lg-3">

							<!-- Today's revenue -->
							<div class="panel bg-orange-400">
								<div class="panel-body">									
									<?php $pengawas=mysqli_query($config,"select * from pengawas"); ?>
									<h3 class="no-margin"><?php echo mysqli_num_rows($pengawas) . " Pengawas"; ?></h3>
									Jumlah Pengawas								
								</div>

								<div id="today-revenue"></div>
							</div>
							<!-- /today's revenue -->

						</div>
					</div>
					<!-- /quick stats boxes -->			

				</div>

				<div class="col-lg-12">					
					<!-- Daily sales -->
					<div class="panel panel-flat">
						<div class="panel-heading">							
						</div>

						<div class="panel-body">

							<div class="row">
								<div class="col-md-8">
									<div id="grafik_geuchik" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
								</div>
								<div class="col-md-4">
									<div class="table-responsive">
										<div class="block-title-crimson">
											<span>
												TABEL SUARA
											</span>
										</div>
										<table class="table table-bordered table-hover table-striped">
											<tr>
												<th>Nama Calon Geuchik</th>
												<th>Jumlah Suara</th>
												<th>(%)</th>
											</tr>
											<?php
											$geuchik = mysqli_query($config,"select * from geuchik");
											while($g=mysqli_fetch_array($geuchik)){
												?>
												<tr>
													<td>
														<img style="width: 20px" src="../images/geuchik/<?php echo $g['geuchik_gambar']; ?>">
														&nbsp;
														&nbsp;
														<?php echo $g['geuchik_nama']; ?>
													</td>
													<td width="1%" class="text-right">
														<?php
														date_default_timezone_set("Asia/Jakarta");
			// cek apakah sekarang dalam masa voting atau tidak
														$cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
														$cek = mysqli_num_rows($cek_tanggal);
			// jika dalam masa voting
														if($cek > 0){

															echo "<div>0</div>";
														}
														else{
			// jika tidak ada parameter alert
															$id_g = md5($g['geuchik_id']);
															$gg = mysqli_query($config,"select * from voting where voting_geuchik='$id_g'");
															echo mysqli_num_rows($gg);
															$jumlah= mysqli_num_rows($gg);
														}
														?>
													</td>
													<td width="1%" class="text-right">
														<?php
														date_default_timezone_set("Asia/Jakarta");
			// cek apakah sekarang dalam masa voting atau tidak
														$cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
														$cek = mysqli_num_rows($cek_tanggal);
			// jika dalam masa voting
														if($cek > 0){

															echo "<div>0.0</div>";
														}
														else{
									// menghitung persen perolehan suara perkadidat (voting/total daftar pemilih*100)
															$c = mysqli_query($config,"select * from pemilih");
															$total_pemilih= mysqli_num_rows($c);
															echo number_format($jumlah/$total_pemilih*100,2);
														}
														?>
													</td>
												</tr>
												<?php
											}
											?>
											<th class="text-center" colspan="1">Total Suara Masuk</th>
											<th class="text-right">
												<?php                     
												$a = mysqli_query($config,"select * from voting");
												$total_voting= mysqli_num_rows($a);
												echo mysqli_num_rows($a);
												?>    
											</th>                                           
											<th class="text-right">
												<?php                   
                    // menghitung total persen perolehan suara (total voting/total daftar pemilih*100)  
												$c = mysqli_query($config,"select * from pemilih");
												$total_pemilih= mysqli_num_rows($c);
												echo number_format($total_voting/$total_pemilih*100,2);
												?>
											</th> 
										</table>
									</div>

								</div>
							</div>


						</div>


					</div>
					<!-- /daily sales -->


				</div>
			</div>
			<!-- /dashboard content -->


			<!-- Footer -->
			<div class="footer text-muted">

			</div>
			<!-- /footer -->

		</div>
		<!-- /content area -->

	</div>
	<!-- /main content -->

	<script type="text/javascript">
		Highcharts.chart('grafik_geuchik', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'GRAFIK PEROLEHAN SUARA'
			},
			
			subtitle: {
				text: ''
			},
			colors: ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce','#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a', '#d947fd'],
			xAxis: {
				categories: [
				''
				]
			},
			yAxis: {
				min: 0,
				allowDecimals: false,
				title: {
					text: 'Grafik Perolehan Suara'
				}
			},
			tooltip: {
				valueSuffix: ' Suara'
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					pointWidth:40,				
					borderWidth: 0,				
					dataLabels: {
						enabled: true
					}
				}
			},		
			series: [
			<?php
			$geuchik = mysqli_query($config,"select * from geuchik"); 
			while($g=mysqli_fetch_array($geuchik)){
				?>		
				{
					name: '<?php echo $g['geuchik_nama']; ?>',
					data: [

					<?php 
					date_default_timezone_set("Asia/Jakarta");
			// cek apakah sekarang dalam masa voting atau tidak
					$cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
					$cek = mysqli_num_rows($cek_tanggal);
					$id_g = md5 ($g['geuchik_id']);
					$gg = mysqli_query($config,"select * from voting where voting_geuchik='$id_g'");
					$m=0;
			
					if($cek > 0){
						echo($m);
						}
						else{
				 		echo mysqli_num_rows($gg);
						}

						?>

						]

					},
				<?php } ?> 		
				]
			});
		</script>
		<?php include 'footer.php'; ?>