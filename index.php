
<html>
<head>
<title>Anime Wiki</title>
</head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<body>
<H1>Anime Wiki</H1>
<a href="add.htm">Add somebody</a></br></br>
<form method="POST" action="searchResult.php">
   Search: <input type="text" name="_name">
   <input type="submit" value="Send">
</form>

<!--    PHP Part Start    -->
<?php

$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "111"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");

mysql_query("SET NAMES utf8");
$sql = "Select * from anime order by anime_id";
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td class="bodyText">';
$main .='	<table width="300" border="0">
			<tr><td>ID</td> <td>Name</td> <td>DELETE</td></tr>';
		while ( list($a,$b) = mysql_fetch_row($result) ){
			$main .="<tr><td>$a</td><td>$b </td>";
			$main .='<td><a href="deleteResult.php?deleteid='.$a.'" onclick="return confirm("delete?")";>Delete</a></td></tr>';
	}
$main .='</table></td></tr></table>';		  
echo $main;
mysql_close ($link);
?>

<!--    PHP Part End   -->
</body>
</html>