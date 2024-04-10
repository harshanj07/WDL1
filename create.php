<?php
$servername = "localhost";
$username = "root";
$password = ""; // By default, XAMPP has no password
$dbname = "test"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE Personal(
namee VARCHAR(15) NOT NULL,
email VARCHAR(30) NOT NULL,
phoneno VARCHAR(10) NOT NULL,
addresss VARCHAR(255) NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>