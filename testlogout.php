<?php
function logout($logout){
if ($logout == "Log out")
    {
        echo"<script>alert('logout!');</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
    }
    
    else{
        
        echo "false";
        
    }
}

require_once 'PHPUnit/Autoload.php';

class OutputTest extends PHPUnit_framework_TestCase
{

   public function testlog()
   {
       $this->expectOutputString(logout("Log out"));
       print "<script>alert('logout!');</script><script type="."\""."text/javascript"."\"".">"."window.location="."\""."Login.html"."\""."</script>";
   }
    public function testlog2()
   {
       $this->expectOutputString(logout("test"));
       print "flase";
   } 
}

?>