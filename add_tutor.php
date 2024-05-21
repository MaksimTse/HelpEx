<?php
require 'includes/db.php';
global $pdo;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tutor_name = $_POST['tutor_name'];
    $lesson_taught = $_POST['lesson_taught'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tutors (tutor_name, lesson_taught, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$tutor_name, $lesson_taught, $description])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
