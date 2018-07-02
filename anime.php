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

<html>

<head>
        <title><?php echo $name; ?></title>
        <meta http-equiv="Content-Type" content=" charset=UTF-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="./style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
        <?php
		require_once 'navigation.php';
	?>

        <center id="paper">
                <?php
                /*------Output Page------*/
                echo "<h1>$name</h1>";
                echo "<center id=\"paper\">";
                echo "<br>系列: ".$series."<br>";
                echo "<br>監督: ".$supervisor."<br>";
                echo "<br>製作公司: ".$company."<br>";
                echo "<br>角色列表:<br>";
                for($x = 0; $x<count($characters); $x++){
                echo "<br>".$characters[$x]."<br>";
                }
                echo "</center>";

                end:
                mysql_close ($link);
                ?>
        </center>

</body>
</html>