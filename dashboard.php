<?php include 'includes/header.php'; ?>
<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1>Welcome to your Dashboard</h1>
    <p>You are logged in!</p>
    <a class="btn" href="logout.php">Logout</a>
</div>
</body>
</html>
