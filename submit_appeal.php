<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $reason = $_POST['reason'];

    // Email configuration
    $to = "spartancoding02@gmail.com";
    $subject = "Ban Appeal from $username";
    $message = "Username: $username\n";
    $message .= "Email: $email\n";
    $message .= "Reason for Ban:\n$reason";

    // Send email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "<script>alert('Your appeal has been submitted successfully. We will review it shortly.');</script>";
        echo "<script>window.location.href = 'ban_appeal_form.html';</script>"; // Redirect back to the form
        exit;
    } else {
        // Failed to send email
        echo "<script>alert('Failed to submit your appeal. Please try again later.');</script>";
        echo "<script>window.location.href = 'ban_appeal_form.html';</script>"; // Redirect back to the form
        exit;
    }
} else {
    // Invalid request method
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'ban_appeal_form.html';</script>"; // Redirect back to the form
    exit;
}
?>
