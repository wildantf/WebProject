<?php
include "model/kepenter_model.php";
//aktifkan session untuk menyipan id user yang login
session_start();
if (isset($_POST['login'])) {
    if (checkPassword($_POST['email'], $_POST['password'])) {
        $_SESSION['login'] = 1;
        foreach (getIdUser() as $key) {
            $_SESSION['user_id'] = $key['id'];
        }
        header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/home.php");
        exit();
    } else {
        header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/");
    }
}
