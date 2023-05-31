<?php include 'header.php'; ?>
<div class="content">
  <div class="panel panel-flat">
    <div class="backgroudx1">
      <div class="panel-heading">
        <center>
        <h1>
        JADWAL VOTING
        </h1>
        </center>
      </div>
      <div class="panel-body">
        <center>
        <?php
        // query untuk mengambil data jadwal voting
        $data = mysqli_query($config,"select * from jadwal_voting");
        // menampilkan data jadwal voting
        while($d=mysqli_fetch_array($data)){
        ?>
        Voting pemilihan geuchik yang baru akan di mulai pada Jam <b><?php echo date('H:i',strtotime($d['jv_mulai'])); ?></b> WIB Tanggal <b><?php echo date('d/m/Y',strtotime($d['jv_mulai'])); ?></b>
        dan akan berakhir pada Jam <b><?php echo date('H:i',strtotime($d['jv_berakhir'])); ?></b> WIB tanggal <b><?php echo date('d/m/Y',strtotime($d['jv_berakhir'])); ?></b>
        <?php
        }
        ?>
        
        <h6> atau akan dimulai dalam hitungan mundur :</h6> </center>
        <div class="col-md-4 "></div>
        <div class="col-md-8 ">
          <?php
          // query untuk mengambil data jadwal voting
          $datax = mysqli_query($config,"select * from jadwal_voting");
          // menampilkan data jadwal voting
          $dx=mysqli_fetch_assoc($datax);
          ?>
          <?php
          $awal  = date_create();
          $akhir = date_create($dx['jv_mulai']);
          // waktu sekarang
          $diff  = date_diff( $awal, $akhir );
          // echo $diff->invert;
          ?>
          <?php
          if ($diff->invert == 1) { //if 1 then difference will in minus other wise inplus
          echo "<div class='alert alert-primary fade in'><center><h5>Hitungan Waktu Mundur telah berlalu </p><strong> SEKARANG WAKTUNYA VOTING/MASA VOTINGNYA TELAH BERAKHIR!</strong><center></h5></div>";
          
          }else{
          echo '<div id="timer"></div>';
          }
          ?>
          <script type="text/javascript">
          $(document).ready(function() {
          /** Membuat Waktu Mulai Hitung Mundur Dengan
          * var detik = 0,
          * var menit = 1,
          * var jam = 1
          */
          var detik = <?php echo $diff->s; ?>;
          var menit = <?php echo $diff->i; ?>;
          var jam   = <?php echo $diff->h; ?>;
          var hari  = <?php echo $diff->d; ?>;
          /**
          * Membuat function hitung() sebagai Penghitungan Waktu
          */
          function hitung() {
          /** setTimout(hitung, 1000) digunakan untuk
          * mengulang atau merefresh halaman selama 1000 (1 detik)
          */
          setTimeout(hitung, 1000);
          /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
          if(menit < 5 && jam == 0){
          var peringatan = 'style="color:red"';
          };
          /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
          $('#timer').html(
          '<h1 id="fontsforweb_fontid_1091" style="font-size: 35px" align="center" class="alert alert-danger"'+peringatan+'>' + hari + " Hari : " + jam + ' Jam : ' + menit + ' Menit : ' + detik + ' Detik</h1>'
          );
          /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
          detik --;
          /** Jika var detik < 0
          * var detik akan dikembalikan ke 59
          * Menit akan Berkurang 1
          */
          if(detik < 0) {
          detik = 59;
          menit --;
          /** Jika menit < 0
          * Maka menit akan dikembali ke 59
          * Jam akan Berkurang 1
          */
          if(menit < 0) {
          menit = 59;
          jam --;
          /** Jika var jam < 0
          * clearInterval() Memberhentikan Interval dan submit secara otomatis
          */
          if(jam < 0) {
          jam = 59;
          hari --;
          if(hari < 0) {
          clearInterval();
          }
          }
          }
          }
          if(hari<0){
          $("#timer").html("<div class='alert alert-success fade in'><center><h5>Hitungan Waktu Mundur berakhir sekarang <strong>WAKTUNYA VOTING!</strong><center></h5></div>");
          $(".waktuku").hide();
          clearInterval();
          }
          }
          /** Menjalankan Function Hitung Waktu Mundur */
          hitung();
          });
          // ]]>
          </script>
          <center><h6>Sebelum voting dimulai atau berakhir  <a href="pemilih.php"><b>Pastikan Anda Sudah Terdaftar</b></a> dan <a href="pemilih.php"><b>Memilih!!</b></h6></a></center></div></div>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>