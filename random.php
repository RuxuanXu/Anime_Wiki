<?php
    require_once 'session.php';
    require_once 'config.php';
    $sql = "SELECT id 
            FROM anime";
    $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
    $a = array();
    while(list($id) = mysql_fetch_row($result)){
        array_push($a,$id);
    }
    $rand=rand(0, count($a)-1);
    echo "<script type='text/javascript'>window.location.href = 'anime.php?id=".$a[$rand]."';</script>";
?>