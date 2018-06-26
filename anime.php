<html>

<head>
<title>Anime</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="./style/style.css">
</head>

<body>
<br>
<a id="search" href="index.php">回到首頁</a><br><br>


<?php

$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "1234qwer"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");

mysql_query("SET NAMES 'UTF-8'");

$id = $_GET['id'];
$sql = "SELECT name 
        FROM anime 
		WHERE id = $id";
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
list($name) = mysql_fetch_row($result);
echo "<h1>$name</h1>";
echo "<center id=\"paper\">";
echo "</center>";

mysql_close ($link);
?>

</body>
</html>