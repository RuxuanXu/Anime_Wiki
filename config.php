<?php
$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "1234qwer"; 

$link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name) or die("No database");
mysql_query("SET NAMES 'UTF-8'");
?>