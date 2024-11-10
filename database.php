<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "fit_track";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>