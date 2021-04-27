<?php
/*
 * Checks for empty inputs on the Register page
 * 
 */
function emptyInputRegister($username, $pwd, $pwdRep) {
    $emptyInput; 
    
    if(empty($username) || empty($pwd) || empty($pwdRep)) {
        $emptyInput = true; 
    } else {
        $emptyInput = false; 
    }
    return $emptyInput; 
}

/*
 * Checks for empty inputs on the Login page
 *
 */
function emptyInputLogin($conn, $username, $pwd) {
    $emptyInput;
    
    if(empty($username) || empty($pwd)) {
        $emptyInput = true;
    } else {
        $emptyInput = false;
    }
    return $emptyInput;
}

/*
 * Checks for valid username input from the Register form
 */
function invalidUid($username) {
    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/*
 * Verifies that the password and the repeated password match 
 */
function pwdMatch($pwd, $pwdRep) {
    $result;
    
    if($pwd !== $pwdRep) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/*
 * Checks to see if a user with that name already exists
 * Also used to extract user info from the database
 */
function userExists ($conn, $username) {
    $sql = "SELECT * FROM users WHERE usersName = ?";
    $statement = mysqli_stmt_init($conn); 
    
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../register.php?error=statementfail");
        exit();
    }
    
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement); 
    
    $resultData = mysqli_stmt_get_result($statement); 
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false; 
    }
    
    mysqli_stmt_close($statement); 
}

/*
 * Creates a new user account on the Register page
 */
function createUser ($conn, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersPass) VALUES (?, ?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../register.php?error=statementfail");
        exit();
    }
    
    $passHash = password_hash($pwd, PASSWORD_DEFAULT); 
    
    mysqli_stmt_bind_param($statement, "ss", $username, $passHash);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../register.php?error=none");
}

/*
 * Allows the user to login via the Login page
 */
function login ($conn, $username, $pwd) {
    $validUser = userExists($conn, $username); 
    
    if ($validUser === False) {
        header("location: ../login.php?error=userNotFound");
        exit();
    }
    
    $passHash = password_hash($pwd, PASSWORD_DEFAULT);
    $passCheck = password_verify($pwd, $passHash);
    
    if ($passCheck === false) {
        header("location: ../login.php?error=invalidlogin"); 
        exit(); 
    } else {
        session_start();
        $_SESSION["usernumber"] = $validUser["usersId"];
        $_SESSION["username"] = $validUser["usersName"];
        $_SESSION["buttonPresses"] = $validUser["buttonPress"]; 
        header("location: ../index.php");
        exit();
    }
    
}

/*
 * Increments the buttonPress column in the database when the user pushes the button
 */
function buttonPress ($conn, $username) {
    $validUser = userExists($conn, $username); 
    $presses = ++$validUser['buttonPress'];
    
    $sql = "UPDATE users SET buttonPress = ? WHERE usersId = ?";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../button.php?error=statementfail");
        exit();
    }
    
    mysqli_stmt_bind_param($statement, "ii", $presses, $_SESSION["usernumber"]);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../button.php");
}
?>