<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Html/Admin/admin_login.php");
    exit();
}

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grad_year = $_POST['grad_year'];
    $occupation = $_POST['occupation'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($grad_year) && !empty($occupation) && !empty($bio) && !empty($password)) {
        // Check if the column names match the table structure
        $stmt = $con->prepare("INSERT INTO alumni (name, email, grad_year, occupation, bio,password) VALUES (?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssisss", $name, $email, $grad_year, $occupation, $bio,$password);

        if ($stmt->execute()) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please enter all the details.";
    }
}
?>
