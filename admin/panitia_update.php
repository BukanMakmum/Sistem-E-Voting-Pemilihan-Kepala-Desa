<?php
// menghubungkan dengan database
include '../config.php';
// menangkap data yang dikirim dari form edit
$id = $_POST['id'];
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
$a = 0;
$b = 0;
$c = 0;
// cek jika form password di isi atau di kosongkan
if($_POST['password'] == ""){
	// jika form password di kosongkan, maka update data panitia kecuali passwordnya
	mysqli_query($config,"update panitia set panitia_nama='$nama', panitia_jk='$jk', panitia_alamat='$alamat', panitia_agama='$agama', panitia_hp='$hp', panitia_jabatan='$jabatan', panitia_status='$status', panitia_tempat_lahir='$tempat_lahir', panitia_tgl_lahir='$tanggal_lahir' where panitia_id='$id'");
}else{
	// jika tidak, update semua data yang ada pada data panitia ini
	mysqli_query($config,"update panitia set panitia_password='$password', panitia_nama='$nama', panitia_jk='$jk', panitia_alamat='$alamat', panitia_agama='$agama', panitia_hp='$hp', panitia_jabatan='$jabatan', panitia_status='$status', panitia_tempat_lahir='$tempat_lahir', panitia_tgl_lahir='$tanggal_lahir' where panitia_id='$id'");
}
// cek foto
// cek apakah gambar tidak di ganti
	if($_FILES['foto']['name'] != "") {
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
	// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 kemudian di upload
	if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data panitia
		header("location:panitia_edit.php?id=".$id."&alert=gagal");
		$c = 0;
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			$f = $rand . $_FILES["foto"]["name"];
			// query untuk menghapus data panitia yang ber id di atas
			$s=mysqli_query($config,"select * from panitia where panitia_id='$id'");
			$u=mysqli_fetch_array($s);
			unlink("../images/panitia/$u[panitia_gambar]"); //query untuk mengapus gambar di folder tersimpan
			//update data panitia
			mysqli_query($config,"update panitia set panitia_gambar='$f' where panitia_id='$id'");
			$c = 1;
		} else {
			// megalihkan halaman ke halaman data panitia
			header("location:panitia_edit.php?id=".$id."&alert=gagal");
			$c = 0;
		}
	}
} else {
	$c = 1;
}
// cek nik
$x = mysqli_query($config,"select * from panitia where panitia_nik='$nik' and panitia_id not in (select panitia_id from panitia where panitia_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit panitia
	header("location:panitia_edit.php?id=".$id."&alert=nik_sama");
	$a = 0;
}else{
	// query untuk update data nik panitia ke table panitia
	mysqli_query($config,"update panitia set panitia_nik='$nik' where panitia_id='$id'");
	
	$a = 1;
// megalihkan halaman ke halaman data panitia
// header("location:panitia.php");
}
// cek username
$x = mysqli_query($config,"select * from panitia where panitia_username='$username' and panitia_id not in (select panitia_id from panitia where panitia_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit panitia
	header("location:panitia_edit.php?id=".$id."&alert=username_sama");
	$b = 0;
}else{
	// query untuk update data username panitia ke table panitia
	mysqli_query($config,"update panitia set panitia_username='$username' where panitia_id='$id'");
	$b = 1;
}
if($a > 0 && $b > 0 && $c > 0){
	// megalihkan halaman ke halaman data panitia
header("location:panitia.php?pesan=okee");
}