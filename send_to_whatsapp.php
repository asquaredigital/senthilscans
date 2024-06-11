<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = htmlspecialchars($_POST['first-name']);
    $lastName = htmlspecialchars($_POST['last-name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // WhatsApp API endpoint
    $whatsappNumber = '919786360344'; // Include country code without '+' e.g., 1234567890
    $apiURL = "https://api.whatsapp.com/send?phone=$whatsappNumber&text=";
    
    // Prepare the message
    $whatsappMessage = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nPhone: $phone\nMessage: $message";
    
    // Encode the message
    $encodedMessage = urlencode($whatsappMessage);
    
    // Debugging information
    error_log("WhatsApp URL: $apiURL$encodedMessage");

    // Redirect to WhatsApp with the message
    $finalURL = $apiURL . $encodedMessage;
    header("Location: $finalURL");
    exit();
} else {
    echo "Invalid request method.";
}
?>
