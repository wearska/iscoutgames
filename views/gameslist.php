<?php require_once 'v_header.php' ?>

    <main class="bottom-sheet" id="view" data-nav-state-slug="gamelist">
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
            <tr id="v_header">
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
                    ."<td>"."<a href='single-game.php?ID=$row[ID]'>".$row["Name"]."</a>"."</td>"
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
</main>
    
<?php require_once 'v_footer.php' ?>