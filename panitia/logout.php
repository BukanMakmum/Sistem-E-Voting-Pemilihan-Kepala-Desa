<?php 
// mengaktifkan session
session_start();

// menghapus semua session yang ada
session_destroy();

// mengalihkan halaman ke halaman depan
header("location:../index.php");
?>