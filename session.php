<?php
	session_start();
	
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		$account = '';
	} else {
		$account = $_SESSION['username'];
	}
?>