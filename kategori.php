<?php include 'header.php'; ?>
<div class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-flat">
        <div class="panel-body">
          <?php
          if(isset($_GET['id'])){
            $id_kategori = $_GET['id'];
            $kategori = mysqli_query($config,"select * from kategori where kategori_id='$id_kategori'");
            $dd = mysqli_fetch_assoc($kategori);
          }else{
            header("location:index.php");
          }
          ?>
          <h3>Kategori : <?php echo $dd['kategori_nama']; ?></h3>
          <br/>
          <?php
          $halaman = 5;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
          $result = mysqli_query($config, "SELECT * FROM posting where posting_kategori='$id_kategori'");
          $total = mysqli_num_rows($result);
          $pages = ceil($total/$halaman);
          $query = mysqli_query($config,"select * from posting where posting_kategori='$id_kategori' order by posting_id desc limit $mulai, $halaman");
          // $query = mysqli_query($config,"select * from posting order by posting_id desc limit $mulai, $halaman");
          // $query = mysqli_query($config,"select * from posting LIMIT $mulai, $halaman");
          $no =$mulai+1;
          while ($d = mysqli_fetch_assoc($query)) {
            ?>
            <div class="row">
              <div class="col-md-3">
                <img style="width: 100%" src="images/posting/<?php echo $d['posting_gambar']; ?>" class="img-responsive">
              </div>
              <div class="col-md-9">
                <a href="posting.php?id=<?php echo $d['posting_id'];?>"><h3 class="no-padding no-margin"><?php echo $d['posting_judul']; ?></h3></a>
                <p class="text-muted">Oleh : <b>Admin</b> | Pada :  <b><?php echo date('d-m-Y',strtotime($d['posting_tanggal'])); ?></b> |
                  Kategori :
                  <b>
                    <?php
                    $kk = $d['posting_kategori'];
                    $kkk = mysqli_query($config, "select * from kategori where kategori_id='$kk'");
                    $kkkk = mysqli_fetch_assoc($kkk);
                    echo $kkkk['kategori_nama'];
                    ?>
                  </b>
                </p>
                <p style="text-align: justify"><?php echo substr($d['posting_deskripsi'],0,200); ?></p>
              </div>
            </div>
            <br/>
            <?php
          }
          ?>
          <?php if($total > $halaman){ ?>
            <div class="">
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
                <a class="btn btn-primary" href="?id=<?php echo $id_kategori; ?>&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>
              </div>
              <?php } ?>
              <Br/>
              <Br/>
              <Br/>
            </div>
          </div>
        </div>
        
        <?php include 'sidebar.php'; ?>
      </div>
    </div>
    <?php include 'footer.php'; ?>