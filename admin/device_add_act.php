<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$sn = $_POST['sn'];
$vc = $_POST['vc'];
$ac = $_POST['ac'];
$vkey = $_POST['vkey'];

// query untuk menginput data device baru ke tabel device
mysqli_query($config,"insert into demo_device values('$nama','$sn','$vc','$ac','$vkey')");

// megalihkan halaman ke halaman data device
header("location:device.php?pesan=oke");