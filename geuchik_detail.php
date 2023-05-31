<?php include 'header.php'; ?>
<div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <center>
      <h1>
      BIODATA CALON GEUCHIK
      </h1>
      </center>
    </div>
    <div class="panel-body">
      <a href="geuchik.php" class="btn sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
      <br/>
      <br/>
      <div class="table-responsive">
        <?php
        // menangkap id data yang ingin di edit
        $id = $_GET['id'];
        // query untuk mengambil data geuchik yang ber id di atas (yang di pilih)
        $data = mysqli_query($config,"select * from geuchik where geuchik_id='$id'");
        // menampilkan data yang di dapatkan dari query di atas
        while($d=mysqli_fetch_array($data)){
        ?>
        <div class="row">
          <div class="col-md-3">
            <img style="width: 260px;height: 270px" src="images/geuchik/<?php echo $d['geuchik_gambar']; ?>" class="img-thumbnail">
          </div>
          <div class="col-md-9">
            <div>
              <table class="table table-striped">
                <tr>
                  <th width="20%">No.Urut</th>
                  <td>
                    <?php echo $d['geuchik_nomor']; ?>
                  </td>
                </tr>
                <tr>
                  <th width="20%">NIK</th>
                  <td><?php echo substr($d['geuchik_nik'], 0, 12) ?>****</td>
                </tr>
                <tr>
                  <th width="20%">Nama Lengkap</th>
                  <td><?php echo $d['geuchik_nama']; ?></td>
                </tr>
                <tr>
                  <th width="20%">Tempat Lahir</th>
                  <td><?php echo $d['geuchik_tempat_lahir']; ?></td>
                </tr>
                <tr>
                  <th width="20%">Tanggal Lahir</th>
                  <td><?php echo date('d F Y',strtotime($d['geuchik_tgl_lahir'])); ?></td>
                </tr>
                <tr>
                  <th width="20%">Umur</th>
                  <td><?php echo date('Y') - date('Y',strtotime($d['geuchik_tgl_lahir'])); ?> Tahun</td>
                </tr>
                <tr>
                  <th width="20%">Jenis Kelamin</th>
                  <td><?php echo $d['geuchik_jk']; ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>
                    <?php echo $d['geuchik_alamat']; ?>
                  </td>
                </tr>
                <tr>
                  <th width="20%">Agama</th>
                  <td>
                    <?php echo $d['geuchik_agama']; ?>
                  </td>
                </tr>
                <tr>
                  <th>Visi</th>
                  <td class="text-justify">
                    <?php echo $d['geuchik_visi']; ?>
                  </td>
                </tr>
                <tr>
                  <th>Misi</th>
                  <td class="text-justify">
                    <?php echo $d['geuchik_misi']; ?>
                  </td>
                </tr>
                <tr>
                  <th>Tentang</th>
                  <td class="text-justify">
                    <?php echo $d['geuchik_tentang']; ?>
                  </td>
                </tr>
                <tr>
                  <th>Nama Saksi</th>
                  <td>
                    <?php echo $d['geuchik_saksi']; ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>