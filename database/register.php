<?php
// Get form data
$title = $_POST['title'];
$surname = $_POST['surname'];
$first_name = $_POST['first_name'];
$cell = $_POST['cell'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$confirm = isset($_POST['confirm']) ? 1 : 0;

// Database connection
$conn = new mysqli('localhost', 'prince', 'sUQ(pq/GK1xJvc7_', 'tutorial_db');

// Check connection
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users (title, surname, first_name, cell, email, dob, confirm) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $title, $surname, $first_name, $cell, $email, $dob, $confirm);

    if ($stmt->execute()) {
        echo "Registration successfully...";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
