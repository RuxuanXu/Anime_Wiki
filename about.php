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
    <script>
        document.getElementById("index").classList.remove("active");
        document.getElementById("about").classList.add("active");
    </script>

	<center id="paper">
		<br>
        Anime_Wiki是一個存放動畫資料的資料庫系統。
        <br>
        <br>
        製作團隊: 許如萲、李博衡、藍昱澄
    </center>

	</body>
</html>