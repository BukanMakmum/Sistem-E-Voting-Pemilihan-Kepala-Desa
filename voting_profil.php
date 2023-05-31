<?php include 'header.php';

// cek apakah sudah verivikasi?
// jika sudah verivikasi
if(isset($_SESSION['pemilih_status'])){
?>
<div class="content">
  <div class="panel panel-flat panel-voting">
    <div class="panel-heading">
      <center>
      <h1>
      PROFIL ANDA
      </h1>
      </center>
    </div>
    <div class="panel-body">
      <br>
      <?php
      $idp = $_SESSION['pemilih_id'];
      $data_pemilih = mysqli_query($config,"select * from pemilih where pemilih_id='$idp'");
      $dp = mysqli_fetch_assoc($data_pemilih);
      ?>
      
      <div class="row">
        <div class="col-md-3">
          <img style="width: 270px;height: 270px"src="images/pemilih/<?php echo $dp['pemilih_foto']; ?>" class="img-thumbnail">
        </div>
        <div class="col-md-4">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="40%">Nomor KK</th>
              <td><?php echo $dp['pemilih_kk']; ?></td>
            </tr>
            <tr>
              <th width="40%">NIK</th>
              <td><?php echo $dp['pemilih_nik']; ?></td>
            </tr>
            <tr>
              <th width="40%">Nama Lengkap</th>
              <td><?php echo $dp['pemilih_nama']; ?></td>
            </tr>
            <tr>
              <th width="40%">Tempat Lahir</th>
              <td><?php echo $dp['pemilih_tempat_lahir']; ?></td>
            </tr>
            <tr>
              <th width="40%">Tanggal Lahir</th>
              <td><?php echo date('d F Y',strtotime($dp['pemilih_tgl_lahir'])); ?></td>
            </tr>
            <tr>
              <th width="20%">Umur</th>
              <td><?php echo date('Y') - date('Y',strtotime($dp['pemilih_tgl_lahir'])); ?> Tahun</td>
            </tr>
            
          </table>
        </div>
        <div class="col-md-5">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="30%">Jenis Kelamin</th>
              <td><?php echo $dp['pemilih_jk']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>
                <?php echo $dp['pemilih_alamat']; ?>
              </td>
            </tr>
            <tr>
              <th width="40%">Agama</th>
              <td>
                <?php echo $dp['pemilih_agama'];?>
              </td>
            </tr>
            <tr>
              <th width="40%">Status Kawin</th>
              <td>
                <?php echo $dp['pemilih_status_kawin'];?>
              </td>
            </tr>
            <tr>
              <th width="40%">Pekerjaan</th>
              <td>
                <?php echo $dp['pemilih_pekerjaan'];?>
              </td>
            </tr>
            <tr>
              <th width="40%">Kategori Pemilih</th>
              <td>
                <?php echo $dp['pemilih_kategori'];?>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <br/>
      <br/>
      <center>
      <a href="voting_pilih.php" class="btn btn-primary btn-danger">LANJUT VOTING</a>
      </center>
   
    </div>
  </div>
</div>
<?php
}else{
// jika belum verifikasi
echo "<div class='alert alert-danger text-center'>Nampaknya anda belum melakukan verifikasi, silahkan verifikasi terlebih dulu di <a href='voting.php'>sini</a></div>";
}
?>
<?php include 'footer.php'; ?>