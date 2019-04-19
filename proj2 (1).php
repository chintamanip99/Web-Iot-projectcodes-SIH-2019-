<?php
ob_start();
$time2=$GET['time2'];
$mid=$_GET['mid'];
$power=$_GET['power'];
$voltage=$_GET['voltage'];
$current=$_GET['current'];
//$pf=$_GET['pf'];

$mysql_host='fdb24.awardspace.net';
$mysql_user='2924003_sarkarilogin';
$mysql_password='mysql00p';
if($link=@mysqli_connect($mysql_host,$mysql_user,$mysql_password)){
	if(@mysqli_select_db($link,'2924003_sarkarilogin')){
		//echo "success";
	}
}
else{
	die("Cant connect to database!!sorry");	
}
//===========================================================================
date_default_timezone_set('Asia/Kolkata');
$timestamp= time();
$time=date("H:i:s", $timestamp);
$date=date("Y:m:d");
$query = "INSERT INTO `$mid`(`date`, `power`, `voltage`, `current`, `time`) VALUES ('$date','$power','$voltage','$current','$time')";
$r=mysqli_query($link,$query);
echo $r;



$query2 = "SELECT MAX(sr_no) AS max FROM dtwo";

$r2=mysqli_query($link,$query2);
$row = mysqli_fetch_array($r2);
$MAX = $row['max'];
//echo $MAX;
$query3 ="SELECT * FROM dtwo where sr_no<=$MAX AND sr_no>$MAX-10";
$r3=mysqli_query($link,$query3);
$num=mysqli_num_rows($r3);
/*for($i=0;$i<$num;$i++)
{
$row2 = mysqli_fetch_array($r3);
echo $row2['power']." watt ".$row2['pf'];
echo "<br>";
}*/
?>