<?php 
    if(isset($_POST["submit"]) && $_POST["submit"] == "Sign up") 
    { 
        $user = $_POST["email"]; 
        $psw = $_POST["password"]; 
        $psw_confirm = $_POST["confirm"]; 
        if($user == "" || $psw == "" || $psw_confirm == "") 
        { 
            echo "<script>alert('Enter your email and password！'); history.go(-1);</script>"; 
        } 
        else 
        { 
            if($psw == $psw_confirm) 
            { 
                $conn = mysqli_connect("localhost","root","root","project");
                $sql = "select email from user_details where email = '$_POST[email]'";
                $result = mysqli_query($conn, $sql); 
                $num = mysqli_num_rows($result);
                if($num) 
                { 
                    echo "<script>alert('Already exist email'); history.go(-1);</script>"; 
                } 
                else
                { 
                    $sql_insert = "insert into user_details (email,password) values('$_POST[email]','$_POST[password]')"; 
                    $res_insert = mysqli_query($conn, $sql_insert); 
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
?>