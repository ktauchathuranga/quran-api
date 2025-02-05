<?php
// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'];

// Match the version (v1, v2, etc.) from the URL
$matches = [];
if (preg_match('#^/v([0-9]+)/api#', $requestUri, $matches)) {
    $apiVersion = 'v' . $matches[1];
} else {
    // Default to version 1 if no version is specified
    $apiVersion = 'v1';
}

// Path to the routes file for the detected version
$routesFile = __DIR__ . '/src/' . $apiVersion . '/routes/api.php';

// Include the appropriate routes file or return a 404 error
if (file_exists($routesFile)) {
    require_once $routesFile;
} else {
    http_response_code(404);
    echo json_encode(['error' => 'API version not supported']);
    exit;
}
