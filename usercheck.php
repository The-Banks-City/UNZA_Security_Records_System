<?php 

if ( ! isset($_SESSION["role"]) ) { 
	header("Location:../index.php");
}
?>