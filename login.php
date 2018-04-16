<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error_log");
    } 

    include('connect.php');
    $Email = $_POST['Email'];
    $passowrd = $_POST['password'];

    if ($Email && $passowrd){
             $sql = "select * from user where email = '$Email' and password='$passowrd'";
             $result = mysql_query($sql);
             $rows=mysql_num_rows($result);
             if($rows){
                   header("refresh:0;url=  .html");
                   exit;
             }else{
                echo "wrong email or password";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";
             }
             

    }else{
                echo "fill either password or email";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        
    }

    mysql_close();
?>