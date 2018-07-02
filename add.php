<?php
	require_once 'session.php';
    require_once 'config.php';
    if(!$account){
        header("location: login.php");
    }
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
    <!--navigation bar-->
	<div class="topnav">
		<a class="active" href="index.php">Anime Wiki</a>
		<a href="#about">關於</a>
		<a href="#rand">隨機條目</a>
		
		<?php
			if(!$account){
				echo "<a class='account' href='login.php'>登入</a>";
				echo "<a class='account' href='register.php'>註冊帳號</a>";
			} else {
				echo "<a class='account' href='logout.php'>登出</a>";
				echo "<a class='account' href='account.php'>".$account."</a>";
				echo "<a class='account' href='add.php'>新增條目</a>";
			}
		?>
		<div class="search-container">
			<form  method="POST" action="searchResult.php">
				<input type="text" name="_name" placeholder="搜尋...">
				<button type="submit"><i class="fa fa-search"></i>
			</form>
		</div>
	</div>
    <center id="paper">
        <div class="wrapper">
            <br>
                <h2>新增動畫條目</h2>
            <br>
            <form method="POST" action="addResult.php">
                <div class="form-group">
                    <label>動畫名稱</label>
                    <input type="text" name="_name" class="form-control">
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
                </br><input type="submit" value="提交條目" class="btn btn-primary"></br></br>
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