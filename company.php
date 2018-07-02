<html>

<head>
	<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
  	<link rel="stylesheet" href="./style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="topnav">
		<a class="active" href="index.php">Anime Wiki</a>
		<a href="#about">關於</a>
		<a href="#rand">隨機條目</a>
		<a class="account" href="login.php">登入</a>
		<a class="account" href="register.php">註冊帳號</a>
		<div class="search-container">
			<form  method="POST" action="searchResult.php">
				<input type="text" name="_name" placeholder="搜尋...">
				<button type="submit"><i class="fa fa-search"></i>
			</form>
		</div>
	</div>

	<?php
	require_once 'config.php';

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