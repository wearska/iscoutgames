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

//$name = $_POST['gamename'];
$name = $conn->real_escape_string($_POST['gamename']);
$genre = $_POST['genre'];
$subgenre = $_POST['subgenre'];
$description = $conn->real_escape_string($_POST['description']);
$link = $conn->real_escape_string($_POST['link']);

if(isset($_POST['space'])){
    $space = $_POST['space'];
}
else{
    $space= 0;
};

if(isset($_POST['futuristic'])){
    $futuristic = $_POST['futuristic'];
}
else{
    $futuristic= 0;
};

if(isset($_POST['medival'])){
    $medival = $_POST['medival'];
}
else{
    $medival= 0;
};

if(isset($_POST['fantasy'])){
    $fantasy = $_POST['fantasy'];
}
else{
    $fantasy= 0;
};

if(isset($_POST['sci-fi'])){
    $scifi = $_POST['sci-fi'];
}
else{
    $scifi= 0;
};

if(isset($_POST['horror'])){
    $horror = $_POST['horror'];
}
else{
    $horror= 0;
};

if(isset($_POST['historical'])){
    $historical = $_POST['historical'];
}
else{
    $historical= 0;
};

if(isset($_POST['moderndays'])){
    $moderndays = $_POST['moderndays'];
}
else{
    $moderndays= 0;
};

if(isset($_POST['realistic'])){
    $realistic = $_POST['realistic'];
}
else{
    $realistic= 0;
};

if(isset($_POST['cartoon'])){
    $cartoon = $_POST['cartoon'];
}
else{
    $cartoon= 0;
};

if(isset($_POST['artistic'])){
    $artistic = $_POST['artistic'];
}
else{
    $artistic= 0;
};

if(isset($_POST['anime'])){
    $anime = $_POST['anime'];
}
else{
    $anime= 0;
};

if(isset($_POST['steampunk'])){
    $steampunk = $_POST['steampunk'];
}
else{
    $steampunk= 0;
};

if(isset($_POST['8bit'])){
    $eightbit = $_POST['8bit'];
}
else{
    $eightbit= 0;
};

if(isset($_POST['openworld'])){
    $openworld = $_POST['openworld'];
}
else{
    $openworld= 0;
};

if(isset($_POST['linearlevel'])){
    $sandbox = $_POST['linearlevel'];
}
else{
    $sandbox= 0;
};

if(isset($_POST['SP'])){
    $sp = $_POST['SP'];
}
else{
    $sp= 0;
};

if(isset($_POST['MP'])){
    $mp = $_POST['MP'];
}
else{
    $mp= 0;
};

if(isset($_POST['localmp'])){
    $localmp = $_POST['localmp'];
}
else{
    $localmp= 0;
};

if(isset($_POST['coopcamp'])){
    $coopcamp = $_POST['coopcamp'];
}
else{
    $coopcamp= 0;
};

if(isset($_POST['coopcont'])){
    $coopcont = $_POST['coopcont'];
}
else{
    $coopcont= 0;
};

if(isset($_POST['couchcoop'])){
    $couchcoop = $_POST['couchcoop'];
}
else{
    $couchcoop= 0;
};

if(isset($_POST['splitscreen'])){
    $splitscreen = $_POST['splitscreen'];
}
else{
    $splitscreen= 0;
};

if(isset($_POST['tvt'])){
    $tvt = $_POST['tvt'];
}
else{
    $tvt= 0;
};

if(isset($_POST['pvp'])){
    $pvp = $_POST['pvp'];
}
else{
    $pvp= 0;
};



$sql = "INSERT INTO `games`.`game` (`ID`, `Name`, `Genre`, `Subgenre`, `Score`, `spacetag`, `futuristictag`, `medivaltag`, `fantasytag`, `scifitag`, `horrortag`, `historicaltag`, `moderndaystag`, `realistictag`, `cartoontag`, `artistictag`, `animetag`, `steampunktag`, `8bit`, `openworldtag`, `linearleveltag`, `sponlytag`, `mptag`, `localmptag`, `coopcamptag`, `coopconttag`, `couchcooptag`, `splitscreentag`, `tvttag`, `pvptag`, `Description`, `link`) VALUES (NULL, '$name', '$genre', '$subgenre', '', '$space', '$futuristic', '$medival', '$fantasy', '$scifi', '$horror', '$historical', '$moderndays', '$realistic', '$cartoon', '$artistic', '$anime', '$steampunk', '$eightbit', '$openworld', '$linearlevel', '$sp', '$mp', '$localmp', '$coopcamp', '$coopcont', '$couchcoop', '$splitscreen', '$tvt', '$pvp', '$description', '$link');";

if ($conn->query($sql) === TRUE) {
    echo "Succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};

$conn->close();

{
// To redirect form on a particular page
header("account");
}
?>