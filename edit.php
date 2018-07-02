<?php
	require_once 'session.php';
    require_once 'config.php';
    if(!$account){
        header("location: login.php");
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
        /*------Insert Into Database------*/
        //Anime
        $anime_exist = "SELECT COUNT(name) as count FROM anime WHERE name='$name';";
        $temp = mysql_query($anime_exist) or die("Error Message:".mysql_error());
        $crow = mysql_fetch_array($temp);

        if ($crow["count"] == 0){
            $sql = "INSERT INTO anime(id, name) VALUES ('default','$name');";
            mysql_query($sql) or die("Error Message:".mysql_error());
            $select_id = "SELECT MAX(id) AS aniid FROM anime;";
            $ani_id = mysql_query($select_id) or die("Error Message:".mysql_error());
            $row = mysql_fetch_array($ani_id);
            $ani_id = $row["aniid"];
        }else {
            $select_id = "SELECT MAX(id) AS aniid FROM anime WHERE name = '$name';";
            $ani_id = mysql_query($select_id) or die("Error Message:".mysql_error());
            $row = mysql_fetch_array($ani_id);
            $ani_id = $row["aniid"];
            $name_err = "此條目已存在! 請至<a href=\"anime.php?id=$ani_id\">".$name."</a>詞條頁面編輯。";
            goto end; 
        }

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

        //Chara
        for($x = 0; $x<$chara_num; $x++){
            //$voiceactors[$x]
            //insert into chara
            $chara_name = $characters[$x];

            $chara_exist = "SELECT COUNT(name) as count FROM chara WHERE name='$chara_name';";
            $temp = 0;
            $temp = mysql_query($chara_exist) or die("Error Message123:".mysql_error());
            $row = mysql_fetch_array($temp);

            if ($row["count"] == 0){ //if same name not exist

                $sql = "INSERT INTO chara(id, name) VALUES ('default','$chara_name');";
                mysql_query($sql) or die("Error Message32:".mysql_error());
                
                $select_id = "SELECT MAX(id) AS id FROM chara;";
                $chara_id = mysql_query($select_id) or die("Error Message345 :".mysql_error());
                $row = mysql_fetch_array($chara_id);
                $chara_id = $row["id"];

                //insert into act
                $sql = "INSERT INTO act(chara_id, anime_id) VALUES ('$chara_id','$ani_id');";
                mysql_query($sql) or die("Error Message5 :".mysql_error());

            }else{//if same name exist

                $exist_id = "SELECT id FROM chara WHERE name='$chara_name';";
                $temp = mysql_query($exist_id) or die("Error Message47:".mysql_error());
                        
                while ( list($a) = mysql_fetch_row($temp)){
            
                    $ani_count = "SELECT COUNT(anime_id) as count
                        FROM act
                        WHERE chara_id = '$a'
                        AND anime_id = '$ani_id';";
                    
                    $temp = mysql_query($ani_count) or die("Error Message:".mysql_error());
                    $row = mysql_fetch_array($temp);
                    
                    if ($row["count"] == 0){
                        $sql = "INSERT INTO chara(id, name) VALUES ('default','$chara_name');";
                        mysql_query($sql) or die("Error Message 1:".mysql_error());
                        
                        $select_id = "SELECT MAX(id) AS id FROM chara;";
                        $id = mysql_query($select_id) or die("Error Message :".mysql_error());
                        $row = mysql_fetch_array($id);
                        $chara_id = $row["id"];

                        //Act
                        $sql = "INSERT INTO act(chara_id, anime_id) VALUES ('$chara_id','$ani_id');";
                        mysql_query($sql) or die("Error Message5 :".mysql_error());
                    }
                }
            }
        }

        //Period
        $period_exist = "SELECT COUNT(year) as count FROM period WHERE year='$year' AND season='$season';";
        $temp = mysql_query($period_exist) or die("Error Message:".mysql_error());
        $crow = mysql_fetch_array($temp);

        if ($crow["count"] == 0){
            $sql = "INSERT INTO period(year, season) VALUES ('$year','$season');";
            mysql_query($sql) or die("Error Message:".mysql_error());
        }
        
        //Showtime
        $sql = "INSERT INTO showtime(anime_id,year,season) VALUES ('$ani_id','$year','$season');";
        mysql_query($sql) or die("Error Message:".mysql_error());

        echo "<script type='text/javascript'>alert('新增成功');window.location.href = 'index.php';</script>";
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
    <center id="paper">
        <div class="wrapper">
            <br>
                <h2>編輯動畫條目</h2>
            <br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label>動畫名稱</label>
                    <input type="text" name="_name" class="form-control" value="<?php echo $name;?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>系列名稱</label>
                    <input type="text" name="_series_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>製作公司</label>
                    <input type="text" name="_company_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>監督</label>
                    <input type="text" name="_supervisor_name" class="form-control">
                </div>
                <div class="form-group">
                <label>放送資訊</label><br>
                    <label>年份</label> 
                        <input type="text" name="_year" class="form-control">
                        <br>
                    <label>季節</label> 
                        <select name="_season" class="form-control">
                        <option value="春">春</option>
                        <option value="夏">夏</option>
                        <option value="秋">秋</option>
                        <option value="冬">冬</option>
                    </select></br>
                </div>
                <div class="form-group">
                    <label>動畫角色</label>
                    <input type="text" id="chara_num" name="_chara_num" value="1">
                    <div id="chara">
                        <div>
                            角色名稱 <input type="text" name="_chara_name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <input type="button" value="增加角色" onclick="addCharacter();">
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