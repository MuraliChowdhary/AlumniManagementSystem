<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "alumni_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$phone = $_POST['phone'];
$graduation_year = $_POST['graduation_year'];
$degree = $_POST['degree'];
$department = $_POST['department'];
$current_position = $_POST['current_position'];
$current_company = $_POST['current_company'];

// Insert data into the alumni table
$sql = "INSERT INTO alumni (name, email, password, phone, graduation_year, degree, department, current_position, current_company)
VALUES ('$name', '$email', '$password', '$phone', '$graduation_year', '$degree', '$department', '$current_position', '$current_company')";

if ($conn->query($sql) === TRUE) {
    // Redirect to alumni login page
    header("Location: ../frontend/alumni_login.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
