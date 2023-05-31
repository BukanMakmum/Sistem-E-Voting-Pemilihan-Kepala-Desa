<?php
// koneksi database
// host,username host,password host,nama database
$config = mysqli_connect("localhost","root","","tga");
// cek jika koneksi gagal
if (mysqli_connect_errno()){
	// menampilkan pesan error koneksi mysql
	echo "Koneksi ke database gagal: " . mysqli_connect_error();
}
?>