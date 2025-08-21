<?php
function validateInput($name, $email, $subject, $message) {
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        return ["MISSING_FIELDS", "Name, Email, Subject, and Message are required."];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["INVALID_EMAIL", "Please provide a valid email address."];
    }

    return [null, null]; // no errors
}
?>