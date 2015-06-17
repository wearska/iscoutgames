<?php
session_start();
?>

<!doctype HTML>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="CSS/normalize.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="CSS/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="CSS/index.css" />
    <link type="text/css" rel="stylesheet" href="CSS/gamelist.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
    <div class="header">
        <div class="logo"></div>
        <div class="navigation">
            <ul class="nav-menu">
                <li> <a href="/"> Home </a></li>
                <li> <a href="gameform.php"> Submit Game </a> </li>
                <li> <a href="gamelist.php"> Game List </a> </li>            
            </ul>        
        </div>
        <div id="account">
            <ul>
                <?php
                    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
                { ?>
                    <li><a href="account.php"> Account </a> </li>
                    <li><a href="logout.php"> Log Out</a> </li>                    
                <?php } else { ?>       
                    <li><a href="login.php">Log In</a></li>       
                    <li><a href="signup.php">Sign Up</a></li> 
                <?php  } ?>
            </ul>        
        </div>  
    </div>
    <hr class="separator">
    <div style="margin-left:15px">
        <table class="gametable">
            <tr id="header">
                <td> Game Name</td>
                <td> Genre </td>
                <td> Score </td>
                <td> Website</td>
            </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "games";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Name, Genre, Link, Score FROM game WHERE approvedstate=1 ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr>"
                    ."<td>"."<a href='gamedetails.php?ID=$row[ID]'>".$row["Name"]."</a>"."</td>"
                    ."<td>" . $row["Genre"]. "</td>"
                    ."<td>" . $row["Score"]. "</td>"
                    ."<td>" . "<a href=$row[Link] target=_blank>" . $row["Link"] . "</a>" . "</td>"
             ."</tr>";           
     }
} else {
     echo "0 results";
}

$conn->close();
?>  
        
        </table>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="JS/jquery-ui.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script src="JS/main.js"></script>
</body>

</html>