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
    <title>Supplement Store</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Supplement Store</h1>
    <form action="supplement-store.php" method="POST">
        <label for="supplement_name">Supplement Name:</label>
        <input type="text" name="supplement_name" required>
        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <button type="submit">Add Supplement</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
