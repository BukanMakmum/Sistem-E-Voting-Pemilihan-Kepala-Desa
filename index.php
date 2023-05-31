<?php include 'header.php'; ?>
<div class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-flat">
        <div class="panel-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              <li data-target="#carousel-example-generic" data-slide-to="5"></li>
              <li data-target="#carousel-example-generic" data-slide-to="6"></li>
              <li data-target="#carousel-example-generic" data-slide-to="7"></li>
              <li data-target="#carousel-example-generic" data-slide-to="8"></li>
              <li data-target="#carousel-example-generic" data-slide-to="9"></li>
              <li data-target="#carousel-example-generic" data-slide-to="10"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/slider/1.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/2.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/3.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/4.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/5.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/6.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/7.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/8.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/9.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
              <div class="item">
                <img src="images/slider/10.png">
                <div class="carousel-caption">
                  
                </div>
              </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <br/>
          <div class="block-title">
            <span>
              POSTING TERBARU
            </span>
          </div>
          <br/>
          <?php
          $halaman = 3;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
          $result = mysqli_query($config, "SELECT * FROM posting");
          $total = mysqli_num_rows($result);
          $pages = ceil($total/$halaman);
          $query = mysqli_query($config,"select * from posting order by posting_id desc limit $mulai, $halaman");
          // $query = mysqli_query($config,"select * from posting LIMIT $mulai, $halaman");
          $no =$mulai+1;
          while ($d = mysqli_fetch_assoc($query)) {
          ?>
          <div class="row">
            <div class="col-md-3">
              <img style="width: 100%" src="images/posting/<?php echo $d['posting_gambar']; ?>" class="img-responsive">
            </div>
            <div class="col-md-9">
              <a href="posting.php?id=<?php echo $d['posting_id'];?>"><h3 class="no-padding no-margin"><?php echo substr($d['posting_judul'],0,60); ?>...</h3></a>
              <p class="text-muted">Diposkan oleh : <b>Admin</b> | Pada :  <b><?php echo date('d-m-Y',strtotime($d['posting_tanggal'])); ?></b> |
                Kategori :               <b>
                <?php
                $kk = $d['posting_kategori'];
                $kkk = mysqli_query($config, "select * from kategori where kategori_id='$kk'");
                $kkkk = mysqli_fetch_assoc($kkk);
                echo $kkkk['kategori_nama'];
                ?>
                </b>
              </p>
              <p style="text-align: justify"><?php echo substr($d['posting_deskripsi'],0,200); ?><a href="posting.php?id=<?php echo $d['posting_id'];?>"> (Read More....)</p></a>
            </div>
          </div>
          <br/>
          <?php
          }
          ?>
          <hr>
          <div class="center">
            <?php if($total > $halaman){ ?>
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <div class="pagination">
              <a href="?halaman=<?php  echo $i; ?>"><?php echo $i; ?></a></div>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>