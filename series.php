<!DOCTYPE html>
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
require_once 'config.php';

/*------Get Anime Data------*/
//series
$name = $_GET['name'];
$sql = "SELECT name
        FROM series 
		WHERE name = $name";
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
list($series_name) = mysql_fetch_row($result);

//all anime
$sql = "SELECT name
        FROM anime 
		WHERE id in(SELECT anime_id
					FROM belong 
					WHERE series_name=$name)";
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
$animes=array();
while ( list($anime) = mysql_fetch_row($result)){
    array_push($animes,$anime);
}

// get all anime's id
$sql = "SELECT id
        FROM anime 
		WHERE id in(SELECT anime_id
					FROM belong 
					WHERE series_name=$name)";
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
$animes_id=array();
while ( list($anime_id) = mysql_fetch_row($result)){
    array_push($animes_id,$anime_id);
}

/*------Output Page------*/
echo "<h1>$series_name</h1>";
echo "<center id=\"paper\">";
echo "<br>系列動畫列表:<br>";
for($x = 0; $x<count($animes); $x++){
    echo "<br><td><a href=\"anime.php?id=".$animes_id[$x]."\">".$animes[$x]."</td><br>";
}
echo "</center>";

end:
mysql_close ($link);
?>

</body>
</html>