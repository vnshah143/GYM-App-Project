<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../project-root/includes/gym_db.php');

$search_results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_query = $_POST['search_query'];
    
    // Search bills or other records, here we are assuming searching for bills
    $query = "SELECT * FROM bills WHERE member_username='" . $_SESSION['username'] . "' AND (bill_id LIKE '%$search_query%' OR amount LIKE '%$search_query%' OR bill_date LIKE '%$search_query%')";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $search_results[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Records</title>
    <link rel="stylesheet" href="/project-root/css/styles.css">
</head>
<body>
    <h1>Search Records</h1>
    <form method="POST">
        <label for="search_query">Search Bills:</label>
        <input type="text" name="search_query" id="search_query" required>
        <button type="submit">Search</button>
    </form>
    
    <?php if (count($search_results) > 0): ?>
        <h2>Search Results</h2>
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
                <?php foreach ($search_results as $row): ?>
                    <tr>
                        <td><?php echo $row['bill_id']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['bill_date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>No results found for your search query.</p>
    <?php endif; ?>

    <a href="/project-root/user/dashboard.html">Back to Dashboard</a>
</body>
</html>
