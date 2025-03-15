<?php
require_once 'src/utils.php';

function validateFileExtension(string $extension, array $allowedExtensions): void
{
    if (!in_array(strtolower($extension), $allowedExtensions)) {
        throw new Exception('Invalid file extension. Allowed types are: ' . implode(', ', $allowedExtensions));
    }
}

function generateFileName(string $userId, string $fileExtension, $uploadFolder): string
{
    $uniqueTimeStamp = uniqid('', true);
    return "{$uploadFolder}user_{$userId}_{$uniqueTimeStamp}.{$fileExtension}";
}

function uploadPhoto(): string
{
    // Ensure the upload directory exists, create it if not
    $uploadedPath = 'uploaded/';
    createDirectoryIfNeeded($uploadedPath);

    // Get file information
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileName = $_FILES['photo']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validate file extension
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];  // List allowed extensions
    validateFileExtension($fileExtension, $allowedExtensions);

    // Generate the unique file path
    $userId = $_SESSION['user']['id'];
    $imgUrl = generateFileName($userId, $fileExtension, $uploadedPath);

    // Move the uploaded file to the desired location
    $result = move_uploaded_file($fileTmpName, $imgUrl);
    if (!$result) {
        throw new Exception('Failed to upload the file.');
    }

    return $imgUrl;
}