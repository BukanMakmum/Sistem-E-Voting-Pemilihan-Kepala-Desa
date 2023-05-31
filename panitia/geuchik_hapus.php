<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

// query untuk menghapus data geuchik yang ber id di atas
$x=mysqli_query($config,"select * from geuchik where geuchik_id='$id'");
$u=mysqli_fetch_array($x);
unlink("../images/geuchik/$u[geuchik_gambar]"); //query untuk mengapus gambar di folder tersimpan
mysqli_query($config,"delete from geuchik where geuchik_id='$id'");

// query untuk menghapus data geuchik yang di hapus pada tabel voting
mysqli_query($config,"delete from voting where voting_geuchik='$id'");

// mengalihkan halaman ke halaman geuchik
header("location:geuchik.php?pesan=hapus");

?>