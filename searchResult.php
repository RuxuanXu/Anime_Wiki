<?php
	require_once 'session.php';
	require_once 'config.php';
	$name = $_POST[_name];
	if ($name == ''){
		header("location: index.php");
	}
?>

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
			if($account){
				echo "<a href='add.html'>新增動畫</a>";
			}
		?>
		<?php
			if(!$account){
				echo "<a class='account' href='login.php'>登入</a>";
				echo "<a class='account' href='register.php'>註冊帳號</a>";
			} else {
				echo "<a class='account' href='logout.php'>登出</a>";
				echo "<a class='account' href='account.php'>".$account."</a>";
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