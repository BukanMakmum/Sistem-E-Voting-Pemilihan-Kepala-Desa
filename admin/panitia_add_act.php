<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']); //enkripsi data password ke md5
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$hp = $_POST['hp'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];



// cek username
$u = mysqli_query($config,"select * from panitia where panitia_username='$username'");

// cek nik
$x = mysqli_query($config,"select * from panitia where panitia_nik='$nik'");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman tambah panitia
	header("location:panitia_tambah.php?alert=nik_sama");

}else if(mysqli_num_rows($u)>0){
// megalihkan halaman ke halaman tambah panitia
	header("location:panitia_tambah.php?alert=nik_username");
} else{

	// PROSES GAMBAR
	$target_dir = "../images/panitia/";
	$rand = rand();
	$target_file = $target_dir . $rand . basename($_FILES["foto"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// cek ekstensi file gambar yg di upload, hanya boleh jpg, png, jpeg, gif
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {	
		$uploadOk = 0;
	}

	// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 baru kemudian di upload
	if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data panitia
		header("location:panitia_tambah.php?alert=gagal1");
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

			$f = $rand . $_FILES["foto"]["name"];

	// query untuk menginput data panitia baru ke table panitia
			mysqli_query($config,"insert into panitia values('','$username','$password','$nama','$nik','$jk','$alamat','$agama','$hp','$jabatan','$status','$f','$tempat_lahir','$tanggal_lahir')")or die(mysqli_error());

	// megalihkan halaman ke halaman data panitia
			header("location:panitia.php?pesan=oke");
		}
		else {
		// megalihkan halaman ke halaman data panitia
			header("location:panitia_tambah.php?alert=gagal");
		}
	}
}