<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "games";
$dbname2 = "users";
$game_id = $_GET['ID'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Name FROM game WHERE ID = '$game_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
    $gamenamee = $conn->real_escape_string($row['Name']);

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $conn->real_escape_string($_SESSION['Username']);

$sql = "SELECT games FROM users WHERE Username = '$username'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$usergames = $row['games'];

$gamenamee2 = ',-,'.$gamenamee;

$usergamesstring = str_replace($gamenamee2, '', $usergames);

$usergamestring2 = $conn->real_escape_string($usergamesstring);

$sql = "UPDATE users SET games = '$usergamestring2' WHERE Username = '$username';";

if ($conn->query($sql) === TRUE) {
    echo "Succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};

$conn->close();

{
// To redirect form on a particular page
header("Location:/gamedetails.php?ID=$game_id");
}

?>