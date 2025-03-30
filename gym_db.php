<?php
$host = 'localhost';  // Database host
$user = 'root';       // Database username
$pass = '';           // Database password
$dbname = 'gym_db'; // Database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
