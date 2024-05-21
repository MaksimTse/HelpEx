<?php
require 'includes/db.php';
global $pdo;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $sql = "UPDATE courses SET course_name = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$course_name, $description, $id])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
