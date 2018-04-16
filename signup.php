<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("error_log");
    }

    $name=$_POST['Email'];
    $password=$_POST['password'];

    include('connect.php');
    $q="insert into user(Email,password) values ('$Email','$password')";
    $reslut=mysql_query($q,$con);
    
    if (!$reslut){
        die('Error: ' . mysql_error());
    }else{
        echo "signup successful";
    }

    

    mysql_close($con);

?>