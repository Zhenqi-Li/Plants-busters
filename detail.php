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
			margin: 150px auto;
		}
		#top{
			margin-top: 0;
			background-color: #454648;
			height: 60px;
		}

	</style>
</head>
<body>
	<div id="top">
		<img src="logo.png" alt="logo" style="height:50px; width: auto; margin-left: 16%; margin-right: 20px; margin-top: 5px;">
		<img src="ntitle.png" alt="title" style="height:50px; width: auto; margin-top: 5px;">
		<form method="post" action="home.php">
			<input type="submit" value="home" name="home" style="color: white; height:40px; width: 200px; border-radius: 10px; margin-left: 76%; margin-right: 20px; margin-top: 47px; background-color:#454648;">
		</form>
	</div>

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
			<p>Time to water:</p>
<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date();//.addhours(4);
countDownDate.setHours(countDownDate.getHours() + <?php echo $val['phour'];?> )

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();


  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

		<?php } ?>
	</ul>
	
		<form method="post" action="add.php">
			<input type="submit" value="add" name="add" style="color: white; height:40px; width: 200px; border-radius: 10px; margin-left: 76%; margin-right: 20px; margin-top: 47px; background-color:#454648;">
		</form>
	
</body>
</html>