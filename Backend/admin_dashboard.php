<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../frontend/admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['admin_name']; ?></h2>
        <p>This is your dashboard.</p>
        <!-- Add more content here -->
    </div>
</body>
</html>
