<?php include 'includes/header.php'; ?>

<?php
global $pdo;
// Проверяем, передан ли ID репетитора через GET-параметр
if(isset($_GET['id'])) {
    require 'includes/db.php';

    $tutor_id = $_GET['id'];

    // Запрос к базе данных для получения информации о репетиторе по его ID
    $sql = "SELECT * FROM tutors WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tutor_id]);
    $tutor = $stmt->fetch(PDO::FETCH_ASSOC);

    if($tutor) {
        // Если репетитор найден, выводим его информацию
        echo "<h2>{$tutor['tutor_name']}</h2>";
        echo "<p>Lesson Taught: {$tutor['lesson_taught']}</p>";
        echo "<p>{$tutor['description']}</p>";
    } else {
        echo "<p>Tutor not found.</p>";
    }
} else {
    echo "<p>Tutor ID not provided.</p>";
}
?>

<?php include 'includes/footer.php'; ?>
