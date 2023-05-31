<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];

// query untuk menginput data kategori baru ke tabel kategori
mysqli_query($config,"insert into kategori values('','$nama')");

// megalihkan halaman ke halaman data kategori
header("location:kategori.php?pesan=oke");
