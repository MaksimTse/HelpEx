<?php include 'includes/header.php'; ?>

<h1 class="he1">Tutors</h1>
<?php
global $pdo;
require 'includes/db.php';

$sql = "SELECT * FROM tutors";
$stmt = $pdo->query($sql);

foreach ($stmt as $row) {
    echo "<div class='container'>";
    echo "<h2>{$row['tutor_name']}</h2>";
    echo "<p>Lesson Taught: {$row['lesson_taught']}</p>";
    echo "<a href='tutor_details.php?id={$row['id']}'>Details</a>";
    echo "</div>";
}
?>

<?php include 'includes/footer.php'; ?>
