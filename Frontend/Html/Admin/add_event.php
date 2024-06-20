<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Html/Admin/admin_login.php");
    exit();
}

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if (!empty($title) && !empty($description) && !empty($date)) {
        $stmt = $con->prepare("INSERT INTO events (title, description, date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $date);
        
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
