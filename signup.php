<?php
$link=mysql_connect("localhost","root","");
header("Content-type:text/html;charset=utf-8");
if($link)
  {  
   
    $select=mysql_select_db("login",$link);
    if($select)
    {
     
      if(isset($_POST["sub"]))
      {
        $name=$_POST["Email"];
        $password1=$_POST["password"];
        $password2=$_POST["password2"];
        if($name==""||$password1=="")
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."please fill all the information！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."signup.html"."\""."</script>";    
          exit;
        }
        if($password1==$password2)
        {
        $str="select count(*) from database_user where username="."email'"."$email"."'";
        $result=mysql_query($str,$link);
        $pass=mysql_fetch_row($result);
        $pa=$pass[0];
        if($pa==1)
        {
         
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."please use anthor email address"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."signup.html"."\""."</script>";   
        exit; 
        }
         
         
        $sql="insert into register values("."\""."$email"."\"".","."\""."$password1"."\"".")";
        mysql_query($sql,$link);
        mysql_query('SET NAMES UTF8');
        $close=mysql_close($link);
        if($close)
        {
         
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."return.html"."\""."</script>";    
        }
        }
        else
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."inconrrect password！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."signup.html"."\""."</script>";    
        }
      }
    }
  }
?>