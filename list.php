<?php
include_once("db.php");
$db = new db();
$dataArr = $db->fetch_all("select * from plants");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Search your Plants</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		ul li{
			display: inline-block;
			vertical-align: top;
			margin: 20px 20px 0 0;
		}
		.container{
			width: 80%;
			margin: 0 auto;
		}
		#top{
			margin-top: 0;
			background-color: #454648;
			height: 60px;
		}
		.searchTerm {
			float: left;
			width: 100%;
			border: 3px solid #454648;
			padding: 5px;
			height: 20px;
			border-radius: 5px;
			outline: none;
		}

		.searchTerm:focus{
			color: black;
		}
		.searchButton {
			position: absolute;  
			right: -50px;
			width: 60px;
			height: 36px;
			border: 1px solid #454648;
			background-color:#454648; 
			border-radius: 5px;
			color:white;
		}
		.wrap{
			width: 25%;
			position: absolute;
			top: 15%;
			left: 30%;
			transform: translate(-90%, -90%);
		}
	</style>
</head>
<body>
	<div id="top">
		<img src="logo.png" alt="logo" style="height:50px; width: auto; margin-left: 16%; margin-right: 20px; margin-top: 5px;">
		<img src="ntitle.png" alt="title" style="height:50px; width: auto; margin-top: 5px;">
		<form method="post" action="logout.php">
			<input type="submit" value="Log out" name="logout" style="color: white; height:40px; width: 200px; border-radius: 10px; margin-left: 76%; margin-right: 20px; margin-top: 47px; background-color:#454648;">
		</form>
	</div>	
	<div class="wrap">
	<div class="search">
		<form action="search.php" method="get">
			<input type="text" class="searchTerm" name="key" placeholder="Search Your Plants Here."/>
			<button type="submit" class="searchButton">Search</button>
		</form>
	</div>
	</div>
	<div class="container" style="margin-top:100px;">
	<ul>
		<?php
			foreach($dataArr as $key => $val){ 
		?>
		
			<li>
				<div class="img">
					<a href="detail.php?id=<?php echo $val['id'];?>">
						<img src="<?php echo $val['pimg'];?>" width="200px" height="200px" alt="flower image"/>
							
					</a>
				</div>
				<p>
					<a href="detail.php?id=<?php echo $val['id'];?>"><?php echo $val['pname'];?></a>
				</p>

			</li>

		<?php } ?>
	</ul>
	</div>
	
</body>
</html>