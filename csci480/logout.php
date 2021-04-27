<!-- A small PHP script to log the user out. -->
<?php
session_start();
session_destroy();
header('location: login.php');
exit;
?>