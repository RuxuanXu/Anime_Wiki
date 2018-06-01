
<html>
<head>
<title>Anime Wiki</title>
<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
</head>

<body>
<H1>Anime Wiki</H1>
<a href="add.html">Add somebody</a></br></br>
<form method="POST" action="searchResult.php">
   Search: <input type="text" name="_name">
   <input type="submit" value="Send">
</form>

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

$main .='<h3>動畫條目</h3>';
$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td class="bodyText">';
$main .='	<table width="300" border="0">
			<tr><td>動畫名稱</td> <td>製作公司</td> <td>DELETE</td></tr>';
		while ( list($a,$b,$c) = mysql_fetch_row($result) ){
			$main .="<tr><td>$a</td><td>$b </td>";
			$main .='<td><a href="deleteResult.php?deleteid='.$c.'" onclick="return confirm("delete?")";>Delete</a></td></tr>';
	}
$main .='</table></td></tr></table>';		  
echo $main;
mysql_close ($link);
?>

<!--    PHP Part End   -->
</body>
</html>