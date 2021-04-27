<!-- This connects the Register page to its helper function as well as checks user input. -->
<?php 

if(isset($_POST["submit"])) {
    
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRep = $_POST["pwdRep"];
    
    require_once 'dbh.inc.php'; 
    require_once 'functions.inc.php'; 
    
    if (emptyInputRegister($username, $pwd, $pwdRep) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit(); 
    }
    
    if (invalidUid($username) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }
    
    if (pwdMatch($pwd, $pwdRep) !== false) {
        header("location: ../register.php?error=pwdmismatch");
        exit();
    }
    
    if (userExists($conn, $username) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $username, $pwd); 
    
} else {
    header("location: ../register.php"); 
}