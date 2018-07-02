<?php
	require_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Anime Wiki</title>
	<?php
		require_once 'header.php';
	?>
</head>

<body>
    <?php
		require_once 'navigation.php';
	?>
	<script>
            document.getElementById("index").classList.remove("active");
            document.getElementById("account").classList.add("active");
    </script>
	<center id="paper">
		<?php
		require_once 'config.php';

		$sql = "SELECT id 
		FROM user
		WHERE username = '".$account."'";
		$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
		list($user_id) = mysql_fetch_row($result);

		$sql = "SELECT anime.name, anime.id
				FROM anime, collection
				WHERE anime.id = anime_id 
				and user_id = '".$user_id."';";
				
		$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

		echo "<h1>".$account."的收藏庫</h1>";

		$main .='<br>';
		$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
				<tr>
					<td>';
		$main .='	<table>
					<tr class="title"><td>動畫名稱</td><td>收藏狀態</td></tr>';
				while ( list($a,$b) = mysql_fetch_row($result) ){
					$main .="<tr class='content'><td><a href=\"anime.php?id=$b\">$a</td>";
					$main .='<td><a href="removeCollect.php?id='.$b.'" onclick="return confirm("delete?")";>取消</a></td></tr>';
			}
		$main .='</table></td></tr></table>';		  
		echo $main;
		mysql_close ($link);
		?>
	</center>

	</body>
</html>