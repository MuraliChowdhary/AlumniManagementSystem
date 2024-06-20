<?php
// connection.php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'alumnisystem';

$con = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
