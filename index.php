﻿<?php
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
	<!--navigation bar-->
	<div class="topnav">
		<a class="active" href="index.php">Anime Wiki</a>
		<a href="#about">關於</a>
		<a href="#rand">隨機條目</a>
		
		<?php
			if(!$account){
				echo "<a class='account' href='login.php'>登入</a>";
				echo "<a class='account' href='register.php'>註冊帳號</a>";
			} else {
				echo "<a class='account' href='logout.php'>登出</a>";
				echo "<a class='account' href='account.php'>".$account."</a>";
				echo "<a class='account' href='add.php'>新增條目</a>";
			}
		?>
		<div class="search-container">
			<form  method="POST" action="searchResult.php">
				<input type="text" name="_name" placeholder="搜尋...">
				<button type="submit"><i class="fa fa-search"></i>
			</form>
		</div>
	</div>

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