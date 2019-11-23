<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";
$course_Participant = getAllCourseParticipant($_GET['course_id']);
$course_materi = getCourseMateri($_GET['course_id']);

//untuk mengeluarkan participant yang ada di kursus
foreach ($course_Participant as $c_p) {
    withdrawCourse($c_p['user_id'], $c_p['course_id']);
}
// menghapus materi materi
foreach ($course_materi as $c_m) {
    deleteMateri($c_m['id']);
}


//untuk menghapus kursus
deleteCourse($_GET['course_id']);

header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/courses.php");
exit();
