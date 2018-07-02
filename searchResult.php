<?php
	require_once 'session.php';
	require_once 'config.php';
	$name = $_POST[_name];
	if ($name == ''){
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Anime Wiki</title>
	<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="./style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<?php
		require_once 'navigation.php';
		echo "<script>document.getElementById('search').value ='".$name."';</script>";
	?>
	<script>
        document.getElementById("index").classList.remove("active");
        document.getElementById("search").classList.add("active");
    </script>


<center id="paper">
	<?php
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