<html>

<head>
<title>Search Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="./style/style.css">
</head>

<body>
<br><h1>搜尋結果</h1>
<a id="search" href="index.php">回到首頁</a><br><br>

<center id="paper">
<?php

/*------Connect Database------*/
$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "1234qwer"; 

$link = mysql_connect($db_server, $db_user, $db_passwd);
mysql_select_db($db_name) or die("No database");

mysql_query("SET NAMES 'UTF-8'");

$name = $_POST[_name];

echo "<br>動畫<br>";
//anime list
$sql = "Select * from anime where name like '%".$name."%' order by id";

$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td class="bodyText">';
$main .='	<table>
			<tr class="title"><td>ID</td> <td>動畫</td></tr>';
		while ( list($a,$b) = mysql_fetch_row($result) ){
			$main .="<tr class='content'><td>$a</td><td>$b </td>";
	}
$main .='</table></td></tr></table>';		  

//company list

$sql = "Select * from company where name like '%".$name."%' order by id";

$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<br>公司<br>';
$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td>';
$main .='	<table>
			<tr class="title"><td>ID</td> <td>製作公司</td></tr>';
		while ( list($a,$b) = mysql_fetch_row($result) ){
			$main .="<tr class='content'><td>$a</td><td>$b </td>";
	}
$main .='</table></td></tr></table>';		  
echo $main;

mysql_close ($link);
?>
</center>

</body>
</html>