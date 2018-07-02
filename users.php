<?php
    require_once 'session.php';
	require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>會員管理</title>
	<?php
		require_once 'header.php';
    ?>
</head>

<body>
    <?php
        require_once 'navigation.php';   
    ?>
    <script>
            document.getElementById("index").classList.remove("active");
            document.getElementById("users").classList.add("active");
    </script>
    <center id="paper">
    <h1>會員管理</h1>
    <br>
		<table>
			<tr class="title">
				<td>會員帳號</td><td>會員權限</td><td>刪除帳號</td>
			</tr>
			<?php
				$sql = "SELECT username, authority
				FROM user";
				$main = '';
				$result = mysql_query($sql) or die("Error Message:".mysql_error( ));
				while ( list($a,$b) = mysql_fetch_row($result) ){
                    $main .="<tr class='content'><td>$a</td>";
                    $main .="<td><select name='_auth'>";
                    $main .="<option value='admin'";
                    if($b == 'admin'){ $main .="selected='selected'"; }
                    $main .=">管理員</option>";
                    $main .="<option value='editor'";
                    if($b == 'editor'){ $main .="selected='selected'"; }
                    $main .=">高級會員</option>";
                    $main .="<option value='normal'";
                    if($b == 'normal'){ $main .="selected='selected'"; }
                    $main .=">一般會員</option>";
                    $main .="</select></td>";
                    $main .="<td><a><i class='fa fa-close'></i></td>";
				}
				echo $main;
				mysql_close ($link);
			?>
        </table>
            </br>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="確認修改">
        </div>
    </center>

</body>
</html>