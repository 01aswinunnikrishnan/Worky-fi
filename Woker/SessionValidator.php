<?php
session_start();
if(!(isset($_SESSION['wrid']) && !empty($_SESSION['wrid']))) {
	header("location:../Guest/Login.php");
	}

?>