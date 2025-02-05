<?php
// /utils/loadEnv.php

// Define the path to your .env file
$envFilePath = __DIR__ . '/../../.env';

if (file_exists($envFilePath)) {
    // Read the .env file line by line
    $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignore comments
        if (strpos($line, '#') === 0) {
            continue;
        }

        // Parse the line as KEY=VALUE
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value)); // Set the environment variable
    }
} else {
    // Handle error if .env file does not exist
    die("Error: .env file not found!");
}
?>
