<?php 

// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

// query untuk menghapus data kategori yang ber id di atas
mysqli_query($config,"delete from kategori where kategori_id='$id'");


// query untuk menghapus data posting yang ber id di atas
mysqli_query($config,"delete from posting where posting_kategori='$id'");


// mengalihkan halaman ke halaman kategori
header("location:kategori.php?pesan=hapus");


?>
