<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form edit
$id = $_POST['id'];
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

$d = 0;
$e = 0;
$c = 0;


	//update data pemilih
mysqli_query($config,"update pemilih set pemilih_nama='$nama', pemilih_tempat_lahir='$tempat_lahir', pemilih_tgl_lahir='$tanggal_lahir', pemilih_jk='$jk', pemilih_alamat='$alamat', pemilih_agama='$agama', pemilih_status_kawin='$status_kawin', pemilih_pekerjaan='$pekerjaan', pemilih_kategori='$kategori', pemilih_kk='$kk', pemilih_umur='$umur' where pemilih_id='$id'");



// cek foto
// cek apakah gambar tidak di ganti
if($_FILES['foto']['name'] != "") {	

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

	// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 kemudian di upload
	if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data pemilih
		header("location:pemilih_edit.php?id=".$id."&alert=gagal");
		$c = 0;
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

			$f = $rand . $_FILES["foto"]["name"];
			$s=mysqli_query($config,"select * from pemilih where pemilih_id='$id'");
			$u=mysqli_fetch_array($s);
			unlink("../images/pemilih/$u[pemilih_foto]"); //query untuk mengapus gambar di folder tersimpan

			//update data pemilih
			mysqli_query($config,"update pemilih set pemilih_foto='$f' where pemilih_id='$id'");

			$c = 1;

		} else {
			// megalihkan halaman ke halaman data pemilih
			header("location:pemilih_edit.php?id=".$id."&alert=gagal");
			$c = 0;
		}
	}

} else {
	$c = 1;
}



// cek nik
$x = mysqli_query($config,"select * from pemilih where pemilih_nik='$nik' and pemilih_id not in (select pemilih_id from pemilih where pemilih_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit pemilih
	header("location:pemilih_edit.php?id=".$id."&alert=nik_sama");
	$d = 0;
}else{

	// query untuk update data nik pemilih ke table pemilih
	mysqli_query($config,"update pemilih set pemilih_nik='$nik' where pemilih_id='$id'");

	
	$d = 1;
// megalihkan halaman ke halaman data pemilih
// header("location:pemilih.php");

}

// cek username
$x = mysqli_query($config,"select * from pemilih where pemilih_username='$username' and pemilih_id not in (select pemilih_id from pemilih where pemilih_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit pemilih
	header("location:pemilih_edit.php?id=".$id."&alert=username_sama");
	$e = 0;
}else{

	// query untuk update data username pemilih ke table pemilih
	mysqli_query($config,"update pemilih set pemilih_username='$username' where pemilih_id='$id'");

	$e = 1;


}

if($d > 0 && $e > 0 && $c > 0){
	// megalihkan halaman ke halaman data pemilih
	header("location:pemilih.php?pesan=okee");

}