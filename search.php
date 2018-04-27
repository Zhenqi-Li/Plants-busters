
<?php
include_once("db.php");
$db = new db();
$key = $_GET['key'];

$dataArr = $db->fetch_all("select * from plants where pname='$key'");

//print_r($dataArr);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>list</title>
	<style type="text/css">
		*{margin:0;padding: 0;}
		ul li{
			display: inline-block;
			vertical-align: top;
			margin: 20px 20px 0 0;
		}
		.container{
			width: 80%;
			margin: 0 auto;
		}
		input, button{
			padding: 5px;
			border:1px solid #ddd;

		}
	</style>
</head>
<body>
	<div class="container">
		
	
	<div class="search">
		<form action="search.php" method="post">
			<input type="text" name="search" placeholder="Please enter name"/>
			<button type="submit">Search</button>
		</form>
		
	</div>
	<ul>
		<?php

			foreach($dataArr as $key => $val){ 
		?>
		
			<li>
				<div class="img">
					<a href="detail.php?id=<?php echo $val['id'];?>">
						<img src="<?php echo $val['pimg'];?>" width="200" height="200" alt=""/>
							
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