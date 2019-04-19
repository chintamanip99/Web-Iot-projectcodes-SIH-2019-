<?php
$n=$_POST['name'];
$e=$_POST['email'];
$p=$_POST['password'];

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

$query="INSERT INTO `one`(`name`, `email`, `password`) VALUES ('$n','$e','$p')";
$kl=mysqli_query($link,$query);
echo $kl;



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
<center><h1><font size="10"></font></h1>
<h2><font size="7">Add a User</font></h2></center>
<center>
<font size="4"><div class="lo"></div></font>
</center>
<br><br>
<div class="container">
<center>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  
  <div class="row">
    <div class="col-25">
      <label for="fname">Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="name" placeholder="eg.VaibhavPande">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Email Id</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="email" placeholder="example1234@gmail.com">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="fname" name="password" placeholder="Password Here">
    </div>
  </div>
 
  
  <div class="row">
    <center><input type="submit" value="Submit"></center>
  </div>
  
    
 
 
  </form>
  <a href="option.php"><button><font color="black">Back To Option Page</font></button></a>
  
</div>

</body>
</html>