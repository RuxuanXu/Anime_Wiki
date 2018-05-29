
<?php
$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "111"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");

$name = $_POST['_name'];

echo "You add :</br>".$name."</br>".'<a href="index.php">Back to the view page.</a></br>';


$sql = "INSERT INTO anime(anime_id, name) VALUES ('default','$name')";

mysql_query($sql) or die("Error Message :".mysql_error());
mysql_close ($link);

?>