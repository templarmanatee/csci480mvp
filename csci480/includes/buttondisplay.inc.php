<!-- This is what connects the Total Presses button to the database. -->
<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$sql = "SELECT buttonPress FROM users WHERE usersId = ?";
$statement = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($statement, $sql)) {
    exit();
}

mysqli_stmt_bind_param($statement, "i", $_SESSION["usernumber"]);
mysqli_stmt_execute($statement);

$resultData = mysqli_stmt_get_result($statement); 
$row = mysqli_fetch_assoc($resultData);
mysqli_stmt_close($statement);

echo "<p>"; 
echo $row['buttonPress']; 
echo "</p>"; 
?>