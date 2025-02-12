<?php
session_start();
require 'db.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $agent_id = $_SESSION['id'];

    // Ensure the post belongs to the logged-in agent
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ? AND agent_id = ?");
    $stmt->execute([$id, $agent_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Post not found or you do not have permission to delete this post.");
    }

    // Delete the post from the database
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ? AND agent_id = ?");
    $stmt->execute([$id, $agent_id]);

    // Optionally, delete the associated image file from the uploads directory
    if (!empty($post['uploads'])) {
        $file_path = "uploads/" . $post['uploads'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // Redirect back to the dashboard
    header("Location: workerdashboard.php");
    exit;
} else {
    die("Invalid request.");
}
?>