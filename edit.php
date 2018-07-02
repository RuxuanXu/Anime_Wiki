<?php
	require_once 'session.php';
    require_once 'config.php';
    $id = $_GET['id'];

    if(!$account){
        header("location: login.php");
    }
    /*------Get Anime Data------*/
        //Anime
        $id = $_GET['id'];
        $sql = "SELECT name 
                FROM anime 
                        WHERE id = $id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($name1) = mysql_fetch_row($result);

        //Company
        $sql = "SELECT name 
                FROM company NATURAL JOIN make 
                WHERE anime_id = $id
                AND company_id = company.id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($company1) = mysql_fetch_row($result);

        //Series
        $sql = "SELECT name 
                FROM series NATURAL JOIN belong 
                WHERE anime_id = $id
                AND series_name = series.name";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($series1) = mysql_fetch_row($result);

        //Supervisor
        $sql = "SELECT name 
                FROM supervisor NATURAL JOIN supervise
                WHERE anime_id = $id
                AND supervisor_id = supervisor.id";
        $result = mysql_query($sql) or die("Error Message:".mysql_error( ));
        list($supervisor1) = mysql_fetch_row($result);

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

    /*------Fetch Input Form------*/
    $name = $_POST['_name'];
    $name_err = "";
    $comp_name = $_POST['_company_name'];
    $series_name = $_POST['_series_name'];
    $supervisor_name = $_POST['_supervisor_name'];
    $year = $_POST['_year'];
    $season = $_POST['_season'];
    $chara_num = (int)$_POST['_chara_num'];
    $characters = array();
    $voiceactors = array();

    for($x = 0; $x<$chara_num; $x++){
        $tag = '_chara_name';
        $voice_tag = '_voice_name';
        if($x) {
            $tag = $tag.$x;
            $voice_tag = $voice_tag.$x;
        }
        array_push($characters,$_POST[$tag]);
        array_push($voiceactors,$_POST[$voice_tag]);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($name)){
                $name_err = "此欄位不可為空";
                goto end;
        }
        /*------Update Database------*/
        //Company
        $company_exist = "SELECT COUNT(name) as count FROM company WHERE name='$comp_name';";
        $temp = mysql_query($company_exist) or die("Error Message:".mysql_error());
        $crow = mysql_fetch_array($temp);

        if ($crow["count"] == 0){
            $sql2 = "INSERT INTO company(id, name) VALUES ('default','$comp_name');";
            mysql_query($sql2) or die("Error Message:".mysql_error());	
            $select_id = "SELECT MAX(id) AS compid FROM company;";
        }else {
            $select_id = "SELECT MAX(id) AS compid FROM company WHERE name = '$comp_name';";
        }
        $comp_id = mysql_query($select_id) or die("Error Message:".mysql_error());
        $row = mysql_fetch_array($comp_id);
        $comp_id = $row["compid"];

        //Make
        $sql = "INSERT INTO make(anime_id, company_id) VALUES ('$ani_id','$comp_id');";
        mysql_query($sql) or die("Error Message:".mysql_error());

        //Series
        $series_exist = "SELECT COUNT(name) as count FROM series WHERE name='$series_name';";
        $temp = mysql_query($series_exist) or die("Error Message:".mysql_error());
        $crow = mysql_fetch_array($temp);

        if ($crow["count"] == 0){
            $sql = "INSERT INTO series(name) VALUES ('$series_name');";
            mysql_query($sql) or die("Error Message:".mysql_error());
        }

        //Belong
        $sql = "INSERT INTO belong(series_name, anime_id) VALUES ('$series_name','$ani_id');";
        mysql_query($sql) or die("Error Message:".mysql_error());

        //Supervisor
        $exist = "SELECT COUNT(name) as count FROM supervisor WHERE name='$supervisor_name';";
        $temp = mysql_query($exist) or die("Error Message:".mysql_error());
        $crow = mysql_fetch_array($temp);

        if ($crow["count"] == 0){
            $sql2 = "INSERT INTO supervisor(id, name) VALUES ('default','$supervisor_name');";
            mysql_query($sql2) or die("Error Message 1:".mysql_error());
            $select_id = "SELECT MAX(id) AS id FROM supervisor;";
        }else {
            $select_id = "SELECT MAX(id) AS id FROM supervisor WHERE name = '$supervisor_name';";
        }
        $id = mysql_query($select_id) or die("Error Message:".mysql_error());
        $row = mysql_fetch_array($id);
        $supervisor_id = $row["id"];

        //Supervise
        $sql = "INSERT INTO supervise(supervisor_id, anime_id) VALUES ('$supervisor_id','$ani_id');";
        mysql_query($sql) or die("Error Message:".mysql_error());
    }
    end: 
    mysql_close ($link);
?>

<html>

<head>
    <title>Anime Wiki</title>
    <meta http-equiv="Content-Type" content=" charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
		require_once 'navigation.php';
    ?>
    <script>
            document.getElementById("index").classList.remove("active");
            document.getElementById("data").classList.add("active");
    </script>
    <center id="paper">
    <h1>編輯動畫條目</h1>
    <br>
        <div class="wrapper">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label>動畫名稱</label>
                    <input type="text" name="_name" class="form-control" value="<?php echo $name1;?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>系列名稱</label>
                    <input type="text" name="_series_name" class="form-control" value="<?php echo $series1;?>">
                </div>
                <div class="form-group">
                    <label>製作公司</label>
                    <input type="text" name="_company_name" class="form-control"value="<?php echo $company1;?>">
                </div>
                <div class="form-group">
                    <label>監督</label>
                    <input type="text" name="_supervisor_name" class="form-control" value="<?php echo $supervisor1;?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="確認修改">
                </div>
            </form>
        </div>
    </center>  

    <script>
        function addCharacter() {
            var chara = document.getElementById("chara");
            var num = chara.children.length;
            console.log(num);
            document.getElementById("chara_num").value = num + 1;

            var div = document.createElement("div");
            var txt = "角色名稱 <input type='text' name='_chara_name" + num + "' class='form-control'>";
            div.innerHTML = txt;
            chara.appendChild(div);
        }
    </script>
</body>

</html>