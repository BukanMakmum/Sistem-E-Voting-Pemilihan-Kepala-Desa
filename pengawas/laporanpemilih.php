<?php include 'header.php'; ?>

<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">LAPORAN PEMILIH</h4>
						</div>
							<div class="panel-body">
						<table>
							<tr>
								<th>KABUPATEN&nbsp;</th>
								<th>&nbsp;:&nbsp;</th>
								<th>&nbsp;ACEH UTARA</th>
							</tr>
							<tr>
								<th>KECAMATAN&nbsp;</th>
								<th>&nbsp;:&nbsp;</th>
								<th>&nbsp;SYAMTALIRA BAYU</th>
							</tr>
							<tr>
								<th>GAMPONG&nbsp;</th>
								<th>&nbsp;:&nbsp;</th>
								<th>&nbsp;BLANG MAJRON</th>
							</tr>
						</table>
						</div>
					<div>
					<div class="panel-body">

						<br/>
								<!-- tabel pemilih -->
								<table class="table table-bordered table-hover table-striped table-datatable">
									<thead>
										<tr>
											<th width="1%"">No</th>									
											<th width="10%"">Nomor KK</th>		
											<th width="10%"">NIK</th>		
											<th width="15%"">Nama Pemilih</th>		
											<th width="20%">Tmpt/Tgl Lahir</th>	
											<th>Jenis Kelamin</th>		
											<th>Alamat</th>		
											
										</tr>
									</thead>
									<tbody>
										<?php



									// no urut di mulai dari 1
										$no = 1; 

									// query untuk mengambil data pemilih
										$data = mysqli_query($config,"select * from pemilih,voting where pemilih_id=voting_pemilih");	

									// menampilkan data pemilih	
										while($d=mysqli_fetch_array($data)){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['pemilih_kk'] ?></td>
												<td><?php echo $d['pemilih_nik'] ?></td>									
												<td><?php echo $d['pemilih_nama'] ?></td>
												<td><?php echo $d['pemilih_tempat_lahir'] ?>, <?php echo date('d-m-Y',strtotime($d['pemilih_tgl_lahir'])); ?></td>								
												<td><?php echo $d['pemilih_jk'] ?></td>	
												<td><?php echo $d['pemilih_alamat'] ?></td>									
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
		</div>				
	</div>
</div>

<?php include 'footer.php'; ?>