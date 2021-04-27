<!-- A PHP script for handling errors. -->
<?php
include "header.php";

if(isset($_GET["error"])) {
    if ($_GET["error"] == "statementfail") {
        echo "Server error, please try again.";
    }
}
?>
<!--This is the main page for the button. It is only accessible after the user has logged in.
    It contains a button that increments the counter beneath it. The Total Presses button displays the number of times the user has pushed it.-->
<html>
    <head>
        <title>MVP - Button</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- The buttonCounter() script creates the counter for the "Total Presses" button. -->
        <script>
            function buttonCounter() {
              	var xhttp;
              	
              	xhttp = new XMLHttpRequest();
              	xhttp.onreadystatechange = function() {
                	if (this.readyState == 4 && this.status == 200) {
                  		document.getElementById("display").innerHTML = this.responseText;
                	}
              	};
              	xhttp.open("GET", "includes/buttondisplay.inc.php", true);
              	xhttp.send();
            }
		</script>
    </head>
    <body>
        <section class="button">
			<h2>Press the Button</h2>
				<form action="includes/button.inc.php" method="post">
        			<button type="submit" name="increment">Increment</button>
				</form>
		</section>
		<form>
        		<button type="button" name="increment" onclick="buttonCounter()">Total Pushes</button>
		</form>
		<div>Button Counter:</div>
		<!-- Where the total appears -->
		<div id="display"></div>
	</body>
</html>