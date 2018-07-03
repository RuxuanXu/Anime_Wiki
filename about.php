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
        <h1>~ Anime Wiki の 誕生日 ~</h1>
        <br>
        動漫目前是大部分年輕族群所喜愛的主文化(*ﾟ▽ﾟ)ﾉ，
        <br>
        <br>
        然而其所涵蓋的範圍無遠佛屆，很難一窺其全貌，
        <br>
        <br>
        為了讓所有喜愛動漫的同好能夠進入動漫的世界，
        <br>
        <br>
        因此，「Anime Wiki」誕生了。
        <br>
        <br>
        <div style="color: yellow;">製作團隊: Norza、LBH、皮卡丘</div>
    </center>

	</body>
</html>