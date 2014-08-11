<?php
session_start();
if (isset($_SESSION['acore_ab'])) {
	$ab = $_SESSION['acore_ab'];
}else{
	$ab = file_get_contents('ab');
	$_SESSION['acore_ab'] = $ab;
	if ($ab == true) {
		file_put_contents('ab', 0);
	}else{
		file_put_contents('ab', 1);
	}
}
?>
