<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form edit
$id = $_POST['id'];
$nama = $_POST['nama'];

mysqli_query($config,"update kategori set kategori_nama='$nama' where kategori_id='$id'");

// mengalihkan halaman ke halaman kategori
header("location:kategori.php");