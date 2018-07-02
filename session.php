<?php
    require_once 'config.php';
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        $account = '';
        $authority = '';
	} else {
        $account = $_SESSION['username'];
        $sql = "SELECT authority FROM user WHERE username = '".$account."'";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($authority) = mysql_fetch_row($result);
	}
?>