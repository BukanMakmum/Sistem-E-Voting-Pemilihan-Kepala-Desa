<?php
// menghubungkan database
include '../config.php';
// mengaktifkan session
session_start();
// ambil session id
$id = $_SESSION['id'];

$password_lama			= mysqli_real_escape_string($config,md5($_POST['password_lama']));
$password_baru			= mysqli_real_escape_string($config,$_POST['password_baru']);
$konfirmasi_password	= mysqli_real_escape_string($config,$_POST['konfirmasi_password']);

		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
//$password_lama	= md5($password_lama);
$cek = mysqli_query($config,"select * from pengawas where pengawas_password='$password_lama'");

if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 8 karakter
	if(strlen($password_baru) >= 8){
				//jika password baru sudah 8 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
		if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
			$password_baru 	= md5($password_baru);
					//$id		= $_SESSION['admin_id']; //ini dari session saat login

					$update = mysqli_query($config,"update pengawas set pengawas_password='$password_baru' where pengawas_id='$id'");
					// alihkan halaman ke halaman ganti password
					
					if($update){
						//kondisi jika proses query UPDATE berhasil
							header("location:gantipassword.php?pesan=oke");
					}else{
						//kondisi jika proses query gagal
							header("location:gantipassword.php?pesan=gagal");
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
						header("location:gantipassword.php?pesan=tidak_cocok");
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
					header("location:gantipassword.php?pesan=min5");
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
				header("location:gantipassword.php?pesan=t_passlama");
	
}