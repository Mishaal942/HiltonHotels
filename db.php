<?php
$host = "localhost"; // If not working change to your hosting DB host
$user = "uppbmi0whibtc";
$pass = "bjgew6ykgu1v";
$dbname = "dbitkngc7xsut6";

// Database Connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
