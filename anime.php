<?php
        require_once 'session.php';
        require_once 'config.php';

        /*------Get Anime Data------*/
        //Anime
        $id = $_GET['id'];
        $sql = "SELECT name 
                FROM anime 
                        WHERE id = $id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($name) = mysql_fetch_row($result);

        //Company
        $sql = "SELECT name 
                FROM company NATURAL JOIN make 
                WHERE anime_id = $id
                AND company_id = company.id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($company) = mysql_fetch_row($result);

        //Series
        $sql = "SELECT name 
                FROM series NATURAL JOIN belong 
                WHERE anime_id = $id
                AND series_name = series.name";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($series) = mysql_fetch_row($result);

        //Supervisor
        $sql = "SELECT name 
                FROM supervisor NATURAL JOIN supervise
                WHERE anime_id = $id
                AND supervisor_id = supervisor.id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($supervisor) = mysql_fetch_row($result);

        //Character
        $sql = "SELECT name 
                FROM chara NATURAL JOIN act
                WHERE anime_id = $id
                AND chara_id = chara.id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        $characters = array();
        while ( list($chara) = mysql_fetch_row($result)){
        array_push($characters,$chara);
        }
?>
<!DOCTYPE html>
<html>
<head>
        <title><?php echo $name; ?></title>
        <?php
		require_once 'header.php';
	?>
</head>

<body>
        <?php
		require_once 'navigation.php';
	?>

        <center id="paper">
                
                <?php

                        $sql = "SELECT id 
                        FROM user
                        WHERE username = '".$account."'";
                        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
                        list($user_id) = mysql_fetch_row($result);

                        $already_collect = "SELECT COUNT(user_id) as count FROM collection WHERE user_id='$user_id' AND anime_id='$id';";
                        $temp = mysql_query($already_collect) or die("Error Message:".mysql_error());
                        $crow = mysql_fetch_array($temp);

                        echo "<div class='act'>";
                        if($authority == 'admin'){
                                echo "<i class='fa fa-close'></i><a href='deleteResult.php?deleteid=$id'>刪除條目 </a>";
                                echo "<i class='fa fa-cog'></i><a href='edit.php?id=$id'>編輯條目 </a>";
                                if ($crow["count"] == 0){
                                        echo "<i class='fa fa-star'></i><a href='collect.php?id=$id'>收藏條目 </a>";
                                }else{
                                        echo "<i class='fa fa-star'></i><a href='removeCollect.php?id=$id'>取消收藏 </a>"; 
                                }
                        }
                        if($authority == 'editor'){
                                echo "<i class='fa fa-cog'></i><a href='edit.php?id=$id'>編輯條目</a>";
                                if ($crow["count"] == 0){
                                        echo "<i class='fa fa-star'></i><a href='collect.php?id=$id'>收藏條目 </a>";
                                }else{
                                        echo "<i class='fa fa-star'></i><a href='removeCollect.php?id=$id'>取消收藏 </a>"; 
                                }
                        }
                        if($authority == 'normal'){
                                if ($crow["count"] == 0){
                                        echo "<i class='fa fa-star'></i><a href='collect.php?id=$id'>收藏條目 </a>";
                                }else{
                                        echo "<i class='fa fa-star'></i><a href='removeCollect.php?id=$id'>取消收藏 </a>"; 
                                }
                        }
                        echo "</div><br>";

                        echo "<h1>$name</h1>";
                        echo "<br>系列: ".$series."<br>";
                        echo "<br>監督: ".$supervisor."<br>";
                        echo "<br>製作公司: ".$company."<br>";
                        echo "<br>角色列表:<br>";
                        for($x = 0; $x<count($characters); $x++){
                        echo "<br>".$characters[$x]."<br>";
                        }

                        end:
                        mysql_close ($link);
                ?>
        </center>

</body>
</html>