
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
$comp_name = $_POST['_cname'];

echo "你新增了動畫條目</br>".$name."，由".$comp_name."公司製作</br>".'<a href="index.php">回到上一頁</a></br>';

$sql1 = "INSERT INTO anime(id, name) VALUES ('default','$name');";
mysql_query($sql1) or die("Error Message :".mysql_error());

$select_id = "SELECT MAX(id) AS aniid FROM anime;";
$ani_id = mysql_query($select_id) or die("Error Message :".mysql_error());

$row = mysql_fetch_array($ani_id);
$ani_id = $row["aniid"];


$company_exist = "SELECT COUNT(name) as count FROM company WHERE name='$comp_name';";
$temp = mysql_query($company_exist) or die("Error Message 3:".mysql_error());
$crow = mysql_fetch_array($temp);

if ($crow["count"] == 0){
	//echo "1<br>";
	$sql2 = "INSERT INTO company(id, name) VALUES ('default','$comp_name');";
    mysql_query($sql2) or die("Error Message 1:".mysql_error());
	
	$select_id = "SELECT MAX(id) AS compid FROM company;";
	$comp_id = mysql_query($select_id) or die("Error Message :".mysql_error());
    $row = mysql_fetch_array($comp_id);
    $comp_id = $row["compid"];
	
	
	
    
}else {
	//echo "2<br>";
	//find company id
	$select_id = "SELECT MAX(id) AS compid FROM company WHERE name = '$comp_name';";
	$comp_id = mysql_query($select_id) or die("Error Message 2:".mysql_error());
    $row = mysql_fetch_array($comp_id);
    $comp_id = $row["compid"];
	
}
$sql3 = "INSERT INTO make(anime_id, company_id) VALUES ('$ani_id','$comp_id');";

mysql_query($sql3) or die("Error Message5 :".mysql_error());

mysql_close ($link);

?>