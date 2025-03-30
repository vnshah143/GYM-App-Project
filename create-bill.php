<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/gym_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $bill_date = $_POST['bill_date'];
    $query = "INSERT INTO bills (member_id, amount, bill_date) VALUES ('$member_id', '$amount', '$bill_date')";
    if (mysqli_query($conn, $query)) {
        echo "Bill created successfully!";
    } else {
        echo "Error creating bill!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bill</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Create New Bill</h1>
    <form action="/project-root/create-bill.html" method="POST">
        <label for="member_id">Member ID:</label>
        <input type="text" name="member_id" required>
        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>
        <label for="bill_date">Bill Date:</label>
        <input type="date" name="bill_date" required>
        <button type="submit">Create Bill</button>
    </form>
    <a href="/project-root/admin/dashboard.html">Back to Dashboard</a>
</body>
</html>
