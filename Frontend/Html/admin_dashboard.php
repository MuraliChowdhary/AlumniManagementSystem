<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Frontend/Html/Admin/admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 1rem;
        }
        .container p {
            margin-bottom: 1rem;
        }
        .container a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
        }
        .container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h2>
        <p>This is your dashboard.</p>
        <!-- Add more content here -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
