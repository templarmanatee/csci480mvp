<!-- This page is included in anything that needs a connection to the database. -->
<?php 

$serverName = "localhost"; 
$dbUsername = "root";
$dbPassword = "";
$dbName = "csci_mvp";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}