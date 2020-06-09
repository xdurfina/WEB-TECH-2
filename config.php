<?php
$servername = "localhost";
$username = "xzaujecs";
$password = "slovania_ortielov";
$databaseName= "finalnezadanie";

$conn = new mysqli($servername, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$apikey="4b506c2968184be185f6282f5dcac238";
?>
