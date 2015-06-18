<?php
/**
 * The single game teplate
 *
 * Displays the main view of every game
 *
 * @iscoutgames.com
 */
 ?>

 <!DOCTYPE html>
 <html class="no-js" lang="">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title></title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
         <!--Fonts from google-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Roboto+Mono:400,100,100italic,300,300italic,400italic,500italic,500,700italic,700|Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

     <!--CSS-->
     <link rel="stylesheet" href="../styles/normalize.css">
     <link rel="stylesheet" href="../styles/main.css">

     <!--Modernizr-->
     <script src="../scripts/vendor/modernizr-2.8.3.min.js"></script>
 </head>

 <body>
     <!--[if lt IE 8]>
             <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
         <![endif]-->

     <!-- Navigation -->
     <header role="banner" class="site-header">
         <div id="app-bar-wrapper" class="coloured extended resting">
             <div id="app-bar">
                 <span class="app-title title mono">iscoutgames.com</span>
                 <div class="app-actions">
                     <div class="app-supplemental-actions">
                         <i class="material-icons">search</i>
                         <i class="material-icons">favorite</i>
                     </div>
                     <div class="app-menu">
                         <i class="material-icons">more_vert</i>
                     </div>
                 </div>
                 <div class="app-navigation app-bar-nav">
                     <div class="nav-toggle">
                         <i class="material-icons">menu</i>
                     </div>
                     <nav role="navigation">
                         <ul class="tabs-list nav-list">
                             <li class="tab" id="home" data-title="Home" data-rel="../home">Home</li>
                             <li class="tab" id="submit" data-title="Submit" data-rel="submit">Submit</li>
                             <li class="tab" id="gameslist" data-title="Games List" data-rel="gameslist">Games List</li>
                             <?php if(!empty($_SESSION[ 'LoggedIn']) && !empty($_SESSION[ 'Username'])) { ?>
                             <li class="tab" id="account" data-title="Log In" data-rel="account">Account</li>
                             <li class="tab" id="logout" data-title="Sign Up" data-rel="logout">Log out</li>
                             <?php } else { ?>
                             <li class="tab" id="login" data-title="Log In" data-rel="login">Log In</li>
                             <li class="tab" id="signup" data-title="Sign Up" data-rel="signup">Sign Up</li>
                             <?php } ?>
                             <div class="indicator"></div>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
     </header>


<main class="bottom-sheet" id="view">
    <div id="game">

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
    </div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
 window.jQuery || document.write('<script src="scripts/vendor/jquery-2.1.4.min.js"><\/script>')
</script>
<script src="../scripts/plugins/tab-lists.js"></script>
<script src="../scripts/plugins/navigation.js"></script>
<script src="../scripts/plugins.js"></script>
<script src="../scripts/main.js"></script>

</body>

</html>

