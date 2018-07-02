<?php
    require_once 'session.php';
    require_once 'config.php';
    $id = $_GET['id'];

    if(!$account){
        header("location: login.php");
    }
    if($authority != 'admin'){
        echo "<script type='text/javascript'>alert('您沒有權限執行此動作');window.history.back();</script>"; 
    }

    $already_collect = "SELECT COUNT(username) as count FROM user WHERE username='$id';";
    $temp = mysql_query($already_collect) or die("Error Message:".mysql_error());
    $crow = mysql_fetch_array($temp);
    if ($crow["count"] == 0){
        echo "<script type='text/javascript'>alert('執行失敗');window.history.back();</script>";  
    } else {
        $sql = "DELETE FROM user WHERE username='$id';";
        mysql_query($sql) or die("Error Message:".mysql_error( ));
        echo "<script type='text/javascript'>alert('已刪除用戶');window.location.href = 'users.php';</script>";    
    }
?>