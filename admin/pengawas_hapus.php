<?php 

// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

// query untuk menghapus data pengawas yang ber id di atas
$x=mysqli_query($config,"select * from pengawas where pengawas_id='$id'");
$u=mysqli_fetch_array($x);
unlink("../images/pengawas/$u[pengawas_gambar]"); //query untuk mengapus gambar di folder tersimpan
mysqli_query($config,"delete from pengawas where pengawas_id='$id'");

// mengalihkan halaman ke halaman pengawas
header("location:pengawas.php?pesan=hapus");


?>
