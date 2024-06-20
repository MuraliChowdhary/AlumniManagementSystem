<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: Check if the POST data is being received
    // var_dump($_POST); exit;

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $con->prepare("SELECT id, password FROM alumni WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Verify the password
        if ($password === $stored_password) {
            // Password is correct, so start a new session
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email; // Store data in session variables

            // Redirect user to home page
            header("location: ../index.php");
            exit;
        } else {
            // Display an error message if password is not valid
            $login_err = "Invalid password.";
        }
    } else {
        // Display an error message if email doesn't exist
        $login_err = "No account found with that email.";
    }
    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Login</title>
    <link rel="stylesheet" href="style.css">
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
            width: 300px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 1rem;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container label {
            margin-top: 0.5rem;
            margin-bottom: 0.25rem;
            text-align: left;
        }
        .container input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .container button {
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Alumni Login</h2>
        <?php if(!empty($login_err)) echo '<div class="error">' . htmlspecialchars($login_err) . '</div>'; ?>
        <form action="alumni_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
