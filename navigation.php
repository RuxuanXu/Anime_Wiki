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
				if($authority == 'admin'){
					echo "<a class='account' href='users.php'>會員管理</a>";
					echo "<a class='account' href='users.php'>條目管理</a>";
					echo "<a class='account' href='add.php'>新增條目</a>";
				}
				if($authority == 'editor'){
					echo "<a class='account' href='add.php'>新增條目</a>";
				}
				if($authority == 'normal'){
					echo "<a class='account' href='apply.php'>申請高級會員</a>";
				}
			}
		?>
		<div class="search-container">
			<form  method="POST" action="searchResult.php">
				<input type="text" name="_name" placeholder="搜尋...">
				<button type="submit"><i class="fa fa-search"></i>
			</form>
		</div>
	</div>