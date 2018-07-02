<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    echo "<script type='text/javascript'>alert('掰掰!!');window.location.href = 'index.php';</script>";   
    exit;
?>