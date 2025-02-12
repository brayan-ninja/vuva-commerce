<?php
// Database connection
$servername = "localhost"; // Change as needed
$username = "root"; // Change as needed
$password = ""; // Change as needed
$database = "blogs"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts with category names
$sql = "SELECT posts.id, posts.post_image, categories.category_name 
        FROM posts 
        JOIN categories ON posts.category_id = categories.id";
$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($posts);

$conn->close();
?>
