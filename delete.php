<?php


$m1=(int)$_POST['machine1'];
$m2=(int)$_POST['machine2'];
$m3=(int)$_POST['machine3'];

//=====================================================================================
session_start();

if(!isset($_SESSION["aemail"]) or !isset($_SESSION["apassword"])){
        exit("Not Authorized");
}

//==========================================================================

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

$uy="ALTER TABLE machine1 AUTO_INCREMENT = 15";
mysqli_query($link,$uy);


$query1 = "SELECT MIN(id) AS min FROM machine1";
$query2 = "SELECT MIN(id) AS min FROM machine2";
$query3 = "SELECT MIN(id) AS min FROM machine3";

$r1=mysqli_query($link,$query1);
$r2=mysqli_query($link,$query2);
$r3=mysqli_query($link,$query3);

$row1 = mysqli_fetch_array($r1);
$row2 = mysqli_fetch_array($r2);
$row3 = mysqli_fetch_array($r3);

$MIN1 = $row1['min'];
$MIN2 = $row2['min'];
$MIN3 = $row3['min'];

for($i=$MIN1;$i<=$m1+$MIN1-1;$i++){
$qwe1="DELETE FROM `machine1` WHERE id='$i'";
$ideal1=mysqli_query($link,$qwe1);
echo $ideal1;
}

$i=0;

for($i=$MIN2;$i<=$m2+$MIN2-1;$i++){
$qwe2="DELETE FROM `machine2` WHERE id='$i'";
$ideal2=mysqli_query($link,$qwe2);
echo $ideal2;
}

$i=0;

for($i=$MIN3;$i<=$m3+$MIN3-1;$i++){
$qwe3="DELETE FROM `machine3` WHERE id='$i'";
$ideal3=mysqli_query($link,$qwe3);
echo $ideal3;
}

?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="javascript/text">
</script>
<style>
.selthis {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.menuone{
  position: relative;
  display: inline-block;
}
* {
  box-sizing: border-box;
}
.menuone:hover .selthis {display: block;}
.menuone:hover .selthis {background-color: #3e8e41;}
input[type=text],[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=submit],[type=button] {
  background-color: black;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
input[type=submit]:hover {
  background-color: green;
}
input[type=button]:hover {
  background-color: blue;
}
.container {
  opacity:0.7;
  color:black;
  font-color:white;
  border-radius: 20px;
  background-color: #80ced6;
  padding: 20px;
  width:700px;
  align:center;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
body{
	background-image:url("shield.jpg");
  background-color: black;
        background-size:1500px 800px;
	background-repeat:no-repeat;
}
h1{
  color:black;
  
}
h2{
  color:black;
  
}
.lo{
  background-color:#80ced6;
  
}
</style>
</head>
<body>

<center>
<font size="4"><div class="lo"><font size="8">Delete Data Readings of machines</font></div></font>
</center>
<br><br>
<div class="container">
<center>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


  <div class="row">
    <div class="col-25">
      <label for="fname">Machine 1</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="machine1" placeholder="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Machine 2</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="machine2" placeholder="">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="fname">Machine 3</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="machine3" placeholder="">
    </div>
  </div>
 
  
  <div class="row">
    <center><input type="submit" value="Submit"></center>
  </div>
  
    <br>
 
 
  </form>
  <button><a href="option.php"><font color="black">Back To Option Page</font></a></button>
</div>

</body>
</html>