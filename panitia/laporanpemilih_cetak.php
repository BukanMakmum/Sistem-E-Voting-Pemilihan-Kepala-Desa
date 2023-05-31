<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CETAK DATA PEMILIH</title>

	<!-- libary template -->
	<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>




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


	<style type="text/css">
	.table-data {
		border-collapse: collapse;
	}

	.table-data, .table-data th, .table-data td {
		border: 1px solid black;
		padding: 5px;
	}
</style>



<table>
	<tr>
		<td style="width: 100px;padding: 10px">
			<img src="../images/opsi/logo.png" style="width: 90%">
		</td>
		<td style="padding: 0px 0px 0px 4px">
					<p class="no-margin no-padding"><p style="font-size: 11pt;font-weight: bold;margin-bottom: 2px">LAPORAN DAFTAR PEMILIH YANG MENGGUNAKAN HAK PILIH</p>	
					<p style="font-size: 11pt;margin-top: 0">SISTEM E-VOTING PEMILIHAN GEUCHIK BERBASIS WEB <br/> PEMERINTAH GAMPONG BLANG MAJRON</p>	
				</td>
	</tr>
</table>			

<hr/ style="margin: 5px 0px 15px 0px;border: 1px solid black">	

<table class="table-data" style="font-size: 9pt" >		
	<tr>
		<th width="1%" class="text-center">No</th>									
		<th width="7%" class="text-center">Nomor KK</th>		
		<th width="7%" class="text-center">NIK</th>		
		<th width="8%" class="text-center">Nama</th>		
		<th width="11%" class="text-center">Tmpt/Tgl Lahir</th>		
		<th width="1%" class="text-center">Umur</th>		
		<th width="1%" class="text-center">Jenis Kelamin</th>																			
		<th width="8%" class="text-center">Alamat</th>		
		<th width="7%" class="text-center">Agama</th>		
		<th width="7%" class="text-center">Status Kawin</th>		
		<th width="7%" class="text-center">Pekerjaan</th>		
		<th width="2%" class="text-center">Kategori</th>																		
	</tr>

	<?php



// no urut di mulai dari 1
	$no = 1; 

// query untuk mengambil data pemilih
	$data = mysqli_query($config,"select * from pemilih,voting where pemilih_id=voting_pemilih");	

// menampilkan data pemilih	
	while($d=mysqli_fetch_array($data)){
		?>
		<tr>
			<td class="text-center"><?php echo $no++; ?></td>
			<td class="text-right"><?php echo substr($d['pemilih_kk'], 0, 12) ?>****</td>
			<td class="text-right"><?php echo substr($d['pemilih_nik'], 0, 12) ?>****</td>
			<td><?php echo $d['pemilih_nama'] ?></td>									
			<td><?php echo $d['pemilih_tempat_lahir'] ?>, <?php echo date('d-m-Y',strtotime($d['pemilih_tgl_lahir'])); ?></td>
			<td class="text-center"><?php echo $d['pemilih_umur'] ?></td>
			<td><?php echo $d['pemilih_jk'] ?></td>																												
			<td><?php echo $d['pemilih_alamat'] ?></td>
			<td><?php echo $d['pemilih_agama'] ?></td>
			<td><?php echo $d['pemilih_status_kawin'] ?></td>
			<td><?php echo $d['pemilih_pekerjaan'] ?></td>										
			<td><?php echo $d['pemilih_kategori'] ?></td>																									
		</tr>
		<?php
	}
	?>		
</table>
<br/>
<div style="float: right;font-size: 9pt">				
	<p>
		Blang Majron, <?php echo date('d F Y'); ?>
		<br/>
		Panitia Pemilihan Geuchik Berbasis Web
		<br/>
		Ketua,
	</p>		
	<br/>
	<br/>
	<p class="text-Left"><b>
		<?php 
		$ketua = mysqli_query($config,"select * from panitia where panitia_jabatan='ketua'");
		$k = mysqli_fetch_assoc($ketua);
		echo $k['panitia_nama'];
		?>
	</p>				
</div>




</body>

<script type="text/javascript">
	window.print();
</script>
</html>
