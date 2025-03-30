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
    <title>Assign Fee Package</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Assign Fee Package to Member</h1>
    <form action="assign-fee-package.php" method="POST">
        <label for="member_id">Member ID:</label>
        <input type="text" name="member_id" required>
        <label for="fee_package">Fee Package:</label>
        <select name="fee_package">
            <option value="basic">Basic</option>
            <option value="premium">Premium</option>
            <option value="deluxe">Deluxe</option>
        </select>
        <button type="submit">Assign Fee Package</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
