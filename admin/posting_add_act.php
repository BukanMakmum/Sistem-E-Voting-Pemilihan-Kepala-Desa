<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];


// PROSES GAMBAR
$target_dir = "../images/posting/";
$rand = rand();
$target_file = $target_dir . $rand . basename($_FILES["gambar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// cek ekstensi file gambar yg di upload, hanya boleh jpg, png, jpeg, gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {	
	$uploadOk = 0;
}

// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 baru kemudian di upload
if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data posting
	header("location:posting_tambah.php?alert=gagal");
} else {
	if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
	
		$f = $rand . $_FILES["gambar"]["name"];

		// query untuk menginput data posting baru ke tabel posting
		mysqli_query($config,"insert into posting values('','$judul','$tanggal','$deskripsi','$f','$kategori')")or die(mysqli_error());

		// megalihkan halaman ke halaman data posting
		header("location:posting.php?pesan=oke");

	} else {
		// megalihkan halaman ke halaman data posting
		header("location:posting_tambah.php?alert=gagal");
	}
}
