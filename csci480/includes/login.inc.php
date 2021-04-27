<!-- Connects to the helper function for the Login page -->
<?php 

if(isset($_POST["submit"])) {
    $username = $_POST["uid"]; 
    $pwd = $_POST["pwd"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php'; 
    
    if (emptyInputLogin($conn, $username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    
    login($conn, $username, $pwd); 
} else {
    header("location: ../login.php");
    exit(); 
}