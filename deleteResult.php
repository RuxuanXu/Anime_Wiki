<?php
require_once 'session.php';
require_once 'config.php';
$deleteid = $_GET['deleteid'];

if(!$account){
    header("location: login.php");
}
if($authority != 'admin'){
    echo "<script type='text/javascript'>alert('您沒有刪除權限!'); window.history.back();</script>";  
}

if($deleteid != NULL){

    require_once 'config.php';

	$sql1 = "DELETE FROM anime WHERE id = '$deleteid'";
    $sql2 = "DELETE FROM make WHERE anime_id = '$deleteid'";
    
    mysql_query($sql2) or die("Error Message :".mysql_error());
	mysql_query($sql1) or die("Error Message :".mysql_error());
	
    mysql_close ($link);
    echo "<script type='text/javascript'>alert('刪除成功'); window.location.href = 'index.php';</script>";   
}else{
    echo "<script type='text/javascript'>alert('刪除失敗'); window.location.href = 'index.php';</script>";   
}
?>