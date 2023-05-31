<?php 
// menghubungkan koneksi database
include 'config.php';

// menangkap data geuchik dan data pemilih melalui url
$geuchik = md5($_GET['geuchik']);
$pemilih = $_GET['pemilih'];

// input data geuchik yang dipilih dan data pemilih ke table voting
mysqli_query($config, "insert into voting values('','$pemilih','$geuchik')");

// mengalihkan halaman ke voting selesai
header("location:voting_selesai.php");
?>