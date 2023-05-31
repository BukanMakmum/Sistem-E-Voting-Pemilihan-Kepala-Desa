<?php
include 'include/global.php';
include 'include/function.php';



$username = $_POST['username'];
$data = mysqli_query($GLOBALS["___mysqli_ston"], "select * from pemilih where pemilih_username='$username'");

$jumlah = mysqli_num_rows($data);


if($jumlah>0){
	$d = mysqli_fetch_assoc($data);
	$id_pemilih = $d['pemilih_id'];


	$value = base64_encode($base_path."verification.php?pemilih_id=".$id_pemilih);

	header("location:finspot:FingerspotVer;$value");
	
	// session_start();

	// $_SESSION['pemilih_id'] = $d['pemilih_id'];
	// $_SESSION['pemilih_nama'] = $d['pemilih_nama'];

	// $_SESSION['pemilih_username'] = $username;
	// $_SESSION['pemilih_status'] = "pemilih_login";
	// header("location:voting_profil.php");	

}else{
	header("location:voting.php?alert=gagal");	
}



?>



