<?php include 'header.php'; ?>


<?php 
session_destroy();
?>

<div class="content">

  <div class="panel panel-flat panel-voting">
    <div class="backgroudx2">
      <div class="panel-heading">
        <center>
          <h1>
            VERIFIKASI PEMILIH
          </h1>
        </center> 
      </div>
      <div class="panel-body">
        <br/>
        <br/>
        

        <?php 
      // setting time zone indonesia
        date_default_timezone_set("Asia/Jakarta");

      // cek apakah sekarang dalam masa voting atau tidak
        $cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");

        $cek = mysqli_num_rows($cek_tanggal);
        
      // jika dalam masa voting
        if($cek > 0){
          ?>

          <div class="row">
            <div class="col-md-8 col-md-offset-2">

              <?php 
            // membuat pesan notifikasi
              if(isset($_GET['alert'])){
              // jika parameter alert sama dengan gagal
                if($_GET['alert']=="gagal"){
                  echo "<div class='alert alert-danger text-center'><b>Verifikasi gagal!</b> data tidak sesuai.</div>";
                }else if($_GET['alert']=="sudah_memilih"){
                // jika parameter alert sama dengan "sudah memilih"
                  echo "<div class='alert alert-danger text-center'><b>Maaf anda sudah memilih.</b> Setiap pemilih hanya boleh memilih sekali.</div>";                
                }
              }else{
              // jika tidak ada parameter alert
                echo "<div class='alert alert-info text-center'>Masukkan <strong>username </strong>pemilih dan <strong>sidik jari </strong> untuk memverifikasi data diri pemilih</div>";
              }
              ?>

              <form action="voting_login_act.php" method="post">
                <table class="table table-bordered">
                  <tr class="active text-center">
                    <th width="25%" class="text-center">USERNAME PEMILIH</th>
                    <td>
                      <input type="text" class="form-control" name="username" required="required" autocomplete="off" placeholder="Masukkan username pemilih anda ..">                    
                    </td>
                    <td width="1%"><input type="submit" value="VERIFIKASI" class="btn btn-primary btn-sm"></td>
                  </tr>                      
                </table>
              </form>

            </div>
          </div>

          <?php
      // jika bukan dalam masa voting
        }else{
          ?>

          <div class="alert alert-warning">
            <center>
              <h3><b>MAAF ! BELUM WAKTUNYA MEMILIH.</b> <Br/> SILAHKAN LIHAT JADWAL PADA MENU <a href="jadwal.php"><span>JADWAL VOTING.</span></a></h3>
            </center>

          </div>

          <?php
        }
        ?>


      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>