<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../frontend/alumni_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
        <p>This is your dashboard.</p>
        <!-- Add more content here -->
    </div>
</body>
</html>
