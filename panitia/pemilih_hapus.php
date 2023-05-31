<?php 

// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

// query untuk menghapus data pemilih yang ber id di atas
$x=mysqli_query($config,"select * from pemilih where pemilih_id='$id'");
$u=mysqli_fetch_array($x);
unlink("../images/pemilih/$u[pemilih_foto]"); //query untuk mengapus gambar di folder tersimpan
mysqli_query($config,"delete from pemilih where pemilih_id='$id'");


// query untuk menghapus data pemilih yang di hapus pada tabel voting
mysqli_query($config,"delete from voting where voting_pemilih='$id'");


// query untuk menghapus data fingerprint pemilih
mysqli_query($config,"delete from demo_finger where user_id='$id'");

// mengalihkan halaman ke halaman pemilih
header("location:pemilih.php?pesan=hapus");

?>
