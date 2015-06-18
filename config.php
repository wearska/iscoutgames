<?php
/**
 * The base configurations for the site.
 *
 * @iscoutgames.com
 */

// Global DB config
if (!defined('DB_NAME')) {
    define('DB_NAME', 'iscoutgames');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'password');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}

// Database Charset to use in creating database tables.
if (!defined('DB_CHARSET')) {
    define('DB_CHARSET', 'utf8');
}

// The Database Collate type. Don't change this if in doubt.
if (!defined('DB_COLLATE')) {
    define('DB_COLLATE', '');
}

// Absolute path to the root directory.
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

// Define common directory paths
define( 'ASSETS', 'assets/' );
define( 'FUNC', 'functions/' );
define( 'SCRIPTS', 'scripts/' );
define( 'STYLES', 'styles/' );
define( 'VIEWS', 'views/' );

// Function to get the header
function get_head() {  /*:)*/
    require ( ABSPATH . 'header.php' );
}

// Function to get the footer
function get_foot() {  /*:)*/
    require_once ( ABSPATH . 'footer.php' );
}

//function to load the styles
function get_styles() {  /*:)*/
    require_once ( ABSPATH . STYLES . 'styles.php' );
}

//function to load the styles
function get_scripts() {  /*:)*/
    require_once ( ABSPATH . SCRIPTS . 'scripts.php' );
}
 ?>
