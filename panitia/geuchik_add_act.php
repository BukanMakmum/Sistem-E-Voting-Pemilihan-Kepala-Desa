<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$nomor = $_POST['nomor'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$tentang = $_POST['tentang'];
$saksi = $_POST['saksi'];

// cek nik dan nourut
$u = mysqli_query($config,"select * from geuchik where geuchik_nomor='$nomor'");
$x = mysqli_query($config,"select * from geuchik where geuchik_nik='$nik'");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman tambah geuchik
	header("location:geuchik_tambah.php?alert=nik_sama");

}else if(mysqli_num_rows($u)>0){
// megalihkan halaman ke halaman tambah pemilih
	header("location:geuchik_tambah.php?alert=nourut");

}else{

	// PROSES GAMBAR
	$target_dir = "../images/geuchik/";
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
	// megalihkan halaman ke halaman data geuchik
		header("location:geuchik_tambah.php?alert=gagal");
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

			$f = $rand . $_FILES["foto"]["name"];

		// query untuk menginput data geuchik baru ke tabel geuchik
			mysqli_query($config,"insert into geuchik values('','$nomor','$nik','$nama','$f','$tempat_lahir','$tanggal_lahir','$jk','$alamat','$agama','$visi','$misi','$tentang','$saksi')")or die(mysqli_error());

		// megalihkan halaman ke halaman data geuchik
			header("location:geuchik.php?pesan=oke");

		} else {
		// megalihkan halaman ke halaman data geuchik
			header("location:geuchik_tambah.php?alert=gagal");
		}
	}


}