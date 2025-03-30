<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="members_report.csv"');

include('../project-root/includes/gym_db.php');

$query = "SELECT * FROM members";
$result = mysqli_query($conn, $query);
$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Name', 'Email', 'Phone']);  // Column headers

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
?>
