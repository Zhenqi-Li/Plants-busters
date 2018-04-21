<?php

if (isset($_POST["logout"]) && $_POST["logout"] == "Log out")
	{
		 session_start(); 
        session_destroy(); 
		echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
	}
?>