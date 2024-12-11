<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];

    $sql = "INSERT INTO spendings (user_id, amount) VALUES ($user_id, $amount)";
    if ($conn->query($sql)) {
        $updateIncome = "UPDATE users SET total_income = total_income - $amount WHERE id=$user_id";
        $conn->query($updateIncome);
        echo "Spending recorded! Remaining amount after spending is : " . ($conn->query("SELECT total_income FROM users WHERE id=$user_id")->fetch_assoc()['total_income']);
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <style>
        body { font-family: Arial; }
    </style>
</head>
<body>
    <h2>Add Spending</h2>
    <form method="post">
        <label>Amount:</label>
        <input type="number" name="amount" required><br>
        <button type="submit">Add</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
