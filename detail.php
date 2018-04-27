
<?php
include_once("db.php");
$db = new db();
$id = $_GET['id'];
$dataArr = $db->fetch_all("select * from plants where id=$id");
//print_r($dataArr);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>list</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		ul li{
			display: inline-block;
		}
		.img{
			float: left;
			margin-right: 20px;
		}
		.img img{
			padding: 5px;
			border:1px solid #ddd;
			border-radius: 5px;
		}
		.cont{
			overflow: hidden;
			line-height: 1.8;
			text-align: justify;
		}
		.container{
			width: 80%;
			margin: 0 auto;
		}

	</style>
</head>
<body>

	<ul class="container">
		<?php

			foreach($dataArr as $key => $val){ 
		?>
		
			<li>
				<div class="img">
					<a href="detail.php?id=<?php echo $val['id'];?>">
						<img src="<?php echo $val['pimg'];?>" width="200" height="200" alt=""/>
							
					</a>
				</div>
				<div class="cont">
					<h2>
						<a href="detail.php?id=<?php echo $val['id'];?>"><?php echo $val['pname'];?></a>
					</h2>
					<p><?php echo $val['pdescription'];?></p>
				</div>
				

			</li>

		<?php } ?>
	</ul>
</body>
</html>