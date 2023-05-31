<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

// query untuk menghapus data panitia yang ber id di atas
$x=mysqli_query($config,"select * from panitia where panitia_id='$id'");
$u=mysqli_fetch_array($x);
unlink("../images/panitia/$u[panitia_gambar]"); //query untuk mengapus gambar di folder tersimpan
mysqli_query($config,"delete from panitia where panitia_id='$id'");

// mengalihkan halaman ke halaman panitia
header("location:panitia.php?pesan=hapus");

?>