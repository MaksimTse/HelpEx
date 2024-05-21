<?php include 'includes/header.php'; ?>

<h1 class="he1">Courses</h1>
<?php
global $pdo;
require 'includes/db.php';

$sql = "SELECT * FROM courses";
$stmt = $pdo->query($sql);

foreach ($stmt as $row) {
    echo "<div class='container'>";
    echo "<h2>{$row['course_name']}</h2>";
    echo "<a href='course_details.php?id={$row['id']}'>Details</a>";
    echo "</div>";
}
?>

<?php include 'includes/footer.php'; ?>
