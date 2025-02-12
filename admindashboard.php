<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Fetch all agents
$stmt = $pdo->query('SELECT * FROM agents');
$agents = $stmt->fetchAll();

// Delete agent
if (isset($_GET['delete_agent'])) {
    $agent_id = $_GET['delete_agent'];
    $pdo->prepare('DELETE FROM agents WHERE id = ?')->execute([$agent_id]);
    header('Location: admindashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout {
            float: right;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Vuva Admin Dashboard</h1>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    <div class="container">
        <h2>Agents</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php foreach ($agents as $agent): ?>
            <tr>
                <td><?= $agent['id'] ?></td>
                <td><?= $agent['username'] ?></td>
                <td><?= $agent['email'] ?></td>
                <td><?= $agent['role'] ?></td>
                <td><a href="admindashboard.php?delete_agent=<?= $agent['id'] ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>