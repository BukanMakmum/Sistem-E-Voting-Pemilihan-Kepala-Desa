<?php 
// mengaktifkan session
session_start();

// menghapus semua session pemilih
session_destroy();

// alihkan halaman
header ("location:voting.php");
?>