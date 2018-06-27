<html>
<head>
<title>Anime Wiki</title>
<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
<link rel="stylesheet" href="./style/style.css">
</head>

<body>
<br><h1>Anime Wiki</h1>

<center>

	<a id="add" href="add.html">添加新動畫</a></br></br>
	
    <form  id="search" method="POST" action="searchResult.php">
        搜尋: <input type="text" name="_name">
       <input type="submit" value="送出">
	</form>
	
</center>

<center id="paper">
<!--    PHP Part Start    -->
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
$sql = "SELECT anime.name, company.name, anime.id 
        FROM anime, make, company 
        WHERE anime.id = anime_id 
		and company.id = company_id;";
		
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<br>';
$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td>';
$main .='	<table>
			<tr class="title"><td>動畫名稱</td><td>製作公司</td><td></td></tr>';
		while ( list($a,$b,$c) = mysql_fetch_row($result) ){
			$main .="<tr class='content'><td><a href=\"anime.php?id=$c\">$a</td><td>$b</td>";
			$main .='<td><a href="deleteResult.php?deleteid='.$c.'" onclick="return confirm("delete?")";>刪除</a></td></tr>';
	}
$main .='</table></td></tr></table>';		  
echo $main;
mysql_close ($link);
?>

<!--    PHP Part End   -->
</center>

</body>
</html>