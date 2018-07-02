<!--PHP part-->
<?php
    require_once 'config.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_err = "";
    $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty($username)){
            $username_err = "請輸入帳號";
        }

        if(empty($password)){
            $password_err = "請輸入密碼";
        }
        
        if (!empty($username)&&!empty($password)){
            $user_exist = "SELECT COUNT(id) as count FROM user WHERE username='$username';";
            $temp = mysql_query($user_exist) or die("Error Message:".mysql_error());
            $row = mysql_fetch_array($temp);

            if ($row["count"] == 0){
                $username_err = '此帳號不存在';
            }else{
                $sql = "SELECT password as real_password FROM user WHERE username='$username';";
                $temp = mysql_query($sql) or die("Error Message:".mysql_error());
                $row = mysql_fetch_array($temp);

                if($password == $row['real_password']){
                    //login success
                    session_start();
                    $_SESSION['username'] = $username; 
                    echo "<script type='text/javascript'>alert('登入成功');window.location.href = 'index.php';</script>";     
                } else{
                    $password_err = '密碼錯誤';
                }
            }
        }
        
        mysql_close($link);
    }
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content=" charset=UTF-8"/>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta http-equiv="Content-Type" content=" charset=UTF-8"/>
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
            <h2>登入</h2>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>帳號</label>
                    <input type="text" name="username"class="form-control" value="<?php echo $username;?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>密碼</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="登入">
                </div>
                <p>沒有帳號? <a href="register.php">註冊會員</a></p>
            </form>
        </div>
    </center>  
</body>
</html>