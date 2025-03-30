<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/gym_db.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Your Details</h1>
    <table>
        <tr>
            <th>Username</th>
            <td><?php echo $user['username']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $user['name']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Membership Status</th>
            <td><?php echo $user['membership_status']; ?></td>
        </tr>
    </table>
    <a href="/project-root/user/dashboard.html">Back to Dashboard</a>
</body>
</html>
