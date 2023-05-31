<?php 

// koneksi database
include '../config.php';

// menangkap data id sn
$sn = $_GET['id'];

// query hapus device
mysqli_query($config,"delete from demo_device where sn='$sn'");

// alihkan halaman
header("location:device.php?pesan=okee");

?>