<?php 
// menghubungkan dengan database
include '../config.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];



// cek apakah gambar tidak di ganti
if($_FILES['gambar']['name'] == "") {
	// query untuk mengupdate atau mengubah data posting tanpa mengubah data gambar
	mysqli_query($config,"update posting set posting_judul='$judul', posting_tanggal='$tanggal', posting_deskripsi='$deskripsi', posting_kategori='$kategori' where posting_id='$id'")or die(mysqli_error());

	header("location:posting.php?pesan=okee");
}else{

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

	// cek jika variabel uploadok sama dengan 0, jika 0 berarti gagak upload, jika 1 kemudian di upload
	if ($uploadOk == 0) {
	// megalihkan halaman ke halaman data posting
		header("location:posting.php?alert=gagal");
	} else {
		if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {

			$f = $rand . $_FILES["gambar"]["name"];
			// query hapus posting
			$x=mysqli_query($config,"select * from posting where posting_id='$id'");
			$u=mysqli_fetch_array($x);
			unlink("../images/posting/$u[posting_gambar]"); //query untuk mengapus gambar di folder tersimpan

			// query untuk mengupdate atau mengubah data posting tanpa mengubah data gambar
			mysqli_query($config,"update posting set posting_judul='$judul', posting_tanggal='$tanggal', posting_deskripsi='$deskripsi', posting_gambar='$f', posting_kategori='$kategori' where posting_id='$id'")or die(mysqli_error());

			// megalihkan halaman ke halaman data posting
			header("location:posting.php?pesan=okee");

		} else {
			// megalihkan halaman ke halaman data posting
			header("location:posting.php?alert=gagal");
		}
	}

}



