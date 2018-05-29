
<html>

<head>
<title>Search Page</title>
</head>
<body>
<H1>SEARCH ANGEL ლ(^o^ლ)  </H1>
<a href="index.php">Back View All</a>
<?php

$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "111"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");
$name = $_POST[_name];
$sql = "Select * from anime where name like '%".$name."%' order by anime_id";
mysql_query("SET NAMES utf8");
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td class="bodyText">';
$main .='	<table width="300" border="0">
			<tr><td>ID</td> <td>Name</td> <td>Description</td><td>DELETE</td></tr>';
		while ( list($a,$b,$c) = mysql_fetch_row($result) ){
			$main .="<tr><td>$a</td><td>$b </td><td>$c </td>";
			$main .='<td><a href="deleteResult.php?deleteid='.$a.'" onclick="return confirm("delete?")";>Delete</a></td></tr>';
	}
$main .='</table></td></tr></table>';		  
echo $main;
mysql_close ($link);
?>
</body>
</html>