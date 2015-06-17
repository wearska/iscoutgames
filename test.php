<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "games";
$Name = $_POST['name'];
$Email = $_POST['email'];
$Location = $_POST['location'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "INSERT INTO `test2`.`table` (`Name`, `Email`, `Location`) VALUES ('$Name', '$Email', '$Location');";

if ($conn->query($sql) === TRUE) {
$sql = "SELECT * FROM `table`";
    echo "$sql";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>