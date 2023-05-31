<div class="col-md-3">
  <div class="panel panel-flat">
    <div class="panel-body">
      <div class="block-title">
        <span>
          JUMLAH PEMILIH
        </span>
      </div>
      <table class="table table-bordered table-hover table-striped" style="width: 100%">
        <tr>
          <th><b>DPT</th>
            <td>
              <?php
            // mengambil data pemilih DPT
              $a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPT'");
            // menghitung jumlahnya
              $jumlah = mysqli_num_rows($a);
              echo $jumlah;
              ?>
            </td>
          </tr>
          <tr>
            <th><b>DPTb</th>
              <td width="1%">
                <?php
            // mengambil semua data pemilih DPTb
                $a = mysqli_query($config,"select * from pemilih where pemilih_kategori='DPTb'");
            // jumlah // mengambil semua data pemilih DPTb
                $jumlah = mysqli_num_rows($a);
                echo $jumlah;
                ?>
              </td>
            </tr>
          </table>
          <hr/>
          <div class="block-title">
            <span>
              JADWAL VOTING
            </span>
          </div>
          <div class="alert alert-info">
            <?php
        // query untuk mengambil data jadwal voting
            $data = mysqli_query($config,"select * from jadwal_voting");
        // menampilkan data jadwal voting
            while($d=mysqli_fetch_array($data)){
              ?>
              <p><center style="font-size:12px" >Tgl <b><?php echo date('d/m/Y',strtotime($d['jv_mulai'])); ?></b> Jam <b><?php echo date('H:i',strtotime($d['jv_mulai'])); ?></b> WIB
                s/d <p> Jam <b><?php echo date('H:i',strtotime($d['jv_berakhir'])); ?></b> WIB Tgl <b><?php echo date('d/m/Y',strtotime($d['jv_berakhir'])); ?></b></center></p></div>
                <?php
              }
              ?>
              <hr>
              <div class="block-title">
                <span>
                  HASIL VOTING
                </span>
              </div>
              <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <tr>
                  <th><b>Nama Calon Geuchik</th>
                    <th><b>Jumlah Suara</th>
                    </tr>
                    <?php
                    $geuchik = mysqli_query($config,"select * from geuchik");
                    while($g=mysqli_fetch_array($geuchik)){
                      ?>
                      <tr>
                        <td><?php echo $g['geuchik_nama']; ?></td>
                        <td width="1%" class="text-center">
                          <?php
                          date_default_timezone_set("Asia/Jakarta");
                // cek apakah sekarang dalam masa voting atau tidak
                          $cek_tanggal = mysqli_query($config,"select * from jadwal_voting where jv_mulai <= now() and jv_berakhir >= now()");
                          $cek = mysqli_num_rows($cek_tanggal);
                          if($cek > 0){
                            echo "<div>0</div>";
                          }
                          else{
                            $id_g = md5 ($g['geuchik_id']);
                            $gg = mysqli_query($config,"select * from voting where voting_geuchik='$id_g'");
                            echo mysqli_num_rows($gg);
                          }
                          ?>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </table>
                  <hr>
                  <div class="block-title">
                    <span>
                      KATAGORI POSTING
                    </span>
                  </div><br>
                  <?php
                  $kategori = mysqli_query($config,"select * from kategori");
                  while($p=mysqli_fetch_array($kategori)){
                    ?>
                    <a href="kategori.php?id=<?php echo $p['kategori_id']; ?>"><?php echo $p['kategori_nama']; ?></a>
                    <br/>
                    <?php
                  }
                  ?>
                  <hr>
                  <div class="block-title">
                    <span>
                      POSTING LAINYA
                    </span>
                  </div><br>
                  <?php
                  $posting = mysqli_query($config,"select * from posting order by posting_id desc limit 3");
                  while($p=mysqli_fetch_array($posting)){
                    ?>
          <!--  <a href="posting.php?id=<?php echo $p['posting_id']; ?>"><?php echo $p['posting_judul']; ?></a>
          <br/>
          <small class="text-muted"><?php echo date('d-m-Y',strtotime($p['posting_tanggal'])); ?></small>
          <br/> -->
          <div class="row">
            <div class="col-md-3" style="padding: 10px">
              <img style="width: 100%" src="images/posting/<?php echo $p['posting_gambar']; ?>" class="img-responsive">
            </div>
            <div class="col-md-9">
              <a href="posting.php?id=<?php echo $p['posting_id'];?>"><?php echo substr($p['posting_judul'],0,40); ?>...</a><p>
                <small class="text-muted">Posting : <?php echo date('d-m-Y',strtotime($p['posting_tanggal'])); ?></small>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>