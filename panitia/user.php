<?php
include 'include/global.php';
include 'include/function.php';

if (isset($_GET['action']) && $_GET['action'] == 'index') {
	?>

	<script type="text/javascript">

		$('title').html('User');

		function user_delete(pemilih_id, pemilih_nama) {

			var r = confirm("Delete user "+pemilih_nama+" ?");

			if (r == true) {

				push('user.php?action=delete&pemilih_id='+pemilih_id);

			}
		}
		
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
						load('user.php?action=index');
					}
				}
				ct++;
			});
		}
		
		function user_checkregister(pemilih_id, current) {
			$.ajax({
				url			:	"user.php?action=checkreg&pemilih_id="+pemilih_id+"&current="+current,
				type		:	"GET",
				success		:	function(data)
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
	<br>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-success" onclick="load('<?php echo $base_path?>user.php?action=create')">Add</button>
		</div>
	</div>

	<?php

	$user = getUser();

	if (count($user) > 0) {

		echo	"<div class='row'>"
		."<div class='col-md-12'>"
		."<table class='table table-bordered table-hover'>"
		."<thead>"
		."<tr>"
		."<th class='col-md-4'>User ID</th>"
		."<th class='col-md-4'>Username</th>"
		."<th class='col-md-2'>Template</th>"
		."<th class='col-md-2'>Action</th>"
		."</tr>"
		."</thead>"
		."<tbody>";

		foreach ($user as $row) {

			$finger 			= getUserFinger($row['pemilih_id']);
			$register			= '';
			$verification		= '';
			$url_register		= base64_encode($base_path."register.php?pemilih_id=".$row['pemilih_id']);
			$url_verification	= base64_encode($base_path."verification.php?pemilih_id=".$row['pemilih_id']);

			if (count($finger) == 0) {

				$register = "<a href='finspot:FingerspotReg;$url_register' class='btn btn-xs btn-primary' onclick=\"user_register('".$row['pemilih_id']."','".$row['pemilih_nama']."')\">Register</a>";

			} else {
				
				$verification = "<a href='finspot:FingerspotVer;$url_verification' class='btn btn-xs btn-success'>Login</a>";
				
			}

			echo					"<tr>"
			."<td>".$row['pemilih_id']."</td>"
			."<td>".$row['pemilih_nama']."</td>"
			."<td><code id='user_finger_".$row['pemilih_id']."'>".count($finger)."</code></td>"
			."<td>"
			."<button type='button' class='btn btn-xs btn-danger' onclick=\"user_delete('".$row['pemilih_id']."','".$row['pemilih_nama']."')\">Delete</button>"
			."&nbsp"
			."$register"
			."$verification"
			."</td>"
			."</tr>";

		}

		echo
		"</tbody>"
		."</table>"
		."</div>"
		."</div>";

	} else {

		echo 'User Empty';

	}

} elseif (isset($_GET['action']) && $_GET['action'] == 'create') {
	?>

	<script type="text/javascript">

		$('title').html('Add user');

		function user_store() {

			pemilih_nama	= $('#pemilih_nama').val();

			push('user.php?action=store&pemilih_nama='+pemilih_nama);

		}

	</script>

	<div class="row">
		<div class="col-md-4">

		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="pemilih_nama">Username</label>
				<input type="text"  id="pemilih_nama" class="form-control" placeholder="Enter Username">
			</div>
			<a class="btn btn-default" onclick="load('<?php echo $base_path?>user.php?action=index')">Back</a>
			<button type="submit" class="btn btn-success" onclick="user_store()">Save</button>
		</div>
		<div class="col-md-4">

		</div>
	</div>

	<?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'store') {

	$res 		= array();
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
			$res['reload'] 	= "user.php?action=index";

		} else {

			$res['server'] = "Error insert data!";

		}

		echo json_encode($res);

	}

} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {

	$sql1		= "DELETE FROM pemilih WHERE pemilih_id = '".$_GET['pemilih_id']."' ";
	$result1	= mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	
	$sql2 		= "DELETE FROM demo_finger WHERE user_id = '".$_GET['pemilih_id']."' ";
	$result2 	= mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

	if ($result1 && $result2) {

		$res['result'] 	= true;
		$res['reload'] 	= "user.php?action=index";

	} else {

		$res['server'] 	= "Error delete data!#".$sql1;

	}

	echo json_encode($res);

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

	echo "Parameter invalid..";

}
?>