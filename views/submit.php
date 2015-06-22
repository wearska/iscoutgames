<?php get_head();
include (ABSPATH . FUNC . 'base.php');
?>

<main class="bottom-sheet" id="view">

    <div>
        <h3> Submit a New Game </h3>
    </div>

    <form id="gameform" action="<?php echo get_base_uri() . 'functions/submitbe.php' ?>" method="post">
        <div id="gamedef">
            <div class="row">
                <div class="input-field floating-label col s6">
                    <input type="text"  name="gamename" placeholder="" id="gamename">
                    <label for="gamename">Name of the game</label>
                </div>                
                <div class="input-field floating-label col s6">
                    <input type="text" name="link" id="link">
                    <label for="second">Link to game page</label>
                </div>                
            </div>
            <br>
            <br> Genre
            <select name="genre">
                <option value="" disabled selected>Select the genre</option>
                <option value="Action-Adventure">Action-Adventure</option>
                <option value="First-Person Shooter">First-Person Shooter</option>
                <option value="Role-Playing">Role-Playing</option>
                <option value="Real-Time Strategy">Real-Time Strategy</option>
                <option value="Racing">Racing</option>
                <option value="Massively Multiplayer Online">Massively Multiplayer Online</option>
                <option value="Multiplayer Online Battle Arena">Multiplayer Online Battle Arena</option>
                <option value="Sports">Sports</option>
                <option value="Indie">Indie</option>
                <option value="Casual">Casual</option>
                <option value="Simulation">Simulation</option>
                <option value="Fighting">Fighting</option>
                <option value="TBS">Turn-Based Strategy</option>
                <option value="Hacknslash">Hack'n'Slash</option>
                <option value="Adventure">Adventure</option>
            </select>
            <br>
            <br> Sub Genre
            <select name="subgenre">
                <option value="" disabled selected>Select the sub-genre</option>
                <option value="NA">Not Applicable</option>
                <option value="Platformer">Platformer</option>
                <option value="Stealth">Stealth</option>
                <option value="Survival">Survival</option>
                <option value="Crafting">Crafting </option>
                <option value="Tower Defence">Tower Defense</option>
                <option value="Hidden Ojects">Hidden Objects</option>
                <option value="Side-Scoller">Side-Scoller</option>
                <option value="Card-Game">Card-Game</option>
                <option value="Board-Game">Board-Game</option>
                <option value="Pointandclick">Point and Click</option>
            </select>
            <br>

        </div>
        Please be as accurate as possible. Use the official name of the game and double-check the genre and sub-genre with/on a trustworthy source. Thank you!

        <br>
        <br>
        <div class="tags">
            <h4>Tags</h4>
            <div class="tagclass">
                <h5> Settings </h5>
                <input type="checkbox" name="space" value="1"> Space
                <br>
                <input type="checkbox" name="futuristic" value="1"> Futuristic
                <br>
                <input type="checkbox" name="medival" value="1"> Historical-Fiction
                <br>
                <input type="checkbox" name="fantasy" value="1"> Fantasy
                <br>
                <input type="checkbox" name="sci-fi" value="1"> Sci-Fi
                <br>
                <input type="checkbox" name="horror" value="1"> Horror
                <br>
                <input type="checkbox" name="historical" value="1"> Historical
                <br>
                <input type="checkbox" name="moderndays" value="1"> Modern Days
                <br>
            </div>
            <br>
            <div class="tagclass">
                <h5> Art Style </h5>
                <input type="checkbox" name="realistic" value="1"> Realistic
                <br>
                <input type="checkbox" name="cartoon" value="1"> Cartoon
                <br>
                <input type="checkbox" name="artistic" value="1"> Artistic
                <br>
                <input type="checkbox" name="anime" value="1"> Anime
                <br>
                <input type="checkbox" name="steampunk" value="1"> Steampunk
                <br>
                <input type="checkbox" name="8bit" value="1"> 8Bit
                <br>
            </div>
            <div class="tagclass">
                <h5>World Design</h5>
                <input type="checkbox" name="openworld" value="1"> Open World
                <br>
                <input type="checkbox" name="linearlevel" value="1"> Linear Level
                <br>
            </div>
                <br>
            <div id="" class="tagclass">
                <h5> Multiplayer Component </h5>
                <input type="checkbox" name="SP" value="1"> Single Player Only</li>
                <br>
                <input id="mpcheck" type="checkbox" name="MP" value="1"> Multiplayer Content
                <br>
                <br>
            </div>
            <div id="mpoptions" class="tagclass">
                <h5> Game Modes </h5>
                <input type="checkbox" name="localmp" value="1"> Local/Network Multiplayer
                <br>
                <input type="checkbox" name="coopcamp" value="1"> Co-Op Campaign
                <br>
                <input type="checkbox" name="coopcont" value="1"> Co-Op Content
                <br>
                <input type="checkbox" name="couchcoop" value="1"> Couch Co-Op
                <br>
                <input type="checkbox" name="splitscreen" value="1"> Splitscreen
                <br>
                <input type="checkbox" name="tvt" value="1"> TeamVsTeam
                <br>
                <input type="checkbox" name="pvp" value="1"> PlayerVsPlayer
                <br>
                <br>
            </div>
        </div>
        <br>

        <textarea id="description" name="description" rows="10" placeholder="Remember, be nice!"></textarea>

        <br>
        <input type="submit" value="Submit" id="testbutton"> </form>
    <hr>
    </form>
</main> <!--End View-->

<?php get_foot(); ?>
