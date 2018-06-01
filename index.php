
<html>
<head>
<title>Anime Wiki</title>
<meta http-equiv="Content-Type" content=" charset=UTF-8"/>
</head>

<style>
    body {
        background-color: #CCC;
        font-family: 'Slabo 27px', serif;
    }
    
    h1 {
        color: #777;
        font-size: 44px;
        text-align: center;
    }

	table {
        border: 1px solid black;
     	width: 600px;
    }
    
    #paper {
		position: absolute;
		background-color: #fff;
        height: 50%;
        width: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
		overflow-y:scroll;
    }

    #add {
		position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, 0%);
	}

	#search {
		position: absolute;
        top: 78%;
        left: 50%;
        transform: translate(-50%, 0%);
	}

	.title {
		font-weight: bold;
		text-align: center;
	}

	.content {
		text-align: center;
	}

    .footer {
        position: fixed;
        left: 0;
        bottom: 5px;
        width: 100%;
        color: white;
        text-align: center;
    }
</style>

<body>
<br><h1>Anime Wiki</h1>

<center>

	<a id="add" href="add.html">添加新動畫</a></br></br>
	
    <form  id="search" method="POST" action="searchResult.php">
        搜尋: <input type="text" name="_name">
       <input type="submit" value="送出">
	</form>
	
</center>

<center id="paper">
<!--    PHP Part Start    -->
<?php

$db_server = "localhost";
$db_name = "anime_wiki"; 
$db_user = "root"; 
$db_passwd = "1234qwer"; 

//Connect Sever
$link = mysql_connect($db_server, $db_user, $db_passwd);
//Connect Database
mysql_select_db($db_name) or die("No database");

mysql_query("SET NAMES 'UTF-8'");
$sql = "SELECT anime.name, company.name, anime.id 
        FROM anime, make, company 
        WHERE anime.id = anime_id 
		and company.id = company_id;";
		
$result = mysql_query($sql) or die("Error Message:".mysql_error( ));

$main .='<h3>動畫條目</h3>';
$main .='<table border="0" cellspacing="0" cellpadding="0" width="396">
         <tr>
			<td>';
$main .='	<table>
			<tr class="title"><td>動畫名稱</td><td>製作公司</td><td></td></tr>';
		while ( list($a,$b,$c) = mysql_fetch_row($result) ){
			$main .="<tr class='content'><td>$a</td><td>$b</td>";
			$main .='<td><a href="deleteResult.php?deleteid='.$c.'" onclick="return confirm("delete?")";>刪除</a></td></tr>';
	}
$main .='</table></td></tr></table>';		  
echo $main;
mysql_close ($link);
?>

<!--    PHP Part End   -->
</center>

</body>
</html>