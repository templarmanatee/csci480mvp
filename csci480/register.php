<!-- A PHP script for handling errors -->
<?php 
include "header.php";

if(isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "Missing input field"; 
    } else if ($_GET["error"] == "emptyinput") {
            echo "Missing input field"; 
    } else if ($_GET["error"] == "invaliduid") {
        echo "Invalid username. Please use only alphanumeric characters.";
    } else if ($_GET["error"] == "pwdmismatch") {
        echo "Passwords entered do not match.";
    } else if ($_GET["error"] == "usernametaken") {
        echo "That unsername is already taken. Try another.";
    } else if ($_GET["error"] == "none") {
        echo "You are registered!";
    }
}
?>
<!-- The Register page allows users to create new accounts with a username and password. It encrypts the password before sending these to the database. -->
<html>
    <head>
        <title>CSCI 480 MVP - Dylan Freeman</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/newcss.css">
    </head>
    <body>
        <h3>CSCI 480 Digital Bullet Journal MVP v1.0</h3>
        <section class="register">
			<h2>Register</h2>
				<form action="includes/register.inc.php" method="post">
        			<input type="text" name="uid" placeholder="Enter username here.">
        			<input type="password" name="pwd" placeholder="Enter password here.">
        			<input type="password" name="pwdRep" placeholder="Repeat password.">
        			<button type="submit" name="submit">Register</button>
				</form>
		</section>
	</body>
</html>

