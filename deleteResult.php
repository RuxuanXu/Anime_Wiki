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

    require_once 'config.php';

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