<?php

include "base.php";

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);


$sql = "INSERT INTO `games`.`users` (`Username`, `Password`) VALUES ('$username', '$password');";

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