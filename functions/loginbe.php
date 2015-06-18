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

$sql = "SELECT `Username`, `Password` FROM `users` WHERE `Username` = ? AND `Password` = ?";

if($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    
    if($stmt->fetch()) {
    echo "<div>" . "merge" . "</div>";
    session_start(); 
    echo "<a href=sessiontest.php>" . "Goto" . "</a>";
} else {
    echo "<div>" . "nu merge" . "</div>";
};    
};

$conn->close();

{
// To redirect form on a particular page
//header("Location:/sessiontest.php");
}
?>