<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/db.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM notifications WHERE member_username='$username' ORDER BY notification_date DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bill Notifications</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Your Bill Notifications</h1>
    <table>
        <thead>
            <tr>
                <th>Notification ID</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['notification_id']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['notification_date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="/project-root/members/dashboard.html">Back to Dashboard</a>
</body>
</html>
