<?php
//Method digunakan untuk validasi akun
function checkPassword()
{
    $query = new PDO('mysql:HOST=localhost;dbname=ekepenter', 'root', '');
    $statement = $query->prepare('SELECT * FROM user WHERE email=:email and password=SHA2(:password,0)');
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
    return $statement->rowCount() > 0;
}
//Method digunakan untuk mengambil data user
function getDataUser()
{
    $query = new PDO('mysql:HOST=localhost;dbname=ekepenter', 'root', '');
    $statement = $query->prepare('SELECT * FROM user WHERE email=:email and password=SHA2(:password,0)');
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
    return $statement;
}
//aktifkan session untuk menyipan data user yang login
session_start();
if (isset($_POST['login'])) {
    if (checkPassword($_POST['email'], $_POST['password'])) {
        $_SESSION['login'] = 1;
        $_SESSION['role_id'] = $_POST['role_id'];
        foreach (getDataUser() as $key) {
            $_SESSION['user_id'] = $key['id'];
            $_SESSION['name'] = $key['name'];
            $_SESSION['email'] = $key['email'];
            $_SESSION['role_id'] = $key['role_id'];
            $_SESSION['foto_profile'] = $key['foto_profile'];
        }
        header("Location:http://{$_SERVER['HTTP_HOST']}/PROJECT%20UAS/home.php");
        exit();
    }
}
