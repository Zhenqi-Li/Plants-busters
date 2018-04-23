<?php
function signup($signup,$email,$password,$confirm,$exist,$res_insert){
    if($signup == "Sign up") 
    { 
        $user = $email; 
        $psw = $password; 
        $psw_confirm = $confirm; 
        if($user == "" || $psw == "" || $psw_confirm == "") 
        { 
            echo "<script>alert('Enter your email and password！'); history.go(-1);</script>"; 
        } 
        else 
        { 
            if($psw == $psw_confirm) 
            { 
                if($exist) 
                { 
                    echo "<script>alert('Already exist email'); history.go(-1);</script>"; 
                } 
                else
                {  
                    if($res_insert) 
                    { 
                        echo "<script>alert('Sign up successfully！');</script>";
            echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
                    } 
                    else 
                    { 
                        echo "<script>alert('Server Busy！'); history.go(-1);</script>"; 
                    } 
                } 
            }
            else if($psw != $psw_confirm)
            { 
        echo "<script>alert('Passwords have to be the same!'); history.go(-1);</script>";
            }
        } 
    } 
    else 
    { 
        echo "<script>alert('Fail！'); history.go(-1);</script>"; 
    } 
}

require_once 'PHPUnit/Autoload.php';

class OutputTest extends PHPUnit_framework_TestCase
{

   public function testsignup1()
   {
       $this->expectOutputString(signup("Sign up","","123","123",true,true));
       print "<script>alert('Enter your email and password！'); history.go(-1);</script>";
   }
   public function testsignup2()
   {
       $this->expectOutputString(signup("Sign up","123@123.com","123","123",true,true));
       print "<script>alert('Already exist email'); history.go(-1);</script>";
   }
  public function testsignup3()
   {
       $this->expectOutputString(signup("Sign up","123@123.com","123","123",false,true));
       print "<script>alert('Sign up successfully！');</script><script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
   }
  public function testsignup4()
   {
       $this->expectOutputString(signup("Sign up","123@123.com","123","123",false,false));
       print "<script>alert('Server Busy！'); history.go(-1);</script>";
   }
  public function testsignup5()
   {
       $this->expectOutputString(signup("Sign up","123@123.com","123","321",true,true));
       print "<script>alert('Passwords have to be the same!'); history.go(-1);</script>";
   }
  public function testsignup6()
   {
       $this->expectOutputString(signup("test","123@123.com","123","321",true,true));
       print "<script>alert('Fail！'); history.go(-1);</script>";
   }
}

?>