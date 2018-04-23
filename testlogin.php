<?php
function login($submit,$email,$password,$num){
  if($submit == "Sign in")
    { 
    $user = $email; 
    $psw = $password; 
    if($user == "" || $psw == "") 
    { 
      echo "<script>alert('Enter your email and password！'); history.go(-1);</script>"; 
    } 
    else 
    {
    if($num)
    {
      echo "<script>alert('Login successfully！');</script>";
      echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."content1.html"."\""."</script>";
    } 
    else 
    { 
      echo "<script>alert('Incorrect email or password！');history.go(-1);</script>"; 
    } 
  }
  }
  else{
    echo "<script>alert('cant submit!'); history.go(-1);</script>";
  }
}

require_once 'PHPUnit/Autoload.php';

class OutputTest extends PHPUnit_framework_TestCase
{

   public function testlogin1()
   {
       $this->expectOutputString(login("Sign in","","",true));
       print "<script>alert('Enter your email and password！'); history.go(-1);</script>";
   } 
   public function testlogin2()
   {
       $this->expectOutputString(login("Sign in","123@123.com", "123", true));
       print "<script>alert('Login successfully！');</script><script type="."\""."text/javascript"."\"".">"."window.location="."\""."content1.html"."\""."</script>";
   }
   public function testlogin3()
   {
       $this->expectOutputString(login("test","123@123.com", "123", false));
       print "<script>alert('cant submit!'); history.go(-1);</script>";
   }
  public function testlogin4()
   {
       $this->expectOutputString(login("Sign up","123@123.com", "123", false));
       print "<script>alert('Incorrect email or password！');history.go(-1);</script>";
   }

}

?>