
<?php
if($deleteid != NULL){

	echo "Delete Success!".'<a href="index.php">Back to the view page.</a></br>';
	$link=mysql_connect("localhost", "root", "60647022S");
	mysql_query("SET NAMES utf8");
	mysql_select_db("myTestDataBase") or die("No database");
	$sql = "DELETE FROM myTestTable WHERE id = ".$deleteid;

	mysql_query($sql) or die("Error Message :".mysql_error());
	mysql_close ($link);
}
?>