<?php include 'header.php'; ?>
<div class="content">
  <div class="panel panel-flat">
    <!--<div class="backgroudx1">-->
      <div class="panel-heading">
        <h4 class="panel-title">AGENDA KEGIATAN</h4>
        <div class="heading-elements">
          <a href="agenda_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
        </div>
      </div>
      <div class="panel-body">
        <br/>
        <br/>
        <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan']=="oke"){
            echo "<div class='alert alert-info'><b>AGENDA BERHASIL</b> di edit.</div>";
          }
          if($_GET['pesan']=="okee"){
            echo "<div class='alert alert-info'><b>AGENDA BERHASIL</b> di tambah.</div>";
          }
          if($_GET['pesan']=="hapus"){
            echo "<div class='alert alert-info'><b>AGENDA BERHASIL</b> di hapus.</div>";
          }
        }
        ?>
        <div class="table-responsive">
          <!-- table geuchik -->
          <table class="table table-bordered table-hover table-striped table-datatable">
            <thead>
              <tr>
                <th width="1%" class="text-center">No.</th>
                <th width="15%" class="text-center">Mulai</th>
                <th width="15%" class="text-center">Selesai</th>
                <th class="text-center">Kegiatan</th>
                <th class="text-center">Tempat</th>
                <th width="12%" class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
            // nomor urut di awali dari nomor 1
              $no = 1;
            // query untuk mengambil data geuchik dari table geuchik dengan mengurutkan nomor urut geuchik dari kecil ke besar
              $data = mysqli_query($config,"select * from agenda");
            // menampilkan data geuchik
              while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-right"><?php echo date('d-m-Y    H:i:s',strtotime ($d['agenda_jdw_mulai']));?></td>
                  <td class="text-right"><?php echo date('d-m-Y    H:i:s',strtotime ($d['agenda_jdw_selesai']));?></td>
                  <td class="text-justify"><?php echo $d['agenda_ket'] ?></td>
                  <td class="text-justify"><?php echo $d['agenda_tmp'] ?></td>
                  <td>             
                    <a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="agenda_edit.php?id=<?php echo $d['agenda_id'];?>"><i class="icon-wrench3"></i></a>

                    <a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['agenda_ket']; ?>" id="agenda_hapus.php?id=<?php echo $d['agenda_id'];?>"><i class="icon-trash-alt"></i></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('body').on('click','.btn-hapus',function(){
    var nama = $(this).attr('nama');
    var url = $(this).attr('id');
    if(confirm("Apakah anda yakin ingin menghapus agenda "+nama+" ??")){
      window.location = url;      
    }else{
      alert('Penghapusan dibatalkan');
    }
    
  });
</script>
  <?php include 'footer.php'; ?>