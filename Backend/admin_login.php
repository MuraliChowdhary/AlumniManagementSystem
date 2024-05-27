<?php
session_start();

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
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch the user from the database
$sql = "SELECT * FROM admin WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['name'];
        echo "Login successful!";
        // Redirect to a dashboard or other page
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with this email.";
}

$conn->close();
?>
