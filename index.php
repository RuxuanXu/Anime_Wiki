<?php
	require_once 'session.php';
	require_once 'config.php';
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
		<br>
		<table>
			<tr class="title">
				<td>動畫名稱</td><td>製作公司</td>
			</tr>
			<?php
				$sql = "SELECT anime.name, company.name, anime.id, company.id 
				FROM anime, make, company 
				WHERE anime.id = anime_id 
				and company.id = company_id;";
				$main = '';
				$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
				while ( list($a,$b,$c,$d) = mysql_fetch_row($result) ){
					$main .="<tr class='content'><td><a href=\"anime.php?id=$c\">$a</td><td><a href=\"company.php?id=$d\">$b</td>";
				}
				echo $main;
				mysql_close ($link);
			?>
		</table>
	</center>

	</body>
</html>