<?php
    require_once 'session.php';
	require_once 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
	<?php
		require_once 'header.php';
	?>
</head>

<body>
    <?php
		require_once 'navigation.php';

		/*------Get Anime Data------*/
		//company
		$id = $_GET['id'];
		$sql = "SELECT name
				FROM company 
				WHERE id = $id";
		$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
		list($company_name) = mysql_fetch_row($result);

		//all anime
		$sql = "SELECT name 
				FROM anime 
				WHERE id in(SELECT anime_id
							FROM make 
							WHERE company_id=$id)";
		$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
		$animes=array();
		while ( list($anime) = mysql_fetch_row($result)){
			array_push($animes,$anime);
		}

		// get all anime's id
		$sql = "SELECT id
				FROM anime 
				WHERE id in(SELECT anime_id
							FROM make 
							WHERE company_id=$id)";
		$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
		$animes_id=array();
		while ( list($anime_id) = mysql_fetch_row($result)){
			array_push($animes_id,$anime_id);
		}

		/*------Output Page------*/
		echo "<title>$company_name</title>";
		echo "<center id=\"paper\">";
		echo "<h1>$company_name</h1>";
		echo "<br>製作過的動畫列表:<br>";
		for($x = 0; $x<count($animes); $x++){
			echo "<br><td><a href=\"anime.php?id=".$animes_id[$x]."\">".$animes[$x]."</td><br>";
		}
		echo "</center>";

		end:
		mysql_close ($link);
	?>

</body>
</html>