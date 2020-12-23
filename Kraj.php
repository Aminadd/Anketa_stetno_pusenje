<!DOCTYPE>
<html>
<head>
<style> 
body {
  background-image: url('pp.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%
 }
</style>
</head>
<body>
<br>
<h1> Popunjena anketa </h1>
<button onclick="location.href='odgovori.php';" style="margin-left: 2%; background-color:pink;">Rezultati</button>
<button onclick="location.href='login1.html';" style="margin-left: 2%; background-color:pink;">Odjavi se</button>
<br>
<hr>
<form action="Kraj.php" method="POST">

<?php  
function prikazi()
{
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
$sql = "SELECT `id`, `username`,`odgovor1`, `odgovor2`, `odgovor3`, `odgovor4`, `odgovor5`, `odgovor6`, `odgovor7`, `odgovor8`, `odgovor9`, `odgovor10`, `odgovor11`, `odgovor12`, `odgovor13`, `odgovor14`, `popunio` FROM `anketa` WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>username</th><th>odgovor1</th><th>odgovor2</th><th>odgovor3</th><th>odgovor4</th><th>odgovor5</th><th>odgovor6</th><th>odgovor7</th><th>odgovor8</th><th>odgovor9</th><th>odgovor10</th><th>odgovor11</th><th>odgovor12</th><th>odgovor13</th><th>odgovor14</th><th>popunio</th><th>Brisanje</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["odgovor1"]."</td><td>".$row["odgovor2"]."</td><td>".$row["odgovor3"]."</td><td>".$row["odgovor4"]."</td><td>".$row["odgovor5"]."</td><td>".$row["odgovor6"]."</td><td>".$row["odgovor7"]."</td><td>".$row["odgovor8"]."</td><td>".$row["odgovor9"]."</td><td>".$row["odgovor10"]."</td><td>".$row["odgovor11"]."</td><td>".$row["odgovor12"]."</td><td>".$row["odgovor13"]."</td><td>".$row["odgovor14"]."</td><td>" .$row["popunio"]."</td><td><input type='submit' name=".$row["id"]." value='Obrisi'/></td></tr>";
	  // echo "Uspesno ste se prijavili";
	   // header("Location: delete.php"); /* Redirect browser */
//  exit();
    }
    echo "</table><br>";	
	//echo "<input type='submit' name='delete' value='Obrisi' />";
} else {
    echo "Prazna baza";
}
$conn->close();
}

function brisi()
{
	 if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
           $id=$key;
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

// sql to delete a record
$sql = "DELETE FROM anketa WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
        }
}
}

if (isset($_POST))
{
	brisi();
}

	prikazi();


?>
<!--
$servername = "localhost";
$username = "id14835924_root";
$password = "%c8x=x_nC{j}0G=W";
$dbname = "id14835924_anketa";-->