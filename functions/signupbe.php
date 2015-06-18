<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "users";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);


$sql = "INSERT INTO `users`.`users` (`Username`, `Password`) VALUES ('$username', '$password');";

if ($conn->query($sql) === TRUE) {
    echo "Succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};

$conn->close();

{
// To redirect form on a particular page
header("Location:/");
}
?>