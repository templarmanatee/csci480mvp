<!-- Adds the nav bar to the top of the site -->
<html>
	<head>
    	<link rel="stylesheet" href="css/basic.css">
	</head>
	<body>
		<div class="topnav">
   			<a href="index.php">Home</a>
   			<?php 
   			if (isset($_SESSION["usernumber"])) {
                echo "<a href='logout.php'>Logout</a>";
   			} else {
                echo "<a href='login.php'>Login</a>";
                echo "<a href='register.php'>Register</a>"; 
   			}
            if (isset($_SESSION["usernumber"])) {
                echo "<li><a href='button.php'>Button</a></li>"; 
            }
            ?>
		</div>
	</body>
</html>