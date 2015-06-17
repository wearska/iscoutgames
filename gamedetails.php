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
    <link type="text/css" rel="stylesheet" href="CSS/gamedetails.css" />

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
                    <li><a href="account.php"> Account</a> </li>
                    <li><a href="logout.php"> Log Out</a> </li>                    
                <?php } else { ?>       
                    <li><a href="login.php">Log In</a></li>       
                    <li><a href="signup.php">Sign Up</a></li> 
                <?php  } ?>
            </ul>        
        </div>  
    </div>
    <hr class="separator">
    <div class="content">        

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "games";
$game_id = $_GET['ID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `game` WHERE `ID`= '$game_id'";
    $result = $conn->query($sql);

    // output data of each row
$row = $result->fetch_assoc();
    $gamenameo = $conn->real_escape_string($row["Name"]);
    echo "<div class='gamename'>" . $row["Name"] . "</div>";
    echo "<div id='info'>".$row["Genre"]."</div>";
$tags = array();
    if ($row["spacetag"] == 1) {
        array_push($tags, "<p class='tag'> Space </p>");
    };

    if ($row["futuristictag"] == 1) {
        array_push($tags, "<p class='tag'> Futuristic </p>");
    };

    if ($row["medivaltag"] == 1) {
        array_push($tags, "<p class='tag'> Medival </p>");
    };

    if ($row["fantasytag"] == 1) {
        array_push($tags, "<p class='tag'> Fantasy </p>");
    };

    if ($row["scifitag"] == 1) {
        array_push($tags, "<p class='tag'> Sci-Fi </p>");
    };

    if ($row["horrortag"] == 1) {
        array_push($tags, "<p class='tag'> Horror </p>");
    };

    if ($row["historicaltag"] == 1) {
        array_push($tags, "<p class='tag'> Historical </p>");
    };

    if ($row["moderndaystag"] == 1) {
        array_push($tags, "<p class='tag'> Modern Days </p>");
    };

    if ($row["realistictag"] == 1) {
        array_push($tags, "<p class='tag'> Realistic </p>");
    };

    if ($row["cartoontag"] == 1) {
        array_push($tags, "<p class='tag'> Cartoon </p>");
    };

    if ($row["artistictag"] == 1) {
        array_push($tags, "<p class='tag'> Artistic </p>");
    };

    if ($row["animetag"] == 1) {
        array_push($tags, "<p class='tag'> Anime </p>");
    };

    if ($row["steampunktag"] == 1) {
        array_push($tags, "<p class='tag'> Steampunk </p>");
    };

    if ($row["8bit"] == 1) {
        array_push($tags, "<p class='tag'> 8 Bit </p>");
    };

    if ($row["openworldtag"] == 1) {
        array_push($tags, "<p class='tag'> Open World </p>");
    };

    if ($row["linearleveltag"] == 1) {
        array_push($tags, "<p class='tag'> Linear Level </p>");
    };

    if ($row["sponlytag"] == 1) {
        array_push($tags, "<p class='tag'> Single Player Only </p>");
    };

    if ($row["mptag"] == 1) {
        array_push($tags, "<p class='tag'> Multiplayer Content </p>");
    };

    if ($row["localmptag"] == 1) {
        array_push($tags, "<p class='tag'> Local/Network Multiplayer </p>");
    };

    if ($row["coopcamptag"] == 1) {
        array_push($tags, "<p class='tag'> Co-Op Campaign </p>");
    };

    if ($row["coopconttag"] == 1) {
        array_push($tags, "<p class='tag'> Co-Op Extra Content </p>");
    };

    if ($row["couchcooptag"] == 1) {
        array_push($tags, "<p class='tag'> Couch Co-Op </p>");
    };

    if ($row["splitscreentag"] == 1) {
        array_push($tags, "<p class='tag'> Splitscreen </p>");
    };

    if ($row["tvttag"] == 1) {
        array_push($tags, "<p class='tag'> TeamVsTeam Mode </p>");
    };

    if ($row["pvptag"] == 1) {
        array_push($tags, "<p class='tag'> PlayerVsPlayer Mode </p>");
    };

$tags2 = implode(" ",$tags);

echo "<div id='tags'>". $tags2 . "</div>";

$conn->close();
?>  

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
    $conn = new mysqli($servername, $username, $password, 'users');
// Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$username = $conn->real_escape_string($_SESSION['Username']);
$sql = "SELECT games FROM users WHERE Username = '$username'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$usergames[] = $row['games'];
};
$usergamesstring = implode (" ", $usergames);
                        if (strpos($usergamesstring, $gamenameo) !== false) {
                            echo '<form id="gameform" action="/backend/removefromlibrary.php?ID='.$game_id.'" method="post">'.'<input type="submit" value="Remove from Library">'.'</form>';
                        } else {
                            echo '<form id="gameform" action="/backend/addtolibrary.php?ID='.$game_id.'" method="post">'.'<input type="submit" value="Add to Library">'.'</form>'; }
} else {
    echo '<form>'.'<input type="submit" class="disabledsubmit" value="Add to Library" disabled>'.'</form>'; 
};
?>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="JS/jquery-ui.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script src="JS/main.js"></script>
</body>

</html>