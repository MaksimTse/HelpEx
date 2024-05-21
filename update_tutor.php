<?php
require 'includes/db.php';
global $pdo;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tutor_name = $_POST['tutor_name'];
    $lesson_taught = $_POST['lesson_taught'];
    $description = $_POST['description'];

    $sql = "UPDATE tutors SET tutor_name = ?, lesson_taught = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$tutor_name, $lesson_taught, $description, $id])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
