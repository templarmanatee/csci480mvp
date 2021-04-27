<!-- A PHP script for error handling. -->
<?php
include "header.php";

if(isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "Missing input field";
    } else if ($_GET["error"] == "invalidlogin") {
        echo "Invalid username or password. Please try again.";
    }
}
?>

<!-- The Login page for once a user has an account. -->
<html>
    <head>
        <title>MVP - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>CSCI 480 Digital Bullet Journal MVP v1.0</h3>
        <section class="login">
			<h2>Login here</h2>
				<form action="includes/login.inc.php" method="post">
        			<input type="text" name="uid" placeholder="Enter username here.">
        			<input type="password" name="pwd" placeholder="Enter password here.">
        			<button type="submit" name="submit">Login</button>
				</form>
		</section>
	</body>
</html>