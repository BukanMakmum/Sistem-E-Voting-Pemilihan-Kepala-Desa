<?php include 'header.php'; ?>

<div class="content">


 <div class="row">
   <div class="col-md-9">
    <div class="panel panel-flat">
      <div class="panel-heading">

      </div>
      <div class="panel-body">        

        <div class="row">

          <?php                  
          $id = mysqli_real_escape_string($config,$_GET['id']);
         // query untuk mengambil data posting dari table posting
          $data = mysqli_query($config,"select * from posting,kategori where posting_kategori=kategori_id and posting_id='$id'");
                  // menampilkan data posting   
          while($d=mysqli_fetch_array($data)){
            ?>
            <div class="col-md-12">
              <h1 class="no-padding no-margin"><?php echo $d['posting_judul']; ?></h1>              
              <p class="text-muted">Diposkan oleh : <b>Admin</b> | Pada :  <b><?php echo date('d-m-Y',strtotime($d['posting_tanggal'])); ?></b> Kategori :  <b><?php echo $d['kategori_nama']; ?></b></p>
            </div>
            <div class="col-md-12">
              <div class="thumbnail">
                <img style="width: 100%" src="images/posting/<?php echo $d['posting_gambar']; ?>" class="img-responsive">
              </div>
            </div>   
            <div class="col-md-12">
              <br/>
              <p style="text-align: justify"><?php echo $d['posting_deskripsi']; ?></p>
            </div>        
            <?php
          }
          ?>
        </div>
        <br><hr>

        <!-- Button Share -->

        <!-- Twitter -->
        <a href="http://twitter.com/share?url=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn twitter">
         <i class="fa fa-twitter"></i>
       </a>

       <!-- Google Plus -->
       <a href="https://plus.google.com/share?url=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn google-plus">
         <i class="fa fa-google-plus"></i>
       </a>

       <!-- Facebook -->
       <a href="http://www.facebook.com/share?url=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn facebook">
         <i class="fa fa-facebook"></i>
       </a>

       <!-- LinkedIn -->
       <a href="http://www.linkedin.com/share?url=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn linkedin">
         <i class="fa fa-linkedin"></i>
       </a>

       <!-- LinkedIn -->
       <a href="http://pinterest.com/pin/create/button/?url=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn pinterest">
         <i class="fa fa-pinterest"></i>
       </a>

       <!-- Email -->
       <a href="mailto:?subject=HMTL%20Share%20Buttons&body=posting.php?id=<?php echo $d['posting_id'];?>" target="_blank" class="share-btn email">
         <i class="fa fa-envelope"></i>
       </a>


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