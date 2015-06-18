<?php
/**
 * The header
 *
 * Displays all of the <head> section and everything up till <main id="main-view">
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
     <link rel="stylesheet" href="styles/normalize.css">
     <link rel="stylesheet" href="styles/main.css">

     <!--Modernizr-->
     <script src="scripts/vendor/modernizr-2.8.3.min.js"></script>
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
                             <li class="tab" id="home" data-title="Home" data-rel="home">Home</li>
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

