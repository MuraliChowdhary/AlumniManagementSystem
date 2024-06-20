<?php
function check_login($con)
{
    if (isset($_SESSION['email'])) {
        $id = $_SESSION['email'];
        // Correcting the missing assignment operator in the query
        $query = "SELECT * FROM admintable WHERE email = '$id' LIMIT 1"; 
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // Redirecting to the login page if the user is not logged in
    header("Location: ../frontend/html/admin/admin_login.html");
    exit(); // Make sure to exit after redirection
}
?>
