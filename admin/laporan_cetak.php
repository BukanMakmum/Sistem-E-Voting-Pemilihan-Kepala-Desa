<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CETAK LAPORAN</title>
	
	<!-- libary template -->
	<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
	
	


	<?php 
	// mengaktifkan session	
	session_start();

	// cek apakah sudah login atau belum
	if($_SESSION['status'] != "admin_login"){
		// jika belum login di alihkan kembali ke halaman login
		header("location:../login.php");
	}
	?>

	<!-- menghubungkan file koneksi database -->
	<?php include '../config.php'; ?>
</head>

<body>

	<?php error_reporting(0); ?>
	<div class="container">
		<div class="row">
			<table style="width: 100%">
				<tr>
					<td style="width: 100px;padding: 10px">
						<img src="../images/opsi/logo.png" style="width: 100%">
					</td>
					<td style="padding: 10px" class="text-left">
						<?php
           // query untuk mengambil data jadwal voting
						$data = mysqli_query($config,"select * from jadwal_voting");

           // menampilkan data jadwal voting
						while($d=mysqli_fetch_array($data)){
							?><h4 class="no-margin no-padding" style="font-weight: bold;">CATATAN HASIL PEROLEHAN SUARA<br/>DALAM PEMILIHAN GEUCHIK SECARA E-VOTING BERBASIS WEB <br/>TAHUN <?php echo date('Y',strtotime($d['jv_mulai'])); ?></h4>
							<?php
						}
						?>							
					</td>
				</tr>
			</table>					
		</div>

		<hr/>
		<!-- <br/> -->
		<!-- <br/> -->

		<div class="panel panel-flat">			
			<div class="panel-body">
				<table>
					<tr>
						<th>KABUPATEN&nbsp;</th>
						<th>&nbsp;:&nbsp;</th>
						<th>&nbsp;ACEH UTARA</th>
					</tr>
					<tr>
						<th>KECAMATAN&nbsp;</th>
						<th>&nbsp;:&nbsp;</th>
						<th>&nbsp;SYAMTALIRA BAYU</th>
					</tr>
					<tr>
						<th>GAMPONG&nbsp;</th>
						<th>&nbsp;:&nbsp;</th>
						<th>&nbsp;BLANG MAJRON</th>
					</tr>
				</table>

				<br/>
				
				<br/>

				<h5 style="font-weight: bold;font-size: 12pt">I. DATA PEROLEHAN SUARA</h5>

				<div class="table-responsive">

					<div class="table-responsive">

						<table class="table table-bordered table-hover table-striped">								
							<tr>
								<th width="1%" rowspan="2">No</th>									
								<th rowspan="2" class="text-center">Nama Calon Geuchik</th>

							</tr>
							<tr>																												
								<th width="10%" class="text-center">Jumlah Suara</th>																						
								<th width="10%"class="text-center">Presentasi (%)</th>																						
							</tr>

							<?php
									// no urut di mulai dari 1
							$no = 1; 

									// query untuk mengambil data geuchik
							$data = mysqli_query($config,"select * from geuchik");	

									// menampilkan data geuchik	
							while($d=mysqli_fetch_array($data)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['geuchik_nama'] ?></td>
									<td class="text-right">
										<?php
										date_default_timezone_set("Asia/Jakarta");
			// cek apakah sekarang dalam masa voting atau tidak
										$cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
										$cek = mysqli_num_rows($cek_tanggal);
										$m=0;
			// jika dalam masa voting
										if($cek > 0){

											echo $m;
										}
										else{
			// jika tidak ada parameter alert
											$id_g = md5 ($d['geuchik_id']); 
											$gg = mysqli_query($config,"select * from voting where voting_geuchik='$id_g'");
											$jumlah = mysqli_num_rows($gg);
											echo $jumlah;
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
							<tr>																												
								<th class="text-center" colspan="2">Jumlah Total Perolehan Suara</th>																						
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
							</tr>
						</table>
					</div>	


					<br/>

					<h5 style="font-weight: bold;font-size: 12pt">II. DATA PENGGUNA HAK PILIH</h5>

					<div class="table-responsive">

						<table class="table table-bordered table-hover table-striped">								
							<tr>
								<th width="1%">No</th>									
								<th class="text-center">Keterangan</th>
								<th width="10%"  class="text-center">Jumlah Jiwa</th>																						
								<th width="10%" " class="text-center">Presentasi (%)</th>																						
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
								<th>Pemilih Yang Tidak Menggunakan Hak Pilih (Golput)</th>
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
					<!-- membatasi halaman cetak -->
					<div style="page-break-before: always;"></div><p/>

					<h5 style="font-weight: bold;font-size: 12pt">III. DATA JUMLAH PEMILIH TERDAFTAR</h5>

					<div class="table-responsive">

						<table class="table table-bordered">								
							<tr>
								<th width="1%">No</th>									
								<th class="text-center">Keterangan</th>
								<th width="10%" class="text-center">Jumlah Jiwa</th>																						
								<th width="10%" class="text-center">Presentasi (%)</th>																						
							</tr>								
							<tr>
								<td rowspan="3">1</td>
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
								<td rowspan="3">2</td>
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

					<h5 style="font-weight: bold;font-size: 12pt">IV. TANDA TANGAN PANITIA</h5>

					<div class="table-responsive">

						<table class="table table-bordered">								
							<tr>
								<th width="1%">No</th>									
								<th class="text-center">Nama Panitia</th>
								<th width="20%" class="text-center">Jabatan</th>																						
								<th width="40%" class="text-center">Tanda Tangan</th>																						
							</tr>								
							<?php 
							$no = 1;
							$panitia = mysqli_query($config,"select * from panitia");
							while($p = mysqli_fetch_array($panitia)){
								$nox = $no++;
								?>
								<tr>
									<td><?php echo $nox; ?></td>										
									<td><?php echo $p['panitia_nama']; ?></td>
									<td class="text-center"><?php echo $p['panitia_jabatan']; ?></td>										
									<td class="<?php if($nox%2==0){echo 'text-right';}else{echo 'text-left';} ?>">
										<?php echo $nox; ?> ........................................
									</td>																										
								</tr>		
								<?php 
							}
							?>
						</table>
					</div>	


					<br/>

					<h5 style="font-weight: bold;font-size: 12pt">V. TANDA TANGAN SAKSI</h5>

					<div class="table-responsive">

						<table class="table table-bordered">								
							<tr>
								<th width="1%">No</th>									
								<th class="text-center">Nama Saksi</th>
								<th width="20%" class="text-center">Saksi Calon</th>																						
								<th width="40%" class="text-center">Tanda Tangan</th>																						
							</tr>								
							<?php 
							$no = 1;
							$geuchik = mysqli_query($config,"select * from geuchik");
							while($p = mysqli_fetch_array($geuchik)){
								$nox = $no++;
								?>
								<tr>
									<td><?php echo $nox; ?></td>										
									<td><?php echo $p['geuchik_saksi']; ?></td>
									<td class="text-center"><?php echo $p['geuchik_nama']; ?></td>										
									<td class="<?php if($nox%2==0){echo 'text-right';}else{echo 'text-left';} ?>">
										<?php echo $nox; ?> ........................................
									</td>																										
								</tr>		
								<?php 
							}
							?>
						</table>
					</div>	


				</div>					
			</div>
		</div>


	</body>

	<script type="text/javascript">
	// print / cetak
	window.print();
</script>
</html>
