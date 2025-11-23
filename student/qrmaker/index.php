<?php
	session_start();
	include('libs/phpqrcode/qrlib.php'); 
	$studentid = $_SESSION['studentid'];
	$tempDir = 'temp/'; 
	$filename = $studentid;
	$codeContents = $studentid; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
	echo "<script>
    window.location.href='../admitcard.php';
    </script>";
?>
