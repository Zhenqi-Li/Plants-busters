<?php
　　header("Content-type:text/html;charset=utf-8");
$link=mysql_connect("localhost","root","");
if($link)
{
  $select=mysql_select_db("login",$link);
  if($select)
  {
    if(isset($_POST["subl"]))
    {
      $name=$_POST["email"];
      $password=$_POST["password"];
      if($name==""||$password=="")
      {
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."please enter password or emaill！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
        exit;
      }
      $str="select password from database_user where email="."'"."$email"."'";
      mysql_query('SET NAMES UTF8');20       $result=mysql_query($str,$link);
      $pass=mysql_fetch_row($result);
      $pa=$pass[0];
      if($pa==$password)
      {
        echo"login successful！";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."content.html"."\""."</script>";
      }
      {  
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."incorrect password or email！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
      }
    }
  
  }
}
?>