<?php
	require_once 'session.php';
	require_once 'config.php';
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

	<center id="paper" style="overflow-y: hidden;">
		<a href="about.php"><img src="/images/banner.png" style="width:100%;"></a>
		
		<div class="scl">
			<?php
            $sql = "SELECT name, id
                    FROM anime
                    ORDER BY id DESC
                    LIMIT 10;";
			$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
			$main = "<h3>最近新增條目: ";
			while (list($a,$b) = mysql_fetch_row($result)){
				$main .="<a href=\"anime.php?id=$b\">".$a." </a>";
			}
            $main .='</h3>';		  
            echo $main;
            mysql_close ($link);
        ?>
		</div>
	</center>

	</body>
</html>