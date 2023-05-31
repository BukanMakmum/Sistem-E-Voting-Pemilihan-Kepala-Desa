<?php include 'header.php'; ?>
<?php error_reporting(0); ?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">LAPORAN REKAPITULASI</h4>						
					</div>
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
						<a target="_blank" href="laporan_cetak.php" class="btn btn-primary"> <i class="icon-printer"></i> CETAK</a>
						<br/>

						<h4>I. DATA PEROLEHAN SUARA</h4>

						<div class="table-responsive">

							<table class="table table-bordered table-hover table-striped">								
								<tr>
									<th width="1%" rowspan="2">No</th>									
									<th rowspan="2" class="text-center">Nama Calon Geuchik</th>

								</tr>
								<tr>																												
									<th width="8%" class="text-center">Jumlah Suara</th>																						
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
										<td width="1%" class="text-right">
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

						<h4>II. DATA PENGGUNA HAK PILIH</h4>

						<div class="table-responsive">

							<table class="table table-bordered table-hover table-striped">								
								<tr>
									<th width="1%">No</th>									
									<th class="text-center">Keterangan</th>
									<th width="8%"  class="text-center">Jumlah Jiwa</th>																						
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

						<h4>III. DATA JUMLAH PEMILIH TERDAFTAR</h4>

						<div class="table-responsive">

							<table class="table table-bordered table-hover table-striped">								
								<tr>
									<th width="1%">No</th>									
									<th class="text-center">Keterangan</th>
									<th width="8%" class="text-center">Jumlah Jiwa</th>																						
									<th width="10%" class="text-center">Presentasi (%)</th>																						
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

						<h4>IV. TANDA TANGAN PANITIA</h4>

						<div class="table-responsive">

							<table class="table table-bordered table-hover table-striped">								
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

						<h4>V. TANDA TANGAN SAKSI</h4>

						<div class="table-responsive">

							<table class="table table-bordered table-hover table-striped">								
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
		</div>				

	</div>
</div>

<?php include 'footer.php'; ?>