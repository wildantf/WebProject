<?php
include "model/user_model.php";
include "model/kepenter_model.php";
$errors = array();
if (isset($_POST)) {
    require 'validate.inc';
    validateUserName($errors, $_POST, 'user_name');
    validateEmail($errors, $_POST, 'email');
    if (!empty($_FILES['photo'])) {
        validatePhotoProfile($errors, $_FILES, 'photo');
    }
    if (!empty($_POST['password'])) {
        validatePassword($errors, $_POST, 'password');
        validateMatchPass($errors, $_POST, 're-password');
    }
    if ($errors) {
        // tampilkan kembali form
        require 'edit_profile.php';
    } else {
        editDataUser($id);
        header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/home.php");
    }
}
