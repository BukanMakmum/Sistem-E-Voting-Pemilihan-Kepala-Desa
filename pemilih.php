<?php include 'header.php'; ?>

<div class="content">
  <div class="panel panel-flat">
    <div class="backgroudx">
      <div class="panel-heading">
        <center>
          <h1>
            CEK APAKAH ANDA SUDAH TERDAFTAR ATAU BELUM!
          </h1>
        </center>
      </div>
      <div class="panel-body">
        <Br/>
        <Br/>
        <Br/>
        <Br/>
        <Br/>
        <Br/>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">


            <?php 
            if(isset($_GET['alert'])){
              if($_GET['alert']=="terdaftar"){
                echo "<div class='alert alert-success'>Anda sudah terdaftar. dan telah melakukan registrasi sidik jari.</div>";
              }else if($_GET['alert']=="belum_terdaftar"){
                echo "<div class='alert alert-danger'>Anda belum terdaftar.</div>";
              }else if($_GET['alert']=="belum_sidik"){
                echo "<div class='alert alert-warning'>Anda sudah terdaftar. tapi belum melakukan registrasi sidik jari. silahkan jumpai panitia.</div>";
              }
            }
            ?>
            <form action="pemilih_cek.php" method="post">
              <table class="table table-bordered border-danger">
                <tr class="active text-center">
                  <th class="text-center">NIK</th>
                  <td><input type="text" name="nik" required="required" class="form-control" placeholder="Masukkan nomor NIK anda .." placeholder="off"></td>
                  <td><input type="submit" value="CEK" class="btn btn-primary"></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <p/>
      </div>
    </div>



  </div>


  <?php include 'footer.php'; ?>