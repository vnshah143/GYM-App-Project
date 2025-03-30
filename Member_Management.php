<?php
// add_member.php

include('db.php');

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
