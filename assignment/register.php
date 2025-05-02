<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        die("All fields are required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if ($password !== $confirmPassword) {
        die("Passwords don't match");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters");
    }

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->rowCount() > 0) {
        die("Username or email already exists");
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $passwordHash])) {
        header("Location: ../login.html?registration=success");
        exit();
    } else {
        die("Registration failed");
    }
}
?>