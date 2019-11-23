<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";
$course_Joined = getAllCourseJoined($id); //kursus sudah gabung
$course_Unjoined = getAllCourseUnjoined($id);

if (isset($_POST['Edit'])) {
    editCourse($_POST['course_id']);
} else if (isset($_POST['Delete'])) { }
$courseInfo = getInfoCourse($_GET['course_id']);


include "templates/header.php" ?>

<div class="container">
    <div class="content">
        <div class="form">
            <h1>Edit Kelas</h1>
            <form action="edit_course.php?course_id=<?= $_GET['course_id'] ?>" method="POST">
                <?php foreach ($courseInfo as $ci) : ?>
                    <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>" class="input-field">
                    <input type="text" name="courseName" value="<?= $ci['course_name'] ?>" class="input-text">
                    <textarea name="courseDescription" class="input-text-area"><?= $ci['description'] ?></textarea>
                    <input type="submit" name="Edit" value="Edit" class="btn btn-warning">
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>
<?php include "templates/footer.php" ?>