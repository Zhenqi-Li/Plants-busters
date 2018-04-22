<!DOCTYPE html>
<html>
<head>
<title>Search Your Plants</title>
<style>
*{
	margin: 0;
	padding: 0;
}
#top{
	background-color: #454648;
	height: 60px;
}

.search {
  width: 100%;
  position: relative;
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

#image{
	margin: 120px 20px 0px 10%;
	width:600px;
	height:500px;
	background-color: #454648;
	border-radius: 20px;
	float: left;
}
#message{
	margin: 120px 20px 0px 10px;
	width:600px;
	height:500px;
	background-color: #454648;
	border-radius: 20px;
	float:right;
	margin-right: 15%;
	color: white;
	font-size:20px;
	word-wrap:break-word ;
}
select{
	margin-top: 40px;
	margin-left: 15%;
	width:300px;
	height: 40px;
	padding:7px 0px 7px 10px;
	border:2px solid #454648;
	background-color:#454648;
	border-radius: 5px;
	font-weight:bold;
	color:white;
}
</style>
</head>

<body>
<div id="top">

	<img src="logo.png" alt="logo" style="height:50px; width: auto; margin-left: 16%; margin-right: 20px; margin-top: 5px;">
	<img src="title.png" alt="title" style="height:50px; width: auto; margin-top: 5px;">
	<form method="post" action="logout.php">
	<input type="submit" value="Log out" name="logout" style="height:40px; width: 200px; margin-left: 76%; margin-right: 20px; margin-top: 5px; background-color:'grey';">
    </form>
	<?php
	date_default_timezone_set("America/Denver");
    echo "   ". date("Y/m/d") . "<br>";
    echo "Today is " . date("l") ."<br>";
	echo " " . date("h:i:sa")."<br>";
$d1=strtotime("December 31");
$d2=ceil(($d1-time())/60/60/24);
echo "next watering：" . $d2 ." days。";

?> 
</div>


<br>
<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Search Your Plants Here.">
      <button type="submit"  class="searchButton">Search</button>
   </div>
</div>
<div id="image" align="center">
	<img src="login.png" alt="title" style="height:95%; width: 95%; margin-top: 10px;">
</div>
<div id="message">
	<p style="margin:30px;">sdasdasassssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssss</p>
</div>


<input type="button" value="Add Plants" style="width:200px; background-color:#454648; border-radius:5px; padding:7px 9px 7px 9px; color:white; margin-top:35px; margin-left: 63%;">

</body>
</html>
