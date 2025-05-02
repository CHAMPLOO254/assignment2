<?php
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $formData = json_encode([
        'fullname' => sanitizeInput($_POST['fullname']),
        'student_id' => sanitizeInput($_POST['student_id']),
        'course' => sanitizeInput($_POST['course']),
        'message' => sanitizeInput($_POST['message'])
    ]);

    // Insert submission using prepared statement
    $stmt = $pdo->prepare("INSERT INTO submissions (user_id, form_data) VALUES (?, ?)");
    if ($stmt->execute([$userId, $formData])) {
        header("Location: ../dashboard.html?submission=success");
        exit();
    } else {
        die("Form submission failed");
    }
}
?>