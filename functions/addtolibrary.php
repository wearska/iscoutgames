<?php

session_start();
include "base.php";
$game_id = $_GET['ID'];


$sql = "SELECT Name FROM game WHERE ID = '$game_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
    $gamenamee = $conn->real_escape_string($row['Name']);

$username = $conn->real_escape_string($_SESSION['Username']);

$sql = "SELECT games FROM users WHERE Username = '$username'";

$usergames = array();

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $usergames[] = $row['games'];
};

$usergames[] = $gamenamee;

$usergamesstring = implode(",-,",$usergames);

echo $usergamesstring;

$usergamestring2 = $conn->real_escape_string($usergamesstring);
    
$sql = "UPDATE users SET games = '$usergamestring2' WHERE Username = '$username';";

if ($conn->query($sql) === TRUE) {
    echo "Succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};

include '../config.php';
// To redirect form on a particular page
echo "<meta http-equiv='refresh' content='1;home'>";
