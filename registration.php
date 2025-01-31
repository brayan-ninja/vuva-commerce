<?php
session_start();

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: register.php');
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert into database
    try {
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'role' => 'worker'
        ]);

        $_SESSION['message'] = 'Registration successful! Please login.';
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Registration failed. Please try again.';
        header('Location: register.php');
        exit;
    }
}
?>

