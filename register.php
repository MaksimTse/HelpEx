<?php
require 'includes/db.php';
global $pdo;
$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($stmt->execute([':username' => $username, ':password' => $password])) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry, there must have been an issue creating your account';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HelpEx</title>
    <link rel="icon" type="image/png" href="tthk.jpg" alt="logo">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Enter your username" required>
        <input type="password" name="password" placeholder="and password" required>
        <input type="submit" value="Register">
    </form>
    <p><?= $message ?></p>
    <p><a href="index.php" class="btn">Back to Home</a></p>
</div>
</body>
</html>