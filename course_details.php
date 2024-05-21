<?php include 'includes/header.php'; ?>

<?php
global $pdo;
// Проверяем, передан ли ID курса через GET-параметр
if(isset($_GET['id'])) {
    require 'includes/db.php';

    $course_id = $_GET['id'];

    // Запрос к базе данных для получения информации о курсе по его ID
    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$course_id]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if($course) {
        // Если курс найден, выводим его информацию
        echo "<h2>{$course['course_name']}</h2>";
        echo "<p>{$course['description']}</p>";
    } else {
        echo "<p>Course not found.</p>";
    }
} else {
    echo "<p>Course ID not provided.</p>";
}
?>

<?php include 'includes/footer.php'; ?>
