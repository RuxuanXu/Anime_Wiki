<html>

<head>
<title>Search Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="./style/style.css">
</head>

<body>
<br><h1>刪除結果</h1>
<a id="search" href="index.php">回到首頁</a><br><br>

<center id="paper">
<?php
$deleteid = $_GET['deleteid'];
if($deleteid != NULL){

   $db_server = "localhost";
   $db_name = "anime_wiki"; 
   $db_user = "root"; 
   $db_passwd = "1234qwer"; 

    //Connect Sever
    $link = mysql_connect($db_server, $db_user, $db_passwd);
    //Connect Database
    mysql_select_db($db_name) or die("No database");
	mysql_query("SET NAMES 'UTF-8'");

	$sql1 = "DELETE FROM anime WHERE id = '$deleteid'";
    $sql2 = "DELETE FROM make WHERE anime_id = '$deleteid'";
    
    mysql_query($sql2) or die("Error Message :".mysql_error());
	mysql_query($sql1) or die("Error Message :".mysql_error());
	
	mysql_close ($link);
}else{
    echo "刪除失敗";
}
?>
</center>

</body>
</html>