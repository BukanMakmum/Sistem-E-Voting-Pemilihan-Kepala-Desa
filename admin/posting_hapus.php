<?php 

// koneksi database
include '../config.php';

// menangkap data id
$id = $_GET['id'];

// query hapus posting
$x=mysqli_query($config,"select * from posting where posting_id='$id'");
$u=mysqli_fetch_array($x);
unlink("../images/posting/$u[posting_gambar]"); //query untuk mengapus gambar di folder tersimpan
mysqli_query($config,"delete from posting where posting_id='$id'");

// alihkan halaman
header("location:posting.php?pesan=hapus");

?>