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





$query2 = "SELECT MAX(id) AS max FROM machine3";

$r2=mysqli_query($link,$query2);
$row = mysqli_fetch_array($r2);
$MAX = $row['max'];
//echo $MAX;
$query3 ="SELECT * FROM machine3 where id<=$MAX AND id>$MAX-21";
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
$qwe1="SELECT `ipower` FROM `ideal3` WHERE 1";
$ideal1=mysqli_query($link,$qwe1);
$ideal=mysqli_fetch_array($ideal1);
echo $ideal['ipower'];
//for($i=0;$i<12;$i++)
//{
//echo $row2['power']." watt ".$tm[i];

$dataPoints1 = array(
	array("label"=>$tm[0],	"y"=> $ideal['ipower']),
	array("label"=> $tm[1],	"y"=> $ideal['ipower']),
	array("label"=> $tm[2],	"y"=> $ideal['ipower']),
	array("label"=> $tm[3],	"y"=> $ideal['ipower']),
	array("label"=> $tm[4],	"y"=> $ideal['ipower']),
	array("label"=> $tm[5],	"y"=> $ideal['ipower']),
	array("label"=> $tm[6],	"y"=> $ideal['ipower']),
	array("label"=> $tm[7],	"y"=> $ideal['ipower']),
	array("label"=> $tm[8],	"y"=> $ideal['ipower']),
	array("label"=> $tm[9],	"y"=> $ideal['ipower']),
	array("label"=> $tm[10],"y"=> $ideal['ipower']),
	array("label"=> $tm[11],"y"=> $ideal['ipower']),
	array("label"=> $tm[12],"y"=> $ideal['ipower']),
	array("label"=> $tm[13],"y"=> $ideal['ipower']),
	array("label"=> $tm[14],"y"=> $ideal['ipower']),
	array("label"=> $tm[15],"y"=> $ideal['ipower']),
	array("label"=> $tm[16],"y"=> $ideal['ipower']),
	array("label"=> $tm[17],"y"=> $ideal['ipower']),
	array("label"=> $tm[18],"y"=> $ideal['ipower']),
	array("label"=> $tm[19],"y"=> $ideal['ipower'])
);
$dataPoints2 = array(
	array("label"=> "","y"=> $pw[0] * $pf[0]),
	array("label"=> "","y"=> $pw[1] * $pf[1]),
	array("label"=> "","y"=> $pw[2] * $pf[2]),
	array("label"=> "","y"=> $pw[3] * $pf[3]),
	array("label"=> "","y"=> $pw[4] * $pf[4]),
	array("label"=> "","y"=> $pw[5] * $pf[5]),
	array("label"=> "","y"=> $pw[6] * $pf[6]),
	array("label"=> "","y"=> $pw[7] * $pf[7]),
	array("label"=> "","y"=> $pw[8] * $pf[8]),
	array("label"=> "","y"=> $pw[9] * $pf[9]),
	array("label"=> "","y"=> $pw[10] * $pf[10]),
	array("label"=> "","y"=> $pw[11] * $pf[11]),
	array("label"=> "","y"=> $pw[12] * $pf[12]),
	array("label"=> "","y"=> $pw[13] * $pf[13]),
	array("label"=> "","y"=> $pw[14] * $pf[14]),
	array("label"=> "","y"=> $pw[15] * $pf[15]),
	array("label"=> "","y"=> $pw[16] * $pf[16]),
	array("label"=> "","y"=> $pw[17] * $pf[17]),
	array("label"=> "","y"=> $pw[18] * $pf[18]),
	array("label"=> "","y"=> $pw[19] * $pf[19])
);


?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Power Consumption Monitoring"
	},
	axisX:{
		title: "Time Stamp"
	},
	axisY:{
		title: "Power (in KW)",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2:{
		title: "",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E",
		includeZero: false
	},
	legend:{
		cursor: "pointer",
		dockInsidePlotArea: true,
		itemclick: toggleDataSeries
	},
	data: [{
		type: "line",
		name: "Ideal Power Consumption  (KW)",
		markerSize: 0,
		toolTipContent: "Ideal Power Consumption: {y} KW ",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "line",
		axisYType: "secondary",
		name: "Apperent Power Consumption (KW)",
		markerSize: 0,
		toolTipContent: "Apperent Power Consumption : {y} KW",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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
  <h2><font color="white">Data readings of Machine 3</font></h2>

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





$query2 = "SELECT MAX(id) AS max FROM machine3";

$r2=mysqli_query($link,$query2);
$row = mysqli_fetch_array($r2);
$MAX = $row['max'];
//echo $MAX;
$query3 ="SELECT * FROM machine3 where id<=$MAX AND id>$MAX-21";
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
$pf[$i]=(float)$row2['powerfactor'];
$tm[$i]=$row2['time'];
$dt[$i]=$row2['date'];
//echo $row2['power']." watt ".$row2['time'];
//echo "<br>";
}

    echo "<tr><th>Apperent Power</th>";
    echo "<th>Real Power</th>";
    echo "<th>Power Factor</th>";
    echo "<th>Time Stamp</th>";
    echo "<th>Date</th></tr>";
    for($j=0;$j<12;$j++){
   //$pw1=(string)$pw[$j];
    //$tm1=(string)$tm[$j];
    echo "<tr><td>".$pw[$j]."</td><td>".$pw[$j] * $pf[$j]."</td><td>".$pf[$j]."</td><td>".$tm[$j]."</td><td>".$dt[$j]."</td></tr>";
    }
    
?>
    
    </table>
</div>
</div>
</body>
</html>   