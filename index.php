<?php
session_start();
include('/project-root/includes/gym_db.php');

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Retrieve user details (either admin, member, or user)
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Redirect to respective pages based on role
    if ($user['role'] == 'admin') {
        header('Location: admin/dashboard.php');
    } elseif ($user['role'] == 'member') {
        header('Location: members/dashboard.php');
    } elseif ($user['role'] == 'user') {
        header('Location: user/dashboard.php');
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <div class="main-container">
        <h1>Welcome to the Gym Management System</h1>
        
        <!-- If the user is not logged in, show login options -->
        <div class="login-options">
            <h2>Login to your account</h2>
            <form action="/project-root/login.html" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <button type="submit">Login</button>
            </form>

            <p>If you don't have an account, <a href="/project-root/register.html">Register here</a>.</p>
        </div>
    </div>
</body>
</html>
