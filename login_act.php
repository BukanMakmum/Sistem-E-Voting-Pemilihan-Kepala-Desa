<?php
// menghubungkan koneksi database
include 'config.php';


// menangkap data username dan password
//$username = $_POST['username'];
//$password = md5($_POST['password']); // mengubah password ke format md5()
//$sebagai = $_POST['sebagai'];

$username = mysqli_real_escape_string($config,$_POST['username']);
$password = mysqli_real_escape_string($config,md5($_POST['password']));
$sebagai = mysqli_real_escape_string($config,$_POST['sebagai']);
//$sebagai = $_POST['sebagai'];

// cek login sebagai apa?
if($sebagai=="admin"){
	// cek jika login sebagai admin
	// query cek username dan password admin
	$cek = mysqli_query($config, "select * from admin where admin_username='$username' and admin_password='$password'");
	// cek apakah tersedia username dan password di atas
	if(mysqli_num_rows($cek) > 0){
	// jika username dan password benar, aktifkan session dan buat session username dan status login
		session_start();
	// ambil data yang login
		$data = mysqli_fetch_assoc($cek);
	// buat session
		$_SESSION['id'] = $data['admin_id'];
		$_SESSION['nama'] = $data['admin_nama'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "admin_login";
	// mengalihkan ke halaman admin
		header("location:admin/");
	}else{
	// jika login gagal, alihkan halaman kembali ke halaman login
		header("location:login.php?alert=gagal");
	}
}else if($sebagai=="panitia"){
	// cek jika login sebagai panitia
	
	// query cek username dan password panitia
	$cek = mysqli_query($config, "select * from panitia where panitia_username='$username' and panitia_password='$password' and panitia_status='aktif'");
	// cek apakah tersedia username dan password di atas
	if(mysqli_num_rows($cek) > 0){
	// jika username dan password benar, aktifkan session dan buat session username dan status login
		session_start();
	// ambil data yang login
		$data = mysqli_fetch_assoc($cek);
	// buat session
		$_SESSION['id'] = $data['panitia_id'];
		$_SESSION['nama'] = $data['panitia_nama'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "panitia_login";
	// mengalihkan ke halaman panitia
		header("location:panitia/");
	}else{
	// jika login gagal, alihkan halaman kembali ke halaman login
		header("location:login.php?alert=gagal");
	}
}else if($sebagai=="pengawas"){
	// cek jika login sebagai pengawas
	// query cek username dan password pengawas
	$cek = mysqli_query($config, "select * from pengawas where pengawas_username='$username' and pengawas_password='$password'");
	// cek apakah tersedia username dan password di atas
	if(mysqli_num_rows($cek) > 0){
	// jika username dan password benar, aktifkan session dan buat session username dan status login
		session_start();
	// ambil data yang login
		$data = mysqli_fetch_assoc($cek);
	// buat session
		$_SESSION['id'] = $data['pengawas_id'];
		$_SESSION['nama'] = $data['pengawas_nama'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "pengawas_login";
	// mengalihkan ke halaman pengawas
		header("location:pengawas/");
	}else{
	// jika login gagal, alihkan halaman kembali ke halaman login
		header("location:login.php?alert=gagal");
	}
}
?>