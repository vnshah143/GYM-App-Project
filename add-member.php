<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/gym_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO members (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if (mysqli_query($conn, $query)) {
        echo "Member added successfully!";
    } else {
        echo "Error adding member!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Add New Member</h1>
    <form action="add-member.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
        <button type="submit">Add Member</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
