<?php
session_start();
include('../project-root/includes/gym_db.php');

// Initialize error and success messages
$error_msg = '';
$success_msg = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $error_msg = "Passwords do not match!";
    } else {
        // Check if the username already exists in the database
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $error_msg = "Username already exists!";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $role = 'user';  // Default role for registration
            $query = "INSERT INTO users (username, password, name, email, role) 
                      VALUES ('$username', '$hashed_password', '$name','$email', '$role')";
            if (mysqli_query($conn, $query)) {
                $success_msg = "Registration successful! You can now <a href='login.php'>login</a>.";
            } else {
                $error_msg = "Error occurred during registration. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <div class="register-form">
        <h2>Create an Account</h2>
        
        <!-- Display success or error message -->
        <?php if ($error_msg): ?>
            <div class="error-message"><?php echo $error_msg; ?></div>
        <?php endif; ?>
        <?php if ($success_msg): ?>
            <div class="success-message"><?php echo $success_msg; ?></div>
        <?php endif; ?>

        <!-- Registration Form -->
        <form action="/project-root/register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>
            
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="/project-root/login.php">Login here</a>.</p>
    </div>
</body>
</html>
