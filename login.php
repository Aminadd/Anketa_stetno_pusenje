<?php
session_start();
$_SESSION["user"]=$_POST["imeiprezime"];
if($_POST["submit"] == "prijava")
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
$pass = md5($_POST["password"]);

$sql = "SELECT email, password FROM anketa where email like '".$_POST["email"]."' and password like '".$pass."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>email</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
	   $ime=$row["email"];
	   if(strcmp($ime, "dolicaninamina1999@gmail.com") == 0)
	   {
		   echo "Uspesno ste se prijavili";
	    header("Location: Kraj.php"); /* Redirect browser */
  exit();
	   }
	   else
	   {
	   echo "Uspesno ste se prijavili";
	    header("Location: uvod.html"); /* Redirect browser */
  exit();
    }
	}
    //echo "</table>";
} else {
    echo "Pogresan email ili lozinka";
}
$conn->close();
}
else
{
	//echo $_POST["imeiprezime"]." ".$_POST["remail"]." ".$_POST["rpassword"];
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
$pass = md5($_POST["password"]);

$sql = "SELECT * FROM anketa WHERE email = '".$_POST["email"]."' ";
$result = $conn->query($sql);
if ($count = mysqli_num_rows($result) === TRUE ) 
{ if ($count == 1) 
    //echo "<table><tr><th>email</th><th>Name</th></tr>";
    // output data of each row
   // while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
	   echo "Email vec postoji u bazi. Pokusajte opet. <a href='login1.html'></a>";
	   
	//    header("Location: anketa.html"); /* Redirect browser */
//  exit();
} 
    
 else {
   
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
$pass = md5($_POST["rpassword"]);
$sql = "INSERT INTO anketa (username, password, email)
VALUES ('".$_POST["imeiprezime"]."', '".$pass."', '".$_POST["remail"]."')";

if ($conn->query($sql) === TRUE) {
    {echo "New record created successfully";
	header("Location: uvod.html"); }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
}
}
?>