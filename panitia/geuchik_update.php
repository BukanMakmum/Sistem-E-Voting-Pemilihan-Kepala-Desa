<?php
// menghubungkan dengan database
include '../config.php';
// menangkap data yang dikirim dari form
$id = $_POST['id'];
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
	// query untuk mengupdate atau mengubah data geuchik tanpa mengubah data foto
mysqli_query($config,"update geuchik set geuchik_nama='$nama', geuchik_tempat_lahir='$tempat_lahir', geuchik_tgl_lahir='$tanggal_lahir', geuchik_jk='$jk', geuchik_alamat='$alamat', geuchik_agama='$agama', geuchik_visi='$visi', geuchik_misi='$misi', geuchik_tentang='$tentang', geuchik_saksi='$saksi' where geuchik_id='$id'")or die(mysqli_error());
// cek foto
// cek apakah gambar tidak di ganti
if($_FILES['foto']['name'] != "") {
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
	// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 kemudian di upload
	if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data geuchik
		header("location:geuchik_edit.php?id=".$id."&alert=gagal");
		$c = 0;
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			$f = $rand . $_FILES["foto"]["name"];
			$x=mysqli_query($config,"select * from geuchik where geuchik_id='$id'");
			$u=mysqli_fetch_array($x);
unlink("../images/geuchik/$u[geuchik_gambar]"); //query untuk mengapus gambar di folder tersimpan
			//update data geuchik
mysqli_query($config,"update geuchik set geuchik_gambar='$f' where geuchik_id='$id'");
$c = 1;
} else {
			// megalihkan halaman ke halaman data geuchik
	header("location:geuchik_edit.php?id=".$id."&alert=gagal");
	$c = 0;
}
}
} else {
	$c = 1;
}
// cek nik
$x = mysqli_query($config,"select * from geuchik where geuchik_nik='$nik' and geuchik_id not in (select geuchik_id from geuchik where geuchik_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit geuchik
	header("location:geuchik_edit.php?id=".$id."&alert=nik_sama");
	$d = 0;
}else{
	// query untuk update data nik geuchik ke table geuchik
	mysqli_query($config,"update geuchik set geuchik_nik='$nik' where geuchik_id='$id'");
	
	$d = 1;
// megalihkan halaman ke halaman data geuchik
// header("location:geuchik.php");
}
// cek no urut
$x = mysqli_query($config,"select * from geuchik where geuchik_nomor='$nomor' and geuchik_id not in (select geuchik_id from geuchik where geuchik_id='$id')");
if(mysqli_num_rows($x)>0){
	// megalihkan halaman ke halaman edit geuchik
	header("location:geuchik_edit.php?id=".$id."&alert=nourut_sama");
	$e = 0;
}else{
	// query untuk update data username pemilih ke table geuchik
	mysqli_query($config,"update geuchik set geuchik_nomor='$nomor' where geuchik_id='$id'");
	$e = 1;
}
if($c > 0 && $d > 0 && $e > 0){
	// megalihkan halaman ke halaman data pemilih
	header("location:geuchik.php?pesan=oke");
}