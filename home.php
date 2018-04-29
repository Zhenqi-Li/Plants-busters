<?php

if (isset($_POST["home"]) && $_POST["home"] == "home")
	{
		 session_start(); 
        session_destroy(); 
		echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."list.php"."\""."</script>";
	}
?>