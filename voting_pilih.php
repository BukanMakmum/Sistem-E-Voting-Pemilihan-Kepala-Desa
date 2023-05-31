<?php include 'header.php';

// cek apakah sudah verivikasi?
// jika sudah verivikasi
if(isset($_SESSION['pemilih_status'])){
  ?>
  <div class="content">
    <div class="panel panel-flat panel-voting">
      <div class="panel-heading">
        <center>
          <img src="images/opsi/logo.png" style="width: 100px">
        </center>
        <?php
      // query untuk mengambil data jadwal voting
        $data = mysqli_query($config,"select * from jadwal_voting");
      // menampilkan data jadwal voting
        while($d=mysqli_fetch_array($data)){
          ?><center>
            <h1>
              <b>SURAT SUARA<br/>PEMILIHAN GEUCHIK GAMPONG BLANG MAJRON<br/>TAHUN <?php echo date('Y',strtotime($d['jv_mulai'])); ?></h4>
                <?php
              }
              ?></b>
            </h1>
          </center>
        </div>
        <div class="panel-body">

          <?php
          $idp = $_SESSION['pemilih_id'];
          $data_pemilih = mysqli_query($config,"select * from pemilih where pemilih_id='$idp'");
          $dp = mysqli_fetch_assoc($data_pemilih);
          ?>
          <div class='alert alert-info text-center text-semibold'>Silahkan tentukan pilihan anda, pilihan anda menentukan masa depan <b>Gampong Kita.</b></div>
          <div class="row">
            <?php
        // query untuk mengambil data geuchik dari table geuchik dengan mengurutkan nomor urut geuchik dari kecil ke besar
            $data = mysqli_query($config,"select * from geuchik order by geuchik_nomor asc");
        // menampilkan data geuchik
            while($d=mysqli_fetch_array($data)){
              ?>
              <div class="col-lg-4 col-md-4">
                <div class="thumbnail">
                  <div class="thumb">
                    <!-- menampilkan foto geuchik -->
                    <img style="height: 320px" src="images/geuchik/<?php echo $d['geuchik_gambar']; ?>" alt="">
                    <div class="caption-overflow">
                      <span>
                        <!-- link coblos, mengirim parameter id geuchik, dan id pemilih -->
                        <a id="voting_pilih_act.php?geuchik=<?php echo $d['geuchik_id'] ?>&pemilih=<?php echo $_SESSION['pemilih_id']; ?>" class="btn bg-success-400 btn-icon btn-danger coblos"><i class="icon-pencil4"></i> COBLOS</a>
                      </span>
                    </div>
                  </div>
                  <div class="caption text-center">
                    <div class="nomor-urut label label-primary label-danger"><?php  echo $d['geuchik_nomor']; ?></div>
                    <br/>
                    <br/>
                    <h5 class="text-semibold no-margin"><strong><?php echo $d['geuchik_nama']; ?></strong></h5>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
          <br/>
          <br/>
          <center>
            <a href="voting_profil.php" class="btn btn-primary">KEMBALI</a>
          </center>
       
      </div>
    </div>

  </div>

  <script type="text/javascript">
    $(".coblos").click(function(){
      var link = $(this).attr('id');
      if(confirm("APAKAH ANDA SUDAH YAKIN DENGAN MEMILIH CALON GEUCHIK INI?") == true) {
        window.location = link;
      } else {
        return false;
      }
    });
  </script>
  <?php
}else{
// jika belum verifikasi
  echo "<div class='alert alert-danger text-center'>Nampaknya anda belum melakukan verifikasi, silahkan verifikasi terlebih dulu di <a href='voting.php'>sini</a></div>";
}
?>
<?php include 'footer.php'; ?>