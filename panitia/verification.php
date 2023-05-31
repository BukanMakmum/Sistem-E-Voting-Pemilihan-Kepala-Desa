<?php

if (isset($_GET['pemilih_id']) && !empty($_GET['pemilih_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$pemilih_id 	= $_GET['pemilih_id'];
	$finger		= getUserFinger($pemilih_id);

	echo "$pemilih_id;".$finger[0]['finger_data'].";SecurityKey;".$time_limit_ver.";".$base_path."process_verification.php;".$base_path."getac.php".";extraParams";
		
}

?>