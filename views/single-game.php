<?php require_once 'v_header.php' ?>

    <main class="bottom-sheet" id="view" data-nav-state-slug="gamedetails">
        
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
                                echo '<form id="gameform" action="/functions/removefromlibrary.php?ID='.$game_id.'" method="post">'.'<input type="submit" value="Remove from Library">'.'</form>';
                            } else {
                                echo '<form id="gameform" action="/functions/addtolibrary.php?ID='.$game_id.'" method="post">'.'<input type="submit" value="Add to Library">'.'</form>'; }
        } else {
        echo '<form>'.'<input type="submit" class="disabledsubmit" value="Add to Library" disabled>'.'</form>'; 
        };
        ?>
    </main> <!--View-->

<?php require_once 'v_footer.php' ?>