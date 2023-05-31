<?php include 'header.php';
// cek apakah sudah verivikasi?
// jika sudah verivikasi
if(isset($_SESSION['pemilih_status'])){
?>
<!-- Content area -->
<div class="content">
  <!-- Traffic sources -->
  <div class="panel panel-flat">
    <div class="backgroudx3">
      <div class="panel-heading">
        <!-- <h6 class="panel-title">Halaman Utama</h6> -->
      </div>
      <div class="panel-body">
        <?php
        // cek apakah sudah verivikasi?
        // jika sudah verivikasi
        if(isset($_SESSION['pemilih_status'])){
        ?>
        <br/>
        
        
        <div class="col-md-5 "></div>
        <div class="col-md-7 ">
          <center>
          <div class='alert alert-info text-center'><h4>
            TERIMA KASIH <p/>TELAH BERKONTRIBUSI DALAM E-PILKADES BERBASIS WEB.
              </h4>
            <h6>SEMOGA PILIHAN ANDA DAPAT MEBANGUN GAMPONG BLANG MAJRON <p/>MENJADI LEBIH BAIK</h6></div>
            <br/>
            <br/>
            <br/>
           	<a href="voting_selesai_act.php" class="btn btn-success btn-lg">SELESAI</a>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            </center>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <!-- /traffic sources -->
      
    </div>
    <!-- /content area -->
    <?php
    }else{
    // jika belum verifikasi
    echo "<div class='alert alert-danger text-center'>Nampaknya anda belum melakukan verifikasi, silahkan verifikasi terlebih dulu di <a href='voting.php'>sini</a></div>";
    }
    ?>
    <?php include 'footer.php'; ?>