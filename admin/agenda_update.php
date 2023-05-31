<?php 
// koneksi database
include '../config.php';

$id = $_POST['id'];
// menangkap data 
$mulai = $_POST['mulai'];
$berakhir = $_POST['berakhir'];
$nama_kegiatan = $_POST['nama_kegiatan'];
$tempat = $_POST['tempat'];

// mengupdate nya ke table agenda
mysqli_query($config,"update agenda set agenda_jdw_mulai='$mulai', agenda_jdw_selesai='$berakhir', agenda_ket='$nama_kegiatan', agenda_tmp='$tempat' where agenda_id='$id'");

// mengalihkan halaman
header("location:agenda.php?pesan=oke");