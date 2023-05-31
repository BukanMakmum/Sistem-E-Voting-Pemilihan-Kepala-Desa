<?php 
// menghubungkan koneksi database
include 'config.php';

// tangkap data username
$username = $_GET['username'];

// cek apakah ada username ada dalam tabel pemilih ?
$cek = mysqli_query($config, "select * from pemilih where pemilih_id='$username'");

// jika ada
if(mysqli_num_rows($cek) > 0){

    session_start();
    // ambil data yang pemilih yang login
    $data = mysqli_fetch_assoc($cek);
    // id pemilih
    $id_pemilih = $data['pemilih_id'];

    // cek apakah pemilih sudah pernah memilih?
    $cek_sudah_memilih = mysqli_query($config,"select * from voting where voting_pemilih='$id_pemilih'");
    $csm = mysqli_num_rows($cek_sudah_memilih);

    // jika sudah pernah
    if($csm > 0){
        // alihkan halaman kembali ke halaman verifikasi pemilih sambil mengirim parameter "sudah_memilih"
       header("location:voting.php?alert=sudah_memilih");

    // jika belum pernah
   }else{
          // buat session
    $_SESSION['pemilih_id'] = $data['pemilih_id'];
    $_SESSION['pemilih_nama'] = $data['pemilih_nama'];

    $_SESSION['pemilih_username'] = $username;
    $_SESSION['pemilih_status'] = "pemilih_login";

        // mengalihkan ke halaman pilih geuchik
        // header("location:voting_pilih.php");

    header ("location:voting_profil.php");
}    

// jika tidak
}else{
    // alihkan halaman kembali ke halaman verivikasi pemilih lagi sambil mengirim parameter gagal
    header("location:voting.php?alert=gagal");
}

?>