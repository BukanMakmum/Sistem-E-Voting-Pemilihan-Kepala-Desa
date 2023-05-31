<?php include 'header.php'; ?>
<div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <center>
      <h1>
      DATA CALON GEUCHIK
      </h1>
      </center>
    </div>
    <div class="panel-body">
      <br/>
      <br/>
      <div class="table-responsive">
        <!-- table geuchik -->
        <table class="table table-bordered table-hover table-striped table-datatable">
          <thead>
            <tr>
              <th width="1%" class="text-center">No.Urut</th>
              <th class="text-center">Nama Lengkap</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Agama</th>
              <th width="1%" class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // nomor urut di awali dari nomor 1
            $no = 1;
            // query untuk mengambil data geuchik dari table geuchik dengan mengurutkan nomor urut geuchik dari kecil ke besar
            $data = mysqli_query($config,"select * from geuchik order by geuchik_nomor asc");
            // menampilkan data geuchik
            while($d=mysqli_fetch_array($data)){
            ?>
            <tr>
              <td class="text-center"><?php echo $d['geuchik_nomor'] ?></td>
              <td><?php echo $d['geuchik_nama'] ?></td>
              <td class="text-center"><?php echo $d['geuchik_jk'] ?></td>
              <td class="text-center"><?php echo $d['geuchik_agama'] ?></td>
              <td>
                <a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="geuchik_detail.php?id=<?php echo $d['geuchik_id'];?>"><i class="icon-search4"></i> DATA LENGKAP</a>
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
<?php include 'footer.php'; ?>