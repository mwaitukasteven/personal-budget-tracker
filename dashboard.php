<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, total_income FROM users WHERE id=$user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

include 'header.php';
?>

<div class="container">
    <h2>Welcome, <?= $user['name'] ?></h2>
    <p>Total Income: <?= number_format($user['total_income'], 2) ?></p> <!-- Displaying total income -->
    <a href="spend.php" class="button">Add Spending</a>
</div>

<?php include 'footer.php'; ?>
