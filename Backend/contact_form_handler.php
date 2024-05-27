<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Send email (use your own email address)
    $to = "muralisudireddy@gmail.com";
    $subject = "Received ";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);

    // Redirect to a thank you page (optional)
    header("Location: thank_you.html");
    exit();
} else {
    echo "There was an error submitting the form.";
}
?>
