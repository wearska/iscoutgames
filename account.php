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
    
            
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="JS/jquery-ui.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script src="JS/main.js"></script>
</body>
</html>