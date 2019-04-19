<?php
ob_start();
session_start();

//============================================================================

$mysql_host='fdb24.awardspace.net';
$mysql_user='2924003_sarkarilogin';
$mysql_password='mysql00p';
if($link=@mysqli_connect($mysql_host,$mysql_user,$mysql_password)){
	if(@mysqli_select_db($link,'2924003_sarkarilogin')){
		echo "success";
	}
}
else{
	die("Cant connect to database!!sorry");	
}

//===========================================================================

$query="SELECT * FROM `adminwala`";
$flag=0;
if(isset($_POST["email"]) && isset($_POST["password"])){
          if($is_query_run=mysqli_query($link,$query)){
                echo 'query executed';
                while($query_execute=mysqli_fetch_assoc($is_query_run)){
                        if(($query_execute['email']==$_POST["email"]) && ($query_execute['password']==$_POST["password"])){
                                $flag=1;
                        }
                }
                if($flag==1){
                                echo "you can proceed!!";
                                $_SESSION["aemail"]=$_POST["email"];
                                $_SESSION["apassword"]=$_POST["password"];
                                $_SESSION["email"]=$_POST["email"];
                                $_SESSION["password"]=$_POST["password"];
                                header("Location:option.php",true,301);
                }
                else{
                        echo "you cant proceed";
                }
        }
}
else{
        echo "Please fill the password and email blocks";
}
?>
