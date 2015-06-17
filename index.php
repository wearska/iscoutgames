<?php
    require_once 'header.php'
?>
   

   <div class="header">
    <div class="logo"></div>
    <div class="navigation">
        <ul class="nav-menu">
            <li> <a href="/"> Home </a>
            </li>
            <li> <a href="gameform.php"> Submit Game </a> </li>
            <li> <a href="gamelist.php"> Game List </a> </li>
        </ul>
    </div>
    <div id="account">
        <ul>
            <?php if(!empty($_SESSION[ 'LoggedIn']) && !empty($_SESSION[ 'Username'])) { ?>
            <li><a href="account.php"> Account </a> </li>
            <li><a href="logout.php"> Log Out</a> </li>
            <?php } else { ?>
            <li><a href="login.php">Log In</a>
            </li>
            <li><a href="signup.php">Sign Up</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<hr class="separator">


<?php
    require_once 'footer.php'
?>