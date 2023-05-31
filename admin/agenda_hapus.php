<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang ingin di hapus
$id = $_GET['id'];

mysqli_query($config,"delete from agenda where agenda_id='$id'");

// mengalihkan halaman ke halaman panitia
header("location:agenda.php?pesan=hapus");

?>