<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Define email variables
    $to = "info@thealphanova.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to index.html after successful email sending
        echo "<script>
        sessionStorage.setItem('toast_message', 'success');

        </script>";
        header("Location: index.html");
        exit(); // Important: terminate the script after redirection
    } else {
        // Redirect to error page or display an error message
        echo "<script>
        sessionStorage.setItem('toast_message', 'error');

        </script>";
        header("Location:");
        exit();
    }
}
?>
