<?php
	session_start();
	session_start();
	$_SESSION = array();
	session_destroy();
	header("location:../index.php");
?>