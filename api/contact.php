<?php
// --- CORS: allow all ---
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *"); 
header("Content-Type: application/json");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Require your modules
require __DIR__ . '/config.php';
require __DIR__ . '/response.php';
require __DIR__ . '/validator.php';
require __DIR__ . '/mailer.php';

$config = require __DIR__ . '/config.php';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(405, false, "METHOD_NOT_ALLOWED", "Only POST requests are allowed.");
}

// Decode JSON body
$input = json_decode(file_get_contents("php://input"), true);

// Collect inputs safely
$name    = trim($input['name'] ?? '');
$email   = trim($input['email'] ?? '');
$subject = trim($input['subject'] ?? '');
$message = trim($input['message'] ?? '');

// Validate
list($errorCode, $errorMsg) = validateInput($name, $email, $subject, $message);
if ($errorCode) {
    jsonResponse(400, false, $errorCode, $errorMsg);
}

// Try sending email
try {
    sendMail($config, $name, $email, $subject, $message);
    jsonResponse(200, true, null, "Your message has been sent successfully!");
} catch (Exception $e) {
    jsonResponse(500, false, "MAIL_ERROR", "Failed to send message. Please try again later.");
}
