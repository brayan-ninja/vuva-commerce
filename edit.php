<?php
session_start();
require 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Fetch the post to edit
$post_id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');
$stmt->execute(['post_id' => $post_id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    // Handle file upload if a new file is uploaded
    if (isset($_FILES['uploads']) && $_FILES['uploads']['error'] == 0) {
        $uploads_dir = 'uploads/'; // Directory to store uploaded files
        $file_name = basename($_FILES['uploads']['name']); // Get the file name
        $file_tmp = $_FILES['uploads']['tmp_name']; // Temporary file path
        $file_path = $uploads_dir . $file_name; // Full path to store the file

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Update the database with the new file path
            $stmt = $pdo->prepare('UPDATE posts SET uploads = :uploads, category_id = :category_id, price = :price WHERE id = :post_id');
            $stmt->execute([
                'uploads' => $file_path,
                'category_id' => $category_id,
                'price' => $price,
                'post_id' => $post_id
            ]);

            header('Location: workerdashboard.php');
            exit;
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        // If no new file is uploaded, update only category and price
        $stmt = $pdo->prepare('UPDATE posts SET category_id = :category_id, price = :price WHERE id = :post_id');
        $stmt->execute([
            'category_id' => $category_id,
            'price' => $price,
            'post_id' => $post_id
        ]);

        header('Location: workerdashboard.php');
        exit;
    }
}

// Fetch categories
$stmt = $pdo->query('SELECT * FROM category');
$categories = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: green;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit Post</h1>
    </div>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <div class="form-group">
                <label for="uploads">Upload Image</label>
                <input type="file" name="uploads" id="uploads" accept="image/*">
                <p>Current File: <?= basename($post['uploads']) ?></p>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : '' ?>>
                        <?= $category['category_name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" step="0.01" value="<?= $post['price'] ?>" required>
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>