<html>

<head>
<title>Search Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="./style/style.css">
</head>

<body>
<br><h1>新增成功</h1>
<a id="search" href="index.php">回到首頁</a><br><br>

<center id="paper">
<?php
$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "1234qwer"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");

$name = $_POST['_name'];
$comp_name = $_POST['_company_name'];
$series_name = $_POST['_series_name'];
$supervisor_name = $_POST['_supervisor_name'];
$year = $_POST['_year'];
$season = $_POST['_season'];
$chara_num = (int)$_POST['_chara_num'];
$characters = array();
$voiceactors = array();

for($x = 0; $x<$chara_num; $x++){
	$tag = '_chara_name';
	$voice_tag = '_voice_name';
	if($x) {
		$tag = $tag.$x;
		$voice_tag = $voice_tag.$x;
	}
    array_push($characters,$_POST[$tag]);
	array_push($voiceactors,$_POST[$voice_tag]);
}

echo "<br>你新增了動畫條目</br>".$name."，由".$comp_name."公司製作</br>屬於".$series_name."系列";
echo "<br>角色: ";
echo print_r($characters);

//Insert into anime
$sql1 = "INSERT INTO anime(id, name) VALUES ('default','$name');";
mysql_query($sql1) or die("Error Message :".mysql_error());

$select_id = "SELECT MAX(id) AS aniid FROM anime;";
$ani_id = mysql_query($select_id) or die("Error Message :".mysql_error());

$row = mysql_fetch_array($ani_id);
$ani_id = $row["aniid"];

//insert into company
$company_exist = "SELECT COUNT(name) as count FROM company WHERE name='$comp_name';";
$temp = mysql_query($company_exist) or die("Error Message 3:".mysql_error());
$crow = mysql_fetch_array($temp);

if ($crow["count"] == 0){
	$sql2 = "INSERT INTO company(id, name) VALUES ('default','$comp_name');";
    mysql_query($sql2) or die("Error Message 1:".mysql_error());
	
	$select_id = "SELECT MAX(id) AS compid FROM company;";
	$comp_id = mysql_query($select_id) or die("Error Message :".mysql_error());
    $row = mysql_fetch_array($comp_id);
    $comp_id = $row["compid"];
}else {
	$select_id = "SELECT MAX(id) AS compid FROM company WHERE name = '$comp_name';";
	$comp_id = mysql_query($select_id) or die("Error Message 2:".mysql_error());
    $row = mysql_fetch_array($comp_id);
    $comp_id = $row["compid"];
}
//insert into make
$sql = "INSERT INTO make(anime_id, company_id) VALUES ('$ani_id','$comp_id');";
mysql_query($sql) or die("Error Message5 :".mysql_error());

//insert into series_name
$series_exist = "SELECT COUNT(name) as count FROM series WHERE name='$series_name';";
$temp = mysql_query($series_exist) or die("Error Message:".mysql_error());
$crow = mysql_fetch_array($temp);

if ($crow["count"] == 0){
	$sql = "INSERT INTO series(name) VALUES ('$series_name');";
    mysql_query($sql) or die("Error Message 1:".mysql_error());
}

//insert into belong
$sql = "INSERT INTO belong(series_name, anime_id) VALUES ('$series_name','$ani_id');";
mysql_query($sql) or die("Error Message:".mysql_error());

//insert into supervisor
$exist = "SELECT COUNT(name) as count FROM supervisor WHERE name='$supervisor_name';";
$temp = mysql_query($exist) or die("Error Message 3:".mysql_error());
$crow = mysql_fetch_array($temp);

if ($crow["count"] == 0){
	$sql2 = "INSERT INTO supervisor(id, name) VALUES ('default','$supervisor_name');";
    mysql_query($sql2) or die("Error Message 1:".mysql_error());
	
	$select_id = "SELECT MAX(id) AS id FROM supervisor;";
	$id = mysql_query($select_id) or die("Error Message :".mysql_error());
    $row = mysql_fetch_array($id);
    $supervisor_id = $row["id"];
}else {
	$select_id = "SELECT MAX(id) AS id FROM supervisor WHERE name = '$supervisor_name';";
	$id = mysql_query($select_id) or die("Error Message:".mysql_error());
    $row = mysql_fetch_array($id);
    $supervisor_id = $row["id"];
}

//insert into supervise
$sql = "INSERT INTO supervise(supervisor_id, anime_id) VALUES ('$supervisor_id','$ani_id');";
mysql_query($sql) or die("Error Message:".mysql_error());

//insert into characters
for($x = 0; $x<$chara_num; $x++){
	//$characters[$x]
	//$voiceactors[$x]
	//insert into chara
	$exist_id = "SELECT id
	          FROM chara
			  WHERE name='$characters[$x]';";
	$temp = mysql_query($exist_id) or die("Error Message:".mysql_error());
	$row = mysql_fetch_array($temp);
	$id_act = "SELECT anime_id
	           FROM act
			   WHERE chara_id = "

	
	if ($crow["count"] == 0){
		$sql2 = "INSERT INTO supervisor(id, name) VALUES ('default','$supervisor_name');";
		mysql_query($sql2) or die("Error Message 1:".mysql_error());
		
		$select_id = "SELECT MAX(id) AS id FROM supervisor;";
		$id = mysql_query($select_id) or die("Error Message :".mysql_error());
		$row = mysql_fetch_array($id);
		$supervisor_id = $row["id"];
	}else {
		$select_id = "SELECT MAX(id) AS id FROM supervisor WHERE name = '$supervisor_name';";
		$id = mysql_query($select_id) or die("Error Message:".mysql_error());
		$row = mysql_fetch_array($id);
		$supervisor_id = $row["id"];
	}
}

mysql_close ($link);

?>
</center>

</body>
</html>