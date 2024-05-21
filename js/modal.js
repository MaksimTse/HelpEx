document.addEventListener('DOMContentLoaded', () => {
    const editCourseModal = document.getElementById('editCourseModal');
    const deleteCourseModal = document.getElementById('deleteCourseModal');
    const editTutorModal = document.getElementById('editTutorModal');
    const deleteTutorModal = document.getElementById('deleteTutorModal');
    const addCourseModal = document.getElementById('addCourseModal');
    const addTutorModal = document.getElementById('addTutorModal');
    const closeModalButtons = document.querySelectorAll('.close');
    const cancelModalButtons = document.querySelectorAll('.cancel-btn');

    document.querySelectorAll('.edit-course-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('editCourseId').value = button.dataset.id;
            document.getElementById('editCourseName').value = button.dataset.name;
            document.getElementById('editCourseDescription').value = button.dataset.description;
            editCourseModal.style.display = 'block';
        });
    });

    document.querySelectorAll('.delete-course-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('deleteCourseId').value = button.dataset.id;
            deleteCourseModal.style.display = 'block';
        });
    });

    document.querySelectorAll('.edit-tutor-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('editTutorId').value = button.dataset.id;
            document.getElementById('editTutorName').value = button.dataset.name;
            document.getElementById('editTutorLesson').value = button.dataset.lesson;
            document.getElementById('editTutorDescription').value = button.dataset.description;
            editTutorModal.style.display = 'block';
        });
    });

    document.querySelectorAll('.delete-tutor-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('deleteTutorId').value = button.dataset.id;
            deleteTutorModal.style.display = 'block';
        });
    });

    document.getElementById('addCourseBtn').addEventListener('click', () => {
        addCourseModal.style.display = 'block';
    });

    document.getElementById('addTutorBtn').addEventListener('click', () => {
        addTutorModal.style.display = 'block';
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            editCourseModal.style.display = 'none';
            deleteCourseModal.style.display = 'none';
            editTutorModal.style.display = 'none';
            deleteTutorModal.style.display = 'none';
            addCourseModal.style.display = 'none';
            addTutorModal.style.display = 'none';
        });
    });

    cancelModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            editCourseModal.style.display = 'none';
            deleteCourseModal.style.display = 'none';
            editTutorModal.style.display = 'none';
            deleteTutorModal.style.display = 'none';
            addCourseModal.style.display = 'none';
            addTutorModal.style.display = 'none';
        });
    });

    window.addEventListener('click', (event) => {
        if (event.target == editCourseModal) {
            editCourseModal.style.display = 'none';
        }
        if (event.target == deleteCourseModal) {
            deleteCourseModal.style.display = 'none';
        }
        if (event.target == editTutorModal) {
            editTutorModal.style.display = 'none';
        }
        if (event.target == deleteTutorModal) {
            deleteTutorModal.style.display = 'none';
        }
        if (event.target == addCourseModal) {
            addCourseModal.style.display = 'none';
        }
        if (event.target == addTutorModal) {
            addTutorModal.style.display = 'none';
        }
    });

    document.getElementById('editCourseForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('update_course.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error updating course');
        }
    });

    document.getElementById('deleteCourseForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('delete_course.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error deleting course');
        }
    });

    document.getElementById('editTutorForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('update_tutor.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error updating tutor');
        }
    });

    document.getElementById('deleteTutorForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('delete_tutor.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error deleting tutor');
        }
    });

    document.getElementById('addCourseForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('add_course.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error adding course');
        }
    });

    document.getElementById('addTutorForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('add_tutor.php', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            location.reload();
        } else {
            alert('Error adding tutor');
        }
    });
});
