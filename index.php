<?php
session_start();
include 'header.php';

?>

<div style="text-align: center; padding: 20px;">
    <h2>Welcome to Personal Budget Tracker</h2>
    <p>Keep track of your income and expenses effortlessly!</p>
    <p>Register or log in to get started managing your budget.</p>
    
    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="register.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Register</a>
        <a href="login.php" style="padding: 10px 20px; background-color: #008CBA; color: white; text-decoration: none; border-radius: 5px;">Login</a>
    <?php else: ?>
        <a href="dashboard.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Go to Dashboard</a>
    <?php endif; ?>
</div>
<link rel="stylesheet" href="style.css">

<?php include 'footer.php'; ?>
