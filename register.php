<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $total_income = $_POST['total_income']; // Get the total income value

    // Check if the email already exists
    $checkQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Email already registered!";
    } else {
        // Insert user data into the database along with their total income
        $sql = "INSERT INTO users (name, email, password, phone, total_income) 
                VALUES ('$name', '$email', '$password', '$phone', '$total_income')";
        if ($conn->query($sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br>

        <label>Total Income:</label>
        <input type="number" name="total_income" required><br> <!-- Income input added -->

        <button type="submit">Register</button>
    </form>
    <a href="index.php">Home</a>
</body>
</html>
