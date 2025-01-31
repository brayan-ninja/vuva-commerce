<?php
session_start();

require 'db.php'; // Ensure this file contains the PDO connection code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: register.php');
        exit;
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: register.php');
        exit;
    }

    if (strlen($password) < 8) {
        $_SESSION['error'] = 'Password must be at least 8 characters long.';
        header('Location: register.php');
        exit;
    }

    // Check if username or email already exists
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    $stmt->execute(['username' => $username, 'email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['error'] = 'Username or email already exists.';
        header('Location: register.php');
        exit;
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database
    try {
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password_hash,
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('path/to/your/background-image.jpg'); /* Add your background image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Container for the form */
        .form-container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        /* User image styling */
        .user-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid #007BFF; /* Blue border */
        }

        /* Form heading */
        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Form input fields */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Submit button */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF; /* Blue button */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Link styling */
        p a {
            color: #007BFF;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Error and success message styling */
        .message {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- User image -->
        <img src="img/user.jpg" alt="User Icon" class="user-image">

        <!-- Form heading -->
        <h2>Register</h2>

        <!-- Display error messages -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <!-- Display success messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <p class="message success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        <?php endif; ?>

      
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>
            <br>
            <button type="submit">Register</button>
        </form>

        
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
