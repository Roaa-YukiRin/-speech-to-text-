<?php
// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "voiceText";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the text from the AJAX request
$text = $_POST['text'];

// Prepare and execute the SQL query to insert the text
$stmt = $conn->prepare("INSERT INTO Save_text (text) VALUES (?)");
$stmt->bind_param("s", $text);

if ($stmt->execute()) {
    echo "Text saved to database successfully";
} else {
    echo "Error saving text to database: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>