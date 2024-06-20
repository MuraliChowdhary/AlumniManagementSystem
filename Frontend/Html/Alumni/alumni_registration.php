<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grad_year = $_POST['grad_year'];
    $occupation = $_POST['occupation'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];

    // Hash the password before storing it
   // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the insert statement
    $stmt = $con->prepare("INSERT INTO alumni (name, email, grad_year, occupation, bio, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $email, $grad_year, $occupation, $bio, $password);
    if ($stmt->execute()) {
        echo "Registration successful!";
      
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registration-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        label, input, textarea, button {
            display: block;
            width: 100%;
            margin-top: 5px;
        }
        input, textarea {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            margin-top: 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #003d80;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h1>Alumni Registration</h1>
        <form action="alumni_registration.php" method="post">
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

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
