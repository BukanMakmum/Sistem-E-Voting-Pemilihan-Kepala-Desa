<?php
	
if (isset($_GET['msg']) && !empty($_GET['msg'])) {
	
	echo $_GET['msg'];

} elseif (isset($_GET['pemilih_id']) && !empty($_GET['pemilih_id']) && isset($_GET['time']) && !empty($_GET['time'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$pemilih_id	= $_GET['pemilih_id'];
	$time		= date('Y-m-d H:i:s', strtotime($_GET['time']));
	
	echo $pemilih_id." xx login success on ".date('Y-m-d H:i:s', strtotime($time));
	
} else {
		
	$msg = "Parameter invalid..";
	
	echo "$msg";
	
}

	
?>