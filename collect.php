<?php
    require_once 'session.php';
    require_once 'config.php';
    $id = $_GET['id'];

    if(!$account){
        header("location: login.php");
    }
    $sql = "SELECT id 
            FROM user
            WHERE username = '".$account."'";
    $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
    list($user_id) = mysql_fetch_row($result);

    $already_collect = "SELECT COUNT(user_id) as count FROM collection WHERE user_id='$user_id' AND anime_id='$id';";
    $temp = mysql_query($already_collect) or die("Error Message:".mysql_error());
    $crow = mysql_fetch_array($temp);

    if ($crow["count"] == 0){
        $sql = "INSERT INTO collection(user_id, anime_id) VALUES ('$user_id','$id');";
        mysql_query($sql) or die("Error Message:".mysql_error( ));
        echo "<script type='text/javascript'>alert('收藏成功!!');window.history.back();</script>";   
    } else {
        echo "<script type='text/javascript'>alert('已經收藏過了!!');window.history.back();</script>";   
    }
?>