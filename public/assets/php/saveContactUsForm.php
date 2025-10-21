<?php
// Database credentials
$host = "localhost"; // 107.180.115.90
$dbname = "urbanSanctuaryDataBase";
$username = "usadmin";
$password = "Admin@2025";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']); // Phone field
$message = $conn->real_escape_string($_POST['message']);

// Insert or update data based on email or phone
$sql = "INSERT INTO contactUsForm (name, email, phone, message, created_at, updated_at)
        VALUES ('$name', '$email', '$phone', '$message', NOW(), NOW())
        ON DUPLICATE KEY UPDATE
        name = VALUES(name),
        message = VALUES(message),
        updated_at = NOW()";

if ($conn->query($sql) === TRUE) {
    echo "Record successfully saved or updated!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
