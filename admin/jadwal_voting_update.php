<?php 
// koneksi database
include '../config.php';

// menangkap data tanggal dan jam
$mulai = $_POST['mulai'];
$berakhir = $_POST['berakhir'];

// mengupdate nya ke table jadwal_voting
mysqli_query($config,"update jadwal_voting set jv_mulai='$mulai', jv_berakhir='$berakhir'");

// mengalihkan halaman
header("location:jadwal_voting.php?pesan=oke");