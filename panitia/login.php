<?php
    	include 'include/global.php';
    	include 'include/function.php';

	if (isset($_GET['action']) && $_GET['action'] == 'index') {
?>

		<script type="text/javascript">

			$('title').html('Login');
			
			function login_selectuser(device_name, sn) {
			
				$("#button_login").attr("href","finspot:FingerspotVer;"+$('#select_scan').val())
				
			}

		</script>
		
		<div class="row">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="user_name">Username</label>	
					<select class="form-control" onchange="login_selectuser()" id='select_scan'>
						<option selected disabled="disabled"> -- Select Username -- </option>
							<?php				
								$strSQL = "SELECT a.* FROM pemilih AS a JOIN demo_finger AS b ON a.pemilih_id=b.user_id";
								$result = mysqli_query($GLOBALS["___mysqli_ston"], $strSQL);
								
								while($row = mysqli_fetch_array($result)){
									
									$value = base64_encode($base_path."verification.php?pemilih_id=".$row['pemilih_id']);
								
									echo "<option value=$value id='option' user_id='".$row['pemilih_id']."' user_name='".$row['pemilih_nama']."'>$row[pemilih_nama]</option>";
								}				
							?>
					</select>
				</div>
				<a href="" id="button_login" type="submit" class="btn btn-success">Login</a>
			</div>
			<div class="col-md-4">

			</div>
		</div>

<?php	
	}
?>