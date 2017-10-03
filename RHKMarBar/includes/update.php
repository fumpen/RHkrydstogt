<?php
$servername = "localhost";
$username = "root";
$password = "ej18nul6";
$dbname = "MarBar";

$kitchen = $_POST['kitchen'];
$streger = $_POST['streger'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT points from Streger WHERE kitchen='".$kitchen."'";
$result = $conn->query($sql);


$row = $result->fetch_assoc();
$newval = $row["points"] + $streger;

$sql = "UPDATE Streger SET points = ". $newval ." WHERE kitchen='".$kitchen."'";
$conn->query($sql);


$conn->close();

?>
