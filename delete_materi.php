<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";

//untuk menghapus marteri
deleteMateri($_GET['material_id']);

header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/detil_course.php?course_id={$_GET['course_id']}");
exit();
