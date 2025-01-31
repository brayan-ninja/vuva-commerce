<?php
$host = 'localhost';
$db   = 'blogs';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Define the Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Set PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      // Set default fetch mode to associative array
    PDO::ATTR_EMULATE_PREPARES   => false,                 // Disable emulated prepared statements
];

try {
    // Create a PDO instance (database connection)
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo ""; // Optional: For debugging purposes
} catch (\PDOException $e) {
    // Handle connection errors gracefully
    throw new \PDOException("Connection failed: " . $e->getMessage(), (int)$e->getCode());
}
?>