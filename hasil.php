<?php include 'header.php'; ?>
<?php error_reporting(0); ?>
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<center>
				<h1>
					HASIL REKAPITULASI SUARA
				</h1>
				<?php
			// setting time zone indonesia
				date_default_timezone_set("Asia/Jakarta");
			// cek apakah sekarang dalam masa voting atau tidak
				$cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
				$cek = mysqli_num_rows($cek_tanggal);
			// jika dalam masa voting
				if($cek > 0){
					echo "<div><span class='label label-primary' style='font-size:15px'>BELUM FINAL</span></div>";
				}
				else{
			// jika tidak ada parameter alert
					echo "<div><span class='label label-danger' style='font-size:15px'>FINAL</span></div>";
				}
				?>
			</center>
		</div>
		<div class="panel-body">
			<br/>
			<br/>
			<div class="row">
				<div class="col-md-8">
					<div id="grafik_geuchik" style="min-width: 310px; height: 530px; margin: 0 auto"></div>
				</div>
				<div class="col-md-4">
					<div id="container" style="width: 300px; height: 50px; margin: 0 auto"></div>
					<script type="text/javascript">
					/**
					* Get the current time
					*/
					function getNow() {
						var now = new Date();
						return {
							hours: now.getHours() + now.getMinutes() / 60,
							minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
							seconds: now.getSeconds() * 12 / 60
						};
					}
					/**
					* Pad numbers
					*/
					function pad(number, length) {
					// Create an array of the remaining length + 1 and join it with 0's
					return new Array((length || 2) + 1 - String(number).length).join(0) + number;
				}
				var now = getNow();
					// Create the chart
					Highcharts.chart('container', {
						chart: {
							type: 'gauge',
							plotBackgroundColor: null,
							plotBackgroundImage: null,
							plotBorderWidth: 0,
							plotShadow: false,
							height: 200
						},
						credits: {
							enabled: false
						},
						title: {
							text: ''
						},
						pane: {
							background: [{
					// default background
				}, {
					// reflex for supported browsers
					backgroundColor: Highcharts.svg ? {
						radialGradient: {
							cx: 0.5,
							cy: -0.4,
							r: 1.9
						},
						stops: [
						[0.5, 'rgba(255, 255, 255, 0.2)'],
						[0.5, 'rgba(200, 200, 200, 0.2)']
						]
					} : null
				}]
			},
			yAxis: {
				labels: {
					distance: -20
				},
				min: 0,
				max: 12,
				lineWidth: 0,
				showFirstLabel: false,
				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 5,
				minorTickPosition: 'inside',
				minorGridLineWidth: 0,
				minorTickColor: '#666',
				tickInterval: 1,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				title: {
					text: 'e-PiLKADes<br/>Blang Majron',
					style: {
						color: '#BBB',
						fontWeight: 'normal',
						fontSize: '8px',
						lineHeight: '10px'
					},
					y: 10
				}
			},
			tooltip: {
				formatter: function () {
					return this.series.chart.tooltipText;
				}
			},
			series: [{
				data: [{
					id: 'hour',
					y: now.hours,
					dial: {
						radius: '60%',
						baseWidth: 4,
						baseLength: '95%',
						rearLength: 0
					}
				}, {
					id: 'minute',
					y: now.minutes,
					dial: {
						baseLength: '95%',
						rearLength: 0
					}
				}, {
					id: 'second',
					y: now.seconds,
					dial: {
						radius: '100%',
						baseWidth: 1,
						rearLength: '20%'
					}
				}],
				animation: false,
				dataLabels: {
					enabled: false
				}
			}]
		},
					// Move
					function (chart) {
						setInterval(function () {
							now = getNow();
					if (chart.axes) { // not destroyed
						var hour = chart.get('hour'),
						minute = chart.get('minute'),
						second = chart.get('second'),
					// run animation unless we're wrapping around from 59 to 0
					animation = now.seconds === 0 ?
					false : {
						easing: 'easeOutBounce'
					};
					// Cache the tooltip text
					chart.tooltipText =
					pad(Math.floor(now.hours), 2) + ':' +
					pad(Math.floor(now.minutes * 5), 2) + ':' +
					pad(now.seconds * 5, 2);
					hour.update(now.hours, true, animation);
					minute.update(now.minutes, true, animation);
					second.update(now.seconds, true, animation);
				}
			}, 1000);
					});
					/**
					* Easing function from https://github.com/danro/easing-js/blob/master/easing.js
					*/
					Math.easeOutBounce = function (pos) {
						if ((pos) < (1 / 2.75)) {
							return (7.5625 * pos * pos);
						}
						if (pos < (2 / 2.75)) {
							return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
						}
						if (pos < (2.5 / 2.75)) {
							return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
						}
						return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
					};
				</script></br></br></br></br></br></br></br>
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
									<img style="width: 20px" src="images/geuchik/<?php echo $g['geuchik_gambar']; ?>">
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
									// menghitung persen perolehan suara perkadidat (voting/total daftar pemilih*100)
									$c = mysqli_query($config,"select * from pemilih");
									$total_pemilih= mysqli_num_rows($c);
									echo number_format($jumlah/$total_pemilih*100,2);
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
		<br/>
		<div class="col-md-14">
			<b>PROGRESS PRESENTASI SUARA MASUK </b></p>
			<div class="progress">
				<?php
				// menghitung total voting
				$a = mysqli_query($config,"select * from voting");
				$jumlah = mysqli_num_rows($a);
				// menghitung total yang memilih
				$d = mysqli_query($config,"select * from pemilih where pemilih_id not in (select voting_pemilih from voting)");
				$e = mysqli_num_rows($d);
				// menghitung total pemilih
				$b = mysqli_query($config,"select * from pemilih");
				$jt = mysqli_num_rows($b);
				echo number_format ($e/$jt*100,2). "%";
				?>
				<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width:<?php echo number_format ($jumlah/$jt*100,2). "%";
				?>;">
				<?php echo number_format ($jumlah/$jt*100,2). "%";
				?>
			</div>
		</div></p><div><span style="color: Tomato;"><i class="icon-primitive-square"></i> </span>  Jumlah Suara Masuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: Gainsboro;"><i class="icon-primitive-square"></i> </span>  Jumlah Suara Belum Masuk</div>
	</br> </br>
	<div class="block-title">
		<span>
			JUMLAH PENGGUNA HAK PILIH / PEMILIH
		</span>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th width="1%">No</th>
				<th class="text-center">Keterangan</th>
				<th width="20%" class="text-center">Jumlah</th>
				<th width="20%" class="text-center">Presentasi (%)</th>
			</tr>
			<tr>
				<th rowspan="3">1</th>
				<th>Pemilih Menggunakan Hak Pilih</th>
				<th class="text-right">
					<?php
					$a = mysqli_query($config,"select * from voting");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</th>
				<th class="text-right">
					<?php
								// menghitung persen pemilih laki-laki dan Perempuan yg menggunakan hak pilih
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</th>
			</tr>
			<tr>
				<td>- Laki-laki</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih,voting where pemilih_id=voting_pemilih and pemilih_jk='Laki-laki'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
								// menghitung persen pemilih laki-laki yg menggunakan hak pilih
					$b = mysqli_query($config,"select * from pemilih where pemilih_jk='Laki-laki'");
					$total_pemilih_laki = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih_laki*100,2);
					?>
				</td>
			</tr>
			<tr>
				<td>- Perempuan</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih,voting where pemilih_id=voting_pemilih and pemilih_jk='Perempuan'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
								// menghitung persen pemilih perempuan yg menggunakan hak pilih
					$b = mysqli_query($config,"select * from pemilih where pemilih_jk='Perempuan'");
					$total_pemilih_perempuan = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih_perempuan*100,2);
					?>
				</td>
			</tr>
			<tr>
				<th rowspan="3">2</th>
				<th>Pemilih Yang Belum/Tidak Menggunakan Hak Pilih (Golput)</th>
				<th class="text-right">
					<?php
								// menghitung pemilih yg menggunakan hak pilih
					$a = mysqli_query($config,"select * from pemilih where pemilih_id not in (select voting_pemilih from voting)");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</th>
				<th class="text-right">
					<?php
								// menghitung persentase golput
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</th>
			</tr>
			<tr>
				<td>- Laki-laki</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_jk='Laki-laki' and pemilih_id not in (select voting_pemilih from voting)");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
								// menghitung persen pemilih laki-laki yg belum menggunakan hak pilih
					$b = mysqli_query($config,"select * from pemilih where pemilih_jk='Laki-laki'");
					$total_pemilih_laki = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih_laki*100,2);
					?>
				</td>
			</tr>
			<tr>
				<td>- Perempuan</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_jk='Perempuan' and pemilih_id not in (select voting_pemilih from voting)");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
								// menghitung persen pemilih perempuan yg belum menggunakan hak pilih
					$b = mysqli_query($config,"select * from pemilih where pemilih_jk='Perempuan'");
					$total_pemilih_perempuan = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih_perempuan*100,2);
					?>
				</td>
			</tr>
		</table>
	</div>
	<br/>
	<div class="block-title-green">
		<span>
			JUMLAH PEMILIH TERDAFTAR
		</span>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th width="1%">No</th>
				<th class="text-center">Keterangan</th>
				<th width="20%" class="text-center">Jumlah</th>
				<th width="20%" class="text-center">Presentasi (%)</th>
			</tr>
			<tr>
				<th rowspan="3">1</th>
				<th>Data Pemilih Tetap (DPT)</th>
				<th class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPT'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</th>
				<th class="text-right">
					<?php
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</th>
			</tr>
			<tr>
				<td>- Laki-laki</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPT' and pemilih_jk='Laki-laki'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</td>
			</tr>
			<tr>
				<td>- Perempuan</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPT' and pemilih_jk='Perempuan'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</td>
			</tr>
			<tr>
				<th rowspan="3">2</th>
				<th>Data Pemilih Tambahan (DPTb)</th>
				<th class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPTb'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</th>
				<th class="text-right">
					<?php
								// menghitung persentase golput
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</th>
			</tr>
			<tr>
				<td>- Laki-laki</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPTb' and pemilih_jk='Laki-laki'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</td>
			</tr>
			<tr>
				<td>- Perempuan</td>
				<td class="text-right">
					<?php
					$a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPTb' and pemilih_jk='Perempuan'");
					$jumlah = mysqli_num_rows($a);
					echo $jumlah;
					?>
				</td>
				<td class="text-right">
					<?php
					$b = mysqli_query($config,"select * from pemilih");
					$total_pemilih = mysqli_num_rows($b);
					echo number_format($jumlah/$total_pemilih*100,2);
					?>
				</td>
			</tr>
			<tr>
				<th class="text-center" colspan="2">Jumlah Pemilih Terdaftar (1+2)</th>
				<th class="text-right">
					<?php
								// menghitung total pemilih
					$a = mysqli_query($config,"select * from pemilih");
					echo mysqli_num_rows($a);
					?>
				</th>
				<th class="text-right">100.00</th>
			</tr>
		</table>
	</div>
	<br/>
</div>
</div>
</div>
</div>
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
				$id_g = md5($g['geuchik_id']);
				$gg = mysqli_query($config,"select * from voting where voting_geuchik='$id_g'");
				$m=0;
				// jika dalam masa voting
				if($cek > 0){
				echo mysqli_num_rows($m);
				}
				else{
				 echo mysqli_num_rows($gg);
			}
					?>]

	},
<?php } ?>
]
});
</script>
<?php include 'footer.php'; ?>