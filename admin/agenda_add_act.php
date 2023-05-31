<?php 
// koneksi database
include '../config.php';

// menangkap data 
$mulai = $_POST['mulai'];
$berakhir = $_POST['berakhir'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$tempat = $_POST['tempat'];


// query untuk menginput data 

mysqli_query($config,"insert into agenda values('','$mulai','$berakhir','$nama_kegiatan','$tempat')")or die(mysqli_error());

		// megalihkan halaman ke halaman data 
header("location:agenda.php?pesan=okee");
