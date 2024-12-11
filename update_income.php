<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_income = $_POST['total_income'];

    $sql = "UPDATE users SET total_income=$new_income WHERE id=$user_id";
    if ($conn->query($sql)) {
        echo "Income updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT total_income FROM users WHERE id=$user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Total Income</h2>
    <form method="post">
        <label>Total Income:</label>
        <input type="number" name="total_income" step="0.01" value="<?= $user['total_income'] ?>" required><br>
        <button type="submit">Update Income</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
