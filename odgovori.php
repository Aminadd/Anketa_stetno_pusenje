<?php
	//print("Pre nego sto se sesija startuje ne sme da se nalazi HTML kod ili print naredba");
    session_start();
    

$_COOKIE["odg1"];
$_COOKIE["odg2"];
$_COOKIE["odg3"];
$_COOKIE["odg4"];
$_COOKIE["odg5"];
$_COOKIE["odg6"];
$_COOKIE["odg7"];
$_COOKIE["odg8"];
$_COOKIE["odg9"];
$_COOKIE["odg10"];
$_COOKIE["odg11"];
$_COOKIE["odg12"];
$_COOKIE["odg13"];
$_COOKIE["odg14"];
//%c8x=x_nC{j}0G=W
//id14835924_anketa	id14835924_root	localhost

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anketa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "UPDATE anketa SET odgovor1 = '".$_COOKIE["odg1"]."', odgovor2 = '".$_COOKIE["odg2"]."', odgovor3 = '".$_COOKIE["odg3"]."', odgovor4 = '".$_COOKIE["odg4"]."', odgovor5 = '".$_COOKIE["odg5"]."', odgovor6 = '".$_COOKIE["odg6"]."', odgovor7 = '".$_COOKIE["odg7"]."', odgovor8 = '".$_COOKIE["odg8"]."', odgovor9 = '".$_COOKIE["odg9"]."', odgovor10 = '".$_COOKIE["odg10"]."', odgovor11 = '".$_COOKIE["odg11"]."', odgovor12 = '".$_COOKIE["odg12"]."', odgovor13 = '".$_COOKIE["odg13"]."', odgovor14 = '".$_COOKIE["odg14"]."',popunio=1 WHERE username = '".$_SESSION["user"]."' ";

	
if ($conn->query($sql) === TRUE) {
    echo "Uspesno ste popunili anketu. Hvala vam na izdvojenom vremenu.";
	//header("Location:sledecastrana.html");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close(); 
?>
<button onclick="location.href='login1.html';" style="margin-left: 70%; background-color:pink;">Odjavi se</button>
<style> 
body {
  background-image: url('pp.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%
 }
</style>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Rezultati"		
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: 51.08, label: "odgovor8" },
			{ y: 27.34, label: "odgovor5" },
			{ y: 10.62, label: "odgovor10" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>