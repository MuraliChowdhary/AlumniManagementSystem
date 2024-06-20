<?php
<?php
session_start();
include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        // Hash the password for security
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Use a prepared statement to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO admintable (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password_hashed);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the login page
            header("Location: ../Frontend/Html/Admin/admin_login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please enter some valid information.";
    }
}
?>




?>
