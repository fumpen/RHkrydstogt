<?php
$servername = "localhost";
$username = "root";
$password = "ej18nul6";
$dbname = "MarBar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Streger (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
kitchen VARCHAR(30),
points INT(5) NOT NULL DEFAULT 0
)";

$state = $conn->query($sql);

if ($state === TRUE) {
    echo "Table Streger created successfully\n";
    
    $sql = "INSERT INTO Streger (kitchen) VALUES 
           ('1A'), ('2A'), ('3A'), ('4A'), ('5A'), ('6A'), ('7A'),
           ('1B'), ('2B'), ('3B'), ('4B'), ('5B'), ('6B'), ('7B'),
           ('1C'), ('2C'), ('3C'), ('4C'), ('5C'), ('6C'), ('7C'),
           ('1D'), ('2D'), ('3D'), ('4D'), ('5D'), ('6D'), ('7D'),
           ('Aspiranter'), ('Crew'), ('Marbarudvalget')";

    if ($conn->query($sql) === TRUE) {
        echo "Rows created successfully\n";
    } else {
        echo "Error creating Rows: " . $conn->error . "\n";
    }
        
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


$conn->close();
?>
