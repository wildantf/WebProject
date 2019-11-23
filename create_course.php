<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";
if (isset($_POST['submit'])) {
    createCourse($id);
    $course_id = getIdCourse();
    foreach ($course_id as $c_id) {
        joinCourse($id, $c_id['id']);
    }
    withdrawCourse($_SESSION['user_id'], $_GET['course_id']);
    header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/courses.php");
}

include "templates/header.php" ?>
<div class="container">
    <div class="content">
        <div class="form">
            <h1>Buat Kelas Kursus</h1>
            <form method="POST" action="create_course.php">
                <input type="text" name="course_name" class="input-text" placeholder="Nama Kursus..." required>
                <input type="textarea" name="description" class="input-text" placeholder="Deskripsi..." required>
                <input type="hidden" name="date_created" value="<?= date("Y-m-d"); ?>">
                <input class="btn btn-warning" type="submit" name="submit" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php include "templates/footer.php" ?>