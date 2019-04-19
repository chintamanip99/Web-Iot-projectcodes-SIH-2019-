<?php

session_start();

if(!isset($_SESSION["email"]) or !isset($_SESSION["password"])){
        exit($_SESSION["email"]);
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
//===========================================================================





$query2 = "SELECT MAX(id) AS max FROM machine2";

$r2=mysqli_query($link,$query2);
$row = mysqli_fetch_array($r2);
$MAX = $row['max'];
//echo $MAX;
$query3 ="SELECT * FROM machine2 where id<=$MAX AND id>$MAX-21";
$r3=mysqli_query($link,$query3);
$num=mysqli_num_rows($r3);

$pw=array();
$tm=array();
$pf=array();

for($i=0;$i<$num;$i++)
{
$row2 = mysqli_fetch_array($r3);
$pw[$i]=(float)$row2['power'];
$tm[$i]=$row2['time'];
$pf[$i]=(float)$row2['powerfactor'];
//echo $row2['power']." watt ".$row2['time'];
//echo "<br>";

}
$qwe1="SELECT `ipower` FROM `ideal2` WHERE 1";
$ideal1=mysqli_query($link,$qwe1);
$ideal=mysqli_fetch_array($ideal1);
echo $ideal['ipower'];
//for($i=0;$i<12;$i++)
//{
//echo $row2['power']." watt ".$tm[i];

$dataPoints2 = array(
	array("label"=> $tm[0], "y"=> $pw[0] ),
	array("label"=> $tm[1], "y"=> $pw[1] ),
	array("label"=> $tm[2], "y"=> $pw[2] ),
	array("label"=> $tm[3], "y"=> $pw[3] ),
	array("label"=> $tm[4], "y"=> $pw[4] ),
	array("label"=> $tm[5], "y"=> $pw[5] ),
	array("label"=> $tm[6], "y"=> $pw[6] ),
	array("label"=> $tm[7], "y"=> $pw[7] ),
	array("label"=> $tm[8], "y"=> $pw[8] ),
        array("label"=> $tm[9], "y"=> $pw[9] ),
        array("label"=> $tm[10], "y"=> $pw[10] ),
        array("label"=> $tm[11], "y"=> $pw[11] ),
        array("label"=> $tm[12], "y"=> $pw[12] ),
        array("label"=> $tm[13], "y"=> $pw[13] ),
        array("label"=> $tm[14], "y"=> $pw[14] ),
        array("label"=> $tm[15], "y"=> $pw[15] ),
        array("label"=> $tm[16], "y"=> $pw[16] ),
        array("label"=> $tm[17], "y"=> $pw[17] ),
        array("label"=> $tm[18], "y"=> $pw[18] ),
	array("label"=> $tm[19], "y"=> $pw[19] )
);
 
$dataPoints1 = array(
	array("label"=> "2007", "y"=> 3454  ),
	array("label"=> "2008", "y"=> 31917 ),
	array("label"=> "2009", "y"=> 25972 ),
	array("label"=> "2010", "y"=> 23337 ),
	array("label"=> "2011", "y"=> 16086 ),
	array("label"=> "2012", "y"=> 13403 ),
	array("label"=> "2013", "y"=> 13820 ),
	array("label"=> "2014", "y"=> 18276 ),
	array("label"=> "2015", "y"=> 17372 ),
	array("label"=> "2016", "y"=> 13008 )
);
 
$dataPoints3 = array(
	array("label"=> "2007", "y"=> 896590 ),
	array("label"=> "2008", "y"=> 882981 ),
	array("label"=> "2009", "y"=> 920979 ),
	array("label"=> "2010", "y"=> 987697 ),
	array("label"=> "2011", "y"=> 1013689 ),
	array("label"=> "2012", "y"=> 1225894 ),
	array("label"=> "2013", "y"=> 1124836 ),
	array("label"=> "2014", "y"=> 1126609 ),
	array("label"=> "2015", "y"=> 1333482 ),
	array("label"=> "2016", "y"=> 1378307 )
);
 
$dataPoints4 = array(
	array("label"=> "2007", "y"=> 806425 ),
	array("label"=> "2008", "y"=> 806208 ),
	array("label"=> "2009", "y"=> 798855 ),
	array("label"=> "2010", "y"=> 806968 ),
	array("label"=> "2011", "y"=> 790204 ),
	array("label"=> "2012", "y"=> 769331 ),
	array("label"=> "2013", "y"=> 789016 ),
	array("label"=> "2014", "y"=> 797166 ),
	array("label"=> "2015", "y"=> 797178 ),
	array("label"=> "2016", "y"=> 805694 )
);
 
$dataPoints5 = array(
	array("label"=> "2007", "y"=> 247510 ),
	array("label"=> "2008", "y"=> 254831 ),
	array("label"=> "2009", "y"=> 273445 ),
	array("label"=> "2010", "y"=> 260203 ),
	array("label"=> "2011", "y"=> 319355 ),
	array("label"=> "2012", "y"=> 276240 ),
	array("label"=> "2013", "y"=> 268565 ),
	array("label"=> "2014", "y"=> 259367 ),
	array("label"=> "2015", "y"=> 249080 ),
	array("label"=> "2016", "y"=> 267812 )
);
 
$dataPoints6 = array(
	array("label"=> $tm[0], "y"=>  $ideal['ipower']),
	array("label"=> $tm[1], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[2], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[3], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[4], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[5], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[6], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[7], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[8], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[9], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[10], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[11], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[12], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[13], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[14], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[15], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[16], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[17], "y"=> $ideal['ipower'] ),
        array("label"=> $tm[18], "y"=> $ideal['ipower'] ),
	array("label"=> $tm[19], "y"=> $ideal['ipower'] )
);
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
function AutoRefresh() {
               setTimeout("location.reload(true);",2000);
 }
window.onload = function () {
         AutoRefresh();
var chart = new CanvasJS.Chart("chartContainer", { 
	theme: "light2",
	title: {
		text: "Power Consumption"
	},
	subtitles: [{
		text: "In KW"
	}],
	axisY: {
		includeZero: false
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	toolTip: {
		shared: true
	},
	data: [{
		type: "line",
		name: "Coal",
		showInLegend: true,
		visible: false,
		yValueFormatString: "#,##0 GWh",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Apperent Power",
		showInLegend: true,
		yValueFormatString: "#,##0 Watt",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Natual Gas",
		showInLegend: true,
		visible: false,
		yValueFormatString: "#,##0 GWh",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Nuclear",
		showInLegend: true,
		visible: false,
		yValueFormatString: "#,##0 GWh",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Hydroelectric",
		showInLegend: true,
		visible: false,
		yValueFormatString: "#,##0 GWh",
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "Ideal",
		showInLegend: true,
		yValueFormatString: "#,##0 Watt",
		dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}


</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body background="back.jpg">
<div align="left">
<pre>                                             <img src="shield.jpg" height="150" width="150">                        <font color="white" size="10">Shield.</font>            </pre>                        
<div align="center"><font color="white">We've made this project inorder to monitor the live power consumption of different industrial machines and tried  
                                                   to suggest the inefficient consumption of machine (if any)</font>
                                                 
 </div>
</div>
<br>

 <div class="w3-bar w3-grey">
    <a href="bar.php" class="w3-bar-item w3-button w3-mobile">Home</a>
    <a href="about.html" class="w3-bar-item w3-button w3-mobile">About</a>
    
    <div class="w3-dropdown-hover w3-mobile">
      <button class="w3-button">View Ongoing Individual Machine Statistics <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-blue">
        <a href="m1.php" class="w3-bar-item w3-button w3-mobile">Machine 1</a>
        <a href="m2.php" class="w3-bar-item w3-button w3-mobile">Machine 2</a>
        <a href="m3.php" class="w3-bar-item w3-button w3-mobile">Machine 3</a>
      </div>
    </div>
    <div class="w3-dropdown-hover w3-mobile">
      <button class="w3-button">View Machine Statistics till date <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-blue">
        <a href="m1db.php" class="w3-bar-item w3-button w3-mobile">Machine 1</a>
        <a href="m2db.php" class="w3-bar-item w3-button w3-mobile">Machine 2</a>
        <a href="m3db.php" class="w3-bar-item w3-button w3-mobile">Machine 3</a>
      </div>
    </div>
    <a href="logout.php" class="w3-bar-item w3-button w3-mobile">Logout</a>
    
  </div>
  <br><br>

<center>
<div id="chartContainer" style="height: 400px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</center>
<div class="w3-container">
  <h2><font color="white">Data readings of Machine 2</font></h2>

  <table class="w3-table-all w3-hoverable" border=1>
<?php
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





$query2 = "SELECT MAX(id) AS max FROM machine2";

$r2=mysqli_query($link,$query2);
$row = mysqli_fetch_array($r2);
$MAX = $row['max'];
//echo $MAX;
$query3 ="SELECT * FROM machine2 where id<=$MAX AND id>$MAX-21";
$r3=mysqli_query($link,$query3);
$num=mysqli_num_rows($r3);

$pw=array();
$tm=array();
$pf=array();
$pw1=array();
$tm1=array();
$o=array();
for($i=0;$i<$num;$i++)
{
$row2 = mysqli_fetch_array($r3);
$pw[$i]=(float)$row2['power'];
//$pf[$i]=(float)$row2['powerfactor'];
$tm[$i]=$row2['time'];
$v[$i]=$row2['voltage'];
$c[$i]=$row2['current'];
$dt[$i]=$row2['date'];
//echo $row2['power']." watt ".$row2['time'];
//echo "<br>";
}

    echo "<tr><th>Power</th>";
    echo "<th>Voltage</th>";
    echo "<th>Current</th>";
    echo "<th>Time Stamp</th>";
    echo "<th>Date</th></tr>";
    for($j=0;$j<12;$j++){
   //$pw1=(string)$pw[$j];
    //$tm1=(string)$tm[$j];
    echo "<tr><td>".$pw[$j]."</td><td>".$v[$j]."</td><td>".$c[$j]."</td><td>".$tm[$j]."</td><td>".$dt[$j]."</td></tr>";
    }
    
?>
    
    </table>
</div>
</div>
</body>
</html>   