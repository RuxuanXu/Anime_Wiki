<?php
	require_once 'session.php';
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
	?>
	<center id="paper">
		<?php

		require_once 'config.php';
		$sql = "SELECT anime.name, company.name, anime.id, company.id 
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
				while ( list($a,$b,$c,$d) = mysql_fetch_row($result) ){
					$main .="<tr class='content'><td><a href=\"anime.php?id=$c\">$a</td><td><a href=\"company.php?id=$d\">$b</td>";
					$main .='<td><a href="deleteResult.php?deleteid='.$c.'" onclick="return confirm("delete?")";>刪除</a></td></tr>';
			}
		$main .='</table></td></tr></table>';		  
		echo $main;
		mysql_close ($link);
		?>
	</center>

	</body>
</html>