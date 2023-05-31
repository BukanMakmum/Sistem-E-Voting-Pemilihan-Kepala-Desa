<?php include 'header.php'; ?>

<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">			
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">DATA PEMILIH</h4>
						<div class="heading-elements">
							<a href="pemilih_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">

						<a href="pemilih_cetak.php" class="btn btn-primary" target="_blank"><i class="icon-printer"></i> CETAK</a>
						<br/>
						<br/>

						<?php
						include 'include/global.php';
						include 'include/function.php';
						

						if (isset($_GET['action']) && $_GET['action'] == 'store') {

							$res = array();
							$res['result'] 	= false;

							if ($_GET['pemilih_nama'] == '' || !isset($_GET['pemilih_nama']) || empty($_GET['pemilih_nama'])) {

								$res['pemilih_nama'] = "username can't empty";

							} elseif (isset($_GET['pemilih_nama']) && !empty($_GET['pemilih_nama'])) {

								$pemilih_nama = checkUserName($_GET['pemilih_nama']);

								if ($pemilih_nama != 1) {

									$res['pemilih_nama'] = $pemilih_nama;

								}

							}

							if (count($res) > 1) {

								echo json_encode($res);

							} else {

								$sql    = "INSERT INTO pemilih SET pemilih_nama='".$_GET['pemilih_nama']."' ";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

								if ($result) {

									$res['result']	= true;
									$res['reload'] = "pemilih.php";

								} else {

									$res['server'] = "Error insert data!";

								}

								echo json_encode($res);

							}

						} elseif (isset ($_GET['action']) && $_GET['action'] == 'checkreg') {

							$sql1		= "SELECT count(finger_id) as ct FROM demo_finger WHERE user_id=".$_GET['pemilih_id'];
							$result1	= mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
							$data1 		= mysqli_fetch_array($result1);

							if (intval($data1['ct']) > intval($_GET['current'])) {
								$res['result'] = true;			
								$res['current'] = intval($data1['ct']);			
							}
							else
							{
								$res['result'] = false;
							}
							echo json_encode($res);

						} else {

							?>

							<script type="text/javascript">
								
								function user_register(pemilih_id, pemilih_nama) {

									$('body').ajaxMask();

									regStats = 0;
									regCt = -1;
									try
									{
										timer_register.stop();
									}
									catch(err)	
									{
										console.log('Registration timer has been init');
									}


									var limit = 4;
									var ct = 1;
									var timeout = 5000;

									timer_register = $.timer(timeout, function() {					
										console.log("'"+pemilih_nama+"' registration checking...");
										user_checkregister(pemilih_id,$("#user_finger_"+pemilih_id).html());
										if (ct>=limit || regStats==1) 
										{
											timer_register.stop();
											console.log("'"+pemilih_nama+"' registration checking end");
											if (ct>=limit && regStats==0)
											{
												alert("'"+pemilih_nama+"' registration fail!");
												$('body').ajaxMask({ stop: true });
											}						
											if (regStats==1)
											{
												$("#user_finger_"+pemilih_id).html(regCt);
												alert("'"+pemilih_nama+"' registration success!");
												$('body').ajaxMask({ stop: true });
												window.location = "pemilih.php?alert=oke&pemilih_nama="+pemilih_nama;
											}
										}
										ct++;
									});
								}

								function user_checkregister(pemilih_id, current) {
									$.ajax({
										url		: "user.php?action=checkreg&pemilih_id="+pemilih_id+"&current="+current,
										type		: "GET",
										success	: function(data)
										{
											try
											{
												var res = jQuery.parseJSON(data);	
												if (res.result)
												{
													regStats = 1;
													$.each(res, function(key, value){
														if (key=='current')
														{														
															regCt = value;
														}
													});
												}
											}
											catch(err)
											{
												alert(err.message);
											}
										}
									});
								}

							</script>


							<?php 
							if(isset($_GET['alert'])&&isset($_GET['pemilih_nama'])){
								if($_GET['alert']=="oke"){
									echo "<div class='alert alert-success'><b>".$_GET['pemilih_nama']."</b> Berhasil Terdaftar</div>";
								}
							}
							?>

							<div class="table-responsive">
								<?php 
								if(isset($_GET['pesan'])){
									if($_GET['pesan']=="oke"){
										echo "<div class='alert alert-success'>Penambahan Pemilih Berasil.</div>";
									}
									elseif($_GET['pesan']=="okee"){
										echo "<div class='alert alert-success'>Edit Pemilih Berasil.</div>";
									}
									elseif($_GET['pesan']=="hapus"){
										echo "<div class='alert alert-success'>Pemilih Berasil di Hapus.</div>";
									}
								}
								?>
								<!-- tabel pemilih -->
								<table class="table table-bordered table-hover table-striped table-datatable">
									<thead>
										<tr>
											<th width="1%"">No</th>									
											<th>NIK</th>		
											<th>Nama Lengkap</th>		
											<th>Username</th>		
											<th width="10%">Jenis Kelamin</th>	
											<th>Kategori</th>		
											<th width="5%">Fingerprint</th>		
											<th width="17%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php



									// no urut di mulai dari 1
										$no = 1; 

									// query untuk mengambil data pemilih
										$data = mysqli_query($config,"select * from pemilih");	

									// menampilkan data pemilih	
										while($d=mysqli_fetch_array($data)){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $d['pemilih_nik'] ?></td>
												<td><?php echo $d['pemilih_nama'] ?></td>									
												<td><?php echo $d['pemilih_username'] ?></td>
												<td><?php echo $d['pemilih_jk'] ?></td>																																																													
												<td><?php echo $d['pemilih_kategori'] ?></td>										
												<td>
													<?php 

													// perinttah finger print bawaan
													$finger 			= getUserFinger($d['pemilih_id']);							
													$url_register		= base64_encode($base_path."register.php?pemilih_id=".$d['pemilih_id']);
													$url_verification	= base64_encode($base_path."verification.php?pemilih_id=".$d['pemilih_id']);

													if (count($finger) == 0) {

														echo "<a href='finspot:FingerspotReg;$url_register' class='btn border-purple text-purple btn-flat btn-icon btn-xs' onclick=\"user_register('".$d['pemilih_id']."','".$d['pemilih_nama']."')\">Register</a>";

													} else {

														echo "Terdaftar";
														//echo "<a href='#' class='btn border-purple text-purple btn-flat btn-icon btn-xs' onclick=\"user_register('".$d['pemilih_id']."','".$d['pemilih_nama']."')\">Unregister</a>";
					
													}

													echo	"<input type='hidden' id='user_finger_".$d['pemilih_id']."' value='".count($finger)."'>";
													?>
												</td>
												<td>															
													<a target="_blank" class="btn border-purple text-purple btn-flat btn-icon btn-xs" href="pemilih_kartu.php?id=<?php echo $d['pemilih_id'];?>"><i class="icon-vcard"></i></a>
													<a class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="pemilih_detail.php?id=<?php echo $d['pemilih_id'];?>"><i class="icon-search4"></i></a>
													<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="pemilih_edit.php?id=<?php echo $d['pemilih_id'];?>"><i class="icon-wrench3"></i></a>
													<a class="btn border-danger text-danger btn-flat btn-icon btn-xs btn-hapus" nama="<?php echo $d['pemilih_nama']; ?>" id="pemilih_hapus.php?id=<?php echo $d['pemilih_id'];?>"><i class="icon-trash-alt"></i></a>
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>


							<?php

						}
						?>

					</div>					
				</div>	
			</div>
		</div>				
	</div>
</div>
<script type="text/javascript">
	$('body').on('click','.btn-hapus',function(){
		var nama = $(this).attr('nama');
		var url = $(this).attr('id');
		if(confirm("Apakah anda yakin ingin menghapus "+nama+" sebagai Pemilih??")){
			window.location = url;			
		}else{
			alert('Penghapusan dibatalkan');
		}
		
	});
</script>


<?php include 'footer.php'; ?>