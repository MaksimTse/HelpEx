<?php
require 'includes/db.php';
global $pdo;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO courses (course_name, description) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$course_name, $description])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
