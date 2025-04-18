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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <nav>
            <ul>
                <li><a href="/project-root/view-details.html">View Details</a></li>
                <li><a href="/project-root/search-records.html">Search Records</a></li>
            </ul>
        </nav>
        <a href="/project-root/logout.php">Logout</a>
    </div>
</body>
</html>
