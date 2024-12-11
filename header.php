<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Budget Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; }
        nav { display: flex; justify-content: center; gap: 15px; background: #333; padding: 10px; }
        nav a { color: white; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>Personal Budget Tracker</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php else: ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>
