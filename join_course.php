<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";
session_start();
joinCourse($_SESSION['user_id'], $_GET['course_id']);
header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/courses.php");
exit();
