<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Html/Admin/admin_login.php");
    exit();
}

include("connection.php");
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
            flex-direction: column;
            height: 200vh;
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin-bottom: 20px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 1rem;
        }
        .container form {
            margin-bottom: 1rem;
        }
        .container label {
            display: block;
            text-align: left;
            margin: 0.5rem 0 0.25rem;
        }
        .container input, .container textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
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
        .dashboard-section {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container dashboard-section">
        <h2>Add Event</h2>
        <form action="add_event.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <button type="submit">Add Event</button>
        </form>
    </div>
    <div class="container dashboard-section">
        <h2>Add Alumni Profile</h2>
        <form action="add_alumni.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="grad_year">Graduation Year:</label>
            <input type="number" id="grad_year" name="grad_year" required>
            
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required>
            
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="4" required></textarea>
            <label for="password">password:</label>
            <textarea id="password" type="password" name="password"  required></textarea>
            
            <button type="submit">Add Alumni</button>
        </form>
    </div>
    <div class="container dashboard-section">
        <h2><a href="../index.php">View Website</a></h2>
    </div>
</body>
</html>
