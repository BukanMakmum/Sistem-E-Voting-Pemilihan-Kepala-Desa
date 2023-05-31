<?php
	
if (isset($_GET['pemilih_id']) && !empty($_GET['pemilih_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';

	$pemilih_id 	= $_GET['pemilih_id'];

	echo "$pemilih_id;SecurityKey;".$time_limit_reg.";".$base_path."process_register.php;".$base_path."getac.php";
	
}

?>