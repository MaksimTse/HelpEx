<?php include 'includes/header.php'; ?>
<?php
global $pdo;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'includes/db.php';
$sql = "SELECT IsAdmin FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || $user['IsAdmin'] != 1) {
    echo "<p>You do not have permission to access this page.</p>";
    exit;
}

// Получение списка курсов
$sql_courses = "SELECT * FROM courses";
$stmt_courses = $pdo->query($sql_courses);
$courses = $stmt_courses->fetchAll(PDO::FETCH_ASSOC);

// Получение списка репетиторов
$sql_tutors = "SELECT * FROM tutors";
$stmt_tutors = $pdo->query($sql_tutors);
$tutors = $stmt_tutors->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
</head>
<body>
<div class="container">
    <h1>Admin Dashboard</h1>
    <h2>Courses</h2>
    <table>
        <thead>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo $course['id']; ?></td>
                <td><?php echo $course['course_name']; ?></td>
                <td><?php echo $course['description']; ?></td>
                <td>
                    <button id="btnd" class="edit-course-btn" data-id="<?php echo $course['id']; ?>" data-name="<?php echo $course['course_name']; ?>" data-description="<?php echo $course['description']; ?>">Edit</button>
                    <button id="btnd" class="delete-course-btn" data-id="<?php echo $course['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Tutors</h2>
    <table>
        <thead>
        <tr>
            <th>Tutor ID</th>
            <th>Tutor Name</th>
            <th>Lesson Taught</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tutors as $tutor): ?>
            <tr>
                <td><?php echo $tutor['id']; ?></td>
                <td><?php echo $tutor['tutor_name']; ?></td>
                <td><?php echo $tutor['lesson_taught']; ?></td>
                <td><?php echo $tutor['description']; ?></td>
                <td>
                    <button id="btnd" class="edit-tutor-btn" data-id="<?php echo $tutor['id']; ?>" data-name="<?php echo $tutor['tutor_name']; ?>" data-lesson="<?php echo $tutor['lesson_taught']; ?>" data-description="<?php echo $tutor['description']; ?>">Edit</button>
                    <button id="btnd" class="delete-tutor-btn" data-id="<?php echo $tutor['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <h2>Add New</h2>
        <button id="addCourseBtn">Add Course</button>
        <button id="addTutorBtn">Add Tutor</button>
    </div>
</div>

<div id="editCourseModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Course</h2>
        <form id="editCourseForm">
            <input type="hidden" id="editCourseId" name="id">
            <label for="course_name">Course Name:</label>
            <input type="text" id="editCourseName" name="course_name" required>
            <label for="description">Description:</label>
            <input type="text" id="editCourseDescription" name="description" required>
            <button type="submit" id="btnd">Save Changes</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<div id="deleteCourseModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Confirm Delete</h2>
        <p>Are you sure you want to delete this course?</p>
        <form id="deleteCourseForm">
            <input type="hidden" id="deleteCourseId" name="id">
            <button type="submit" id="btnd">Yes, Delete</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<div id="editTutorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Tutor</h2>
        <form id="editTutorForm">
            <input type="hidden" id="editTutorId" name="id">
            <label for="tutor_name">Tutor Name:</label>
            <input type="text" id="editTutorName" name="tutor_name" required>
            <label for="lesson_taught">Lesson Taught:</label>
            <input type="text" id="editTutorLesson" name="lesson_taught" required>
            <label for="description">Description:</label>
            <input type="text" id="editTutorDescription" name="description" required>
            <button type="submit" id="btnd">Save Changes</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<div id="deleteTutorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Confirm Delete</h2>
        <p>Are you sure you want to delete this tutor?</p>
        <form id="deleteTutorForm">
            <input type="hidden" id="deleteTutorId" name="id">
            <button type="submit" id="btnd">Yes, Delete</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<!-- Модальные окна для добавления -->
<div id="addCourseModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Course</h2>
        <form id="addCourseForm">
            <label for="addCourseName">Course Name:</label>
            <input type="text" id="addCourseName" name="course_name" required>
            <label for="addCourseDescription">Description:</label>
            <input type="text" id="addCourseDescription" name="description" required>
            <button type="submit" id="btnd">Add Course</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<div id="addTutorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Tutor</h2>
        <form id="addTutorForm">
            <label for="addTutorName">Tutor Name:</label>
            <input type="text" id="addTutorName" name="tutor_name" required>
            <label for="addTutorLesson">Lesson Taught:</label>
            <input type="text" id="addTutorLesson" name="lesson_taught" required>
            <label for="addTutorDescription">Description:</label>
            <input type="text" id="addTutorDescription" name="description" required>
            <button type="submit" id="btnd">Add Tutor</button>
            <button type="button" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>

<script src="js/modal.js"></script>
</body>
</html>
