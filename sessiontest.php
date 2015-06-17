<?php

session_start();

if (isset($_SESSION)) {
    echo "is this working?";
    echo "<br>";
    echo "<a href=/logout.php>" . "Log Out" . "</a>";
    
} else {
    echo "not working";
};

?>