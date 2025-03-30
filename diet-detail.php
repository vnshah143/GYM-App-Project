<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Details</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Add Diet Details</h1>
    <form action="/project-root/diet-detail.html" method="POST">
        <label for="diet_name">Diet Name:</label>
        <input type="text" name="diet_name" required>
        <label for="diet_description">Diet Description:</label>
        <textarea name="diet_description" required></textarea>
        <button type="submit">Add Diet</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
