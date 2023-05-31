<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CETAK KARTU PEMILIH</title>

	<?php 
	// mengaktifkan session	
	session_start();

	// cek apakah sudah login atau belum
	if($_SESSION['status'] != "panitia_login"){
		// jika belum login di alihkan kembali ke halaman login
		header("location:../login.php");
	}
	?>

	<!-- menghubungkan file koneksi database -->
	<?php include '../config.php'; ?>
</head>

<body>	
	
	<div style="width: 400px;padding: 2px;border: 2px solid black">		
		<table>
		<tr>
			<td style="width: 50px;padding: 2px">
			<img src="../images/opsi/logo2.png" style="width: 100%">
			</td>
			<td style="padding: 0px 0px 0px 4px">
			<a class="no-margin no-padding"><p style="font-size: 9pt;font-weight: bold;margin-bottom: 2px">KARTU PEMILIH</p>	
			<p style="font-size: 8pt;margin-top: 0">SISTEM E-VOTING PEMILIHAN GEUCHIK BERBASIS WEB <br/> PEMERINTAH GAMPONG BLANG MAJRON</p></a></td>
		</tr>
		</table>							
		<hr/ style="padding: 0;margin: 0px 0px 5px 0px ">
		<div style="overflow: hidden;">
		
			<?php
				// menangkap data id pemilih yang akan di tampilkan
			$id = $_GET['id'];

				// query untuk mengambil data pemilih yang ber id seperti yg di dapat di variabel id di atas
			$data = mysqli_query($config,"select * from pemilih where pemilih_id='$id'");	

				// menampilkan data pemilih	
			while($d=mysqli_fetch_array($data)){
				?>									
				<div style="width: 17%;float: left;padding: 7px;">
					<?php if($d['pemilih_foto']!=""){ ?>
					<img style="width: 90%;height: 90px" src="../images/pemilih/<?php echo $d['pemilih_foto']; ?>">
					<?php }else{ ?>
					Belum ada foto.
					<?php } ?>
				</div>
				<div style="width: 79%;float: left;padding: 0px;margin-left: 0px">
					<table>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Username</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 9pt" width="78%"><b><?php echo  $d['pemilih_username']; ?></b></td>
						</tr>						
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">NIK</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_nik']; ?></td>
						</tr>										
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Nama</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_nama']; ?></td>
						</tr>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Tmp/Tgl Lhir</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_tempat_lahir'] ?>, <?php echo date('d-m-Y',strtotime($d['pemilih_tgl_lahir'])); ?></td>
						</tr>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Alamat</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_alamat'] ?></td>
						</tr>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Agama</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_agama'] ?></td>
						</tr>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Status Kawin</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_status_kawin'] ?></td>
						</tr>
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Pekerjaan</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%"><?php echo $d['pemilih_pekerjaan'] ?></td>	
						</tr>																						
						<tr>
							<td style="padding: 1px;font-size: 8pt" width="20%">Kategori</td>
							<td style="padding: 1px;font-size: 8pt;text-align: center;" width="5%">:</td>
							<td style="padding: 1px;font-size: 8pt" width="78%">
								<?php echo $d['pemilih_kategori'];?>
							</td>
						</tr>																
					</table>		
				</div>							
				<?php 
			} 
			?>
		</div>
		
		<div style="overflow: hidden;">
			<div style="width: 180px;float: right;">				
				<p style="font-size: 8pt">
					Blang Majron, <?php echo date('d F Y'); ?>
					<br/>
					Panitia Pemilihan Geuchik Berbasis Web
					<br/>
					Ketua,
				</p>
			
								
				<p style="font-size: 9pt;text-align: Left;"><b>
					<?php 
					$ketua = mysqli_query($config,"select * from panitia where panitia_jabatan='ketua'");
					$k = mysqli_fetch_assoc($ketua);
					echo $k['panitia_nama'];
					?>	</b></p>		
			</div>
		</div>


	</div>


</body>

<script type="text/javascript">
	window.print();
</script>
</html>
