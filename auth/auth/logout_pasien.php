<?php
	session_start();
	unset($_SESSION['id_pasien']);
	session_destroy();
	header('location:index.php');
?>