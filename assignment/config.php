<?php
$host = '127.0.0.1';
$dbname = 'student_portal';
$username = 'root';
$password = 'Jimmy@2005L_';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session
session_start();

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>