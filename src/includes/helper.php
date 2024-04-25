<?php

// Function to hash passwords
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify passwords
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Function to redirect to a different page
function redirectTo($page) {
    header("Location: $page");
    exit();
}

// Function to display success message
function displaySuccessMessage($message) {
    echo "<div class='success'>$message</div>";
}

// Function to display error message
function displayErrorMessage($message) {
    echo "<div class='error'>$message</div>";
}

// Function to upload files
function uploadFile($file, $targetDirectory) {
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($targetFilePath)) {
        return $targetFilePath;
    }

    // Check file size
    if ($file["size"] > 5000000) {
        return "File is too large.";
    }

    // Allow certain file formats
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($fileType, $allowedTypes)) {
        return "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    // Upload file
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $targetFilePath;
    } else {
        return "Error uploading file.";
    }
}

// Function to log errors
function logError($errorMessage) {
    $logDirectory = 'logs';
    $logFilePath = $logDirectory . '/error.log';
    $logMessage = "[" . date("Y-m-d H:i:s") . "] ERROR: " . $errorMessage . "\n";

    // Create directory if it doesn't exist
    if (!is_dir($logDirectory)) {
        mkdir($logDirectory, 777, true);
    }

    // Write to log file
    file_put_contents($logFilePath, $logMessage, FILE_APPEND);
}

// helper.php

// Function to sanitize input
function sanitizeInput($input) {
    // Remove whitespace from the beginning and end of the input
    $input = trim($input);
    // Remove backslashes
    $input = stripslashes($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}

?>
