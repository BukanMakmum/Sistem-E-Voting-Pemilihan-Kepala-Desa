<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$status_kawin = $_POST['status_kawin'];
$pekerjaan = $_POST['pekerjaan'];
$kategori = $_POST['kategori'];
$kk = $_POST['kk'];

$a = date('Y');
$b = date('Y',strtotime($_POST['tanggal_lahir']));

$umur = $a-$b;


// cek username
$u = mysqli_query($config,"select * from pemilih where pemilih_username='$username'");

// cek nik
$x = mysqli_query($config,"select * from pemilih where pemilih_nik='$nik'");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman tambah pemilih
	header("location:pemilih_tambah.php?alert=nik_sama");

}else if(mysqli_num_rows($u)>0){
// megalihkan halaman ke halaman tambah pemilih
	header("location:pemilih_tambah.php?alert=nik_username");

}else{

// PROSES GAMBAR
	$target_dir = "../images/pemilih/";
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
	// megalihkan halaman ke halaman data pemilih
		header("location:pemilih_tambah.php?alert=gagal");
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

			$f = $rand . $_FILES["foto"]["name"];

		// query untuk menginput data pemilih baru ke tabel pemilih
			mysqli_query($config,"insert into pemilih values('','$username','$nik','$nama','$tempat_lahir','$tanggal_lahir','$jk','$alamat','$agama','$status_kawin','$pekerjaan','$kategori','$kk','$umur','$f')");

		// megalihkan halaman ke halaman data pemilih
			header("location:pemilih.php?pesan=oke");



		} else {
		// megalihkan halaman ke halaman data pemilih
			header("location:pemilih_tambah.php?alert=gagal");
		}
	}

}




