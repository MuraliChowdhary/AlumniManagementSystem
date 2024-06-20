<?php
session_start();
include("connection.php");
include("function.php");
if ($_SERVER['REQUEST_METHOD'] ==  "POST")
{
//something was posted
$email = $_POST['email'];
$password = $_POST['password'];
if (!empty($email) && !empty($password) && !is_numeric($email))
{
//save to database
 
$query = "insert into admintable (email, password) values ('$email', '$password')";
mysqli_query($con, $query);
header("Location: admin_login.php");
die;
}else
{
echo "Please enter some valid information!";
}
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../style.css" />
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
        font-family: "Roboto", sans-serif;
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
      }
      .container button {
        margin-top: 1rem;
        padding: 0.5rem;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
      }
      .container button:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Admin Registration</h2>
      <form  method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Register</button><br /><br />
        <a href="admin_login.php">Login</a><br />
      </form>
    </div>
  </body>
</html>

