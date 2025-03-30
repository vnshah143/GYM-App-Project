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
    <title>Assign Monthly Notification</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Assign Monthly Notification</h1>
    <form action="assign-notification.php" method="POST">
        <label for="member_id">Member ID:</label>
        <input type="text" name="member_id" required>
        <label for="notification">Notification Message:</label>
        <textarea name="notification" required></textarea>
        <button type="submit">Assign Notification</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
