<?php
  if(isset($_POST["submit"]) && $_POST["submit"] == "Sign in")
    {	
	$user = $_POST["email"]; 
	$psw = $_POST["password"]; 
	if($user == "" || $psw == "") 
	{ 
		echo "<script>alert('Enter your email and password！'); history.go(-1);</script>"; 
	} 
	else 
	{
		$conn = mysqli_connect("localhost","root","", "project", 3308);
		$sql = "select email,password from user_details where email = '$_POST[email]' and password = '$_POST[password]'"; 
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);
		if($num)
		{
			// sucessful login
			// write code to redirect to home page
			echo "<script>alert('Login successfully！');</script>";
			echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."content1.html"."\""."</script>";
			$row = mysql_fetch_array($result);
			echo $row[0];
		} 
		else 
		{ 
			echo "<script>alert('Incorrect email or password！');history.go(-1);</script>"; 
		} 
	}
	}
	else{
		echo "<script>alert('cant submit！'); history.go(-1);</script>";
	}
?>
