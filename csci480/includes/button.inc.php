<!-- Connects the Button page to its helper function. -->
<?php

if(isset($_POST["increment"])) {
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    buttonPress($conn, $_SESSION["username"]); 
} else {
    header("location: ../button.php");
    exit();
}