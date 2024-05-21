<!DOCTYPE html>
<html>
<head>
    <title>HelpEx</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" type="image/png" href="tthk.jpg" alt="logo">
</head>
<body>
<header>
    <nav class="top-navbar">
        <div class="container">
            <a href="dashboard.php" class="logo">
                <img src="tthk.png" alt="Logo">
            </a>
            <ul class="nav-menu">
                <br>
                <li><a href="courses.php" class="btn">Courses</a></li>
                <li><a href="tutors.php" class="btn">Tutors</a></li>
                <?php
                session_start();
                if (isset($_SESSION['user_id'])):
                    global $pdo;
                    require 'includes/db.php';
                    $sql = "SELECT IsAdmin FROM users WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_SESSION['user_id']]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($user && $user['IsAdmin'] == 1): ?>
                        <li><a href="admin.php" class="btn">Admin Page</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
<main>
