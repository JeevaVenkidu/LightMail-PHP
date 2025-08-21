<?php
function jsonResponse($statusCode, $success, $error = null, $message = null) {
    http_response_code($statusCode);
    echo json_encode([
        "success" => $success,
        "error"   => $error,
        "message" => $message
    ]);
    exit;
}
