<?php

if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {
		
	include 'include/global.php';
	include 'include/function.php';
	
	$data 		= explode(";",$_POST['VerPas']);
	$pemilih_id	= $data[0];
	$vStamp 	= $data[1];
	$time 		= $data[2];
	$sn 		= $data[3];
	
	$fingerData = getUserFinger($pemilih_id);
	$device 	= getDeviceBySn($sn);
	$sql1 		= "SELECT * FROM pemilih WHERE pemilih_id='".$pemilih_id."'";
	$result1 	= mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
	$data 		= mysqli_fetch_array($result1);
	$pemilih_id	= $data['pemilih_id'];
		
	$salt = md5($sn.$fingerData[0]['finger_data'].$device[0]['vc'].$time.$pemilih_id.$device[0]['vkey']);
	
	if (strtoupper($vStamp) == strtoupper($salt)) {
		
		$log = createLog($pemilih_id, $time, $sn);
		
		if ($log == 1) {
		
			echo $base_path."messages.php?pemilih_id=$pemilih_id&time=$time";
		
		} else {
		
			echo $base_path."messages.php?msg=$log";
			
		}
	
	} else {
		
		$msg = "Parameter invalid..";
		
		echo $base_path."messages.php?msg=$msg";
		
	}
}

?>