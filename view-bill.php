<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/db.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM bills WHERE member_username='$username'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bill Receipts</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Your Bill Receipts</h1>
    <table>
        <thead>
            <tr>
                <th>Bill ID</th>
                <th>Amount</th>
                <th>Bill Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['bill_id']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['bill_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="/project-root/members/dashboard.html">Back to Dashboard</a>
</body>
</html>
