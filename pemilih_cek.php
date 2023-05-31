<?php 

include 'config.php';

$nik = mysqli_real_escape_string($config,$_POST['nik']);

$cek = mysqli_query($config,"select * from pemilih where pemilih_nik='$nik'");

if(mysqli_num_rows($cek)>0){
	$data = mysqli_fetch_assoc($cek);
	$id_pemilih = mysqli_real_escape_string ($config,$data['pemilih_id']);

	$cek_sidik = mysqli_query($config,"select * from demo_finger where user_id='$id_pemilih'");
	if(mysqli_num_rows($cek_sidik)>0){
		header("location:pemilih.php?alert=terdaftar");		
	}else{
		header("location:pemilih.php?alert=belum_sidik");				
	}
}else{
	header("location:pemilih.php?alert=belum_terdaftar");	
}

?>