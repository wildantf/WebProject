<?php
session_start();


$query = new PDO('mysql:HOST=localhost;dbname=elearning', 'root', '');
$query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//deklarasi timezone
date_default_timezone_set('Asia/Bangkok');

function getDataUser($id)
{
    global $query;
    $statement = $query->prepare(
        'SELECT u.* ,r.role_name
        FROM user u
        INNER JOIN role r
        ON r.id=u.role_id
        WHERE u.id=:user_id'
    );
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}

function editDataUser($id)
{
    //deklarasi direktori penyimpanan foto yang akan diuplpad
    $dirUpload = "assets/img/profile/";
    global $query;
    $query_password = '';
    if (!empty($_POST['password'])) {
        $query_password = 'password=:password,';
    }

    $statement = $query->prepare(
        "UPDATE user 
        SET user_name=:user_name,email=:email," . $query_password . "date_of_birth=:date_of_birth,photo_profile=:photo_profile,
        bio=:bio
        WHERE id=:user_id"
    );
    $statement->bindValue(':user_id', $id);
    $statement->bindValue(':user_name', $_POST['user_name']);
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':date_of_birth', $_POST['date_of_birth']);
    $statement->bindValue(':bio', $_POST['bio']);

    //untuk password
    if (!empty($_POST['password'])) {
        $statement->bindValue(':password', hash('sha256', $_POST['password']));
    }
    //untuk foto profile
    if (!empty($_FILES['photo']['name'])) {
        //variabel menampung nama file yang akan di upload(ditambahkan time() agar nama file bervariasi dan tidak terjadi duplikasi)
        $Picture_name = time() . '_' . $_FILES['photo']['name'];
        $statement->bindValue(":photo_profile", $Picture_name);
        $tmpName = $_FILES['photo']['tmp_name'];
        // memindahkan file dari local dir ke global dir(atau upload)
        move_uploaded_file($tmpName, $dirUpload . $Picture_name);
    } else {
        $statement->bindValue(":photo_profile", $_POST['photo_profile']);
    }
    $statement->execute();
    return $statement;
}

//memasukkan data user kedalam variabel untuk dipanggil di setiap page lainnya
foreach (getDataUser($_SESSION['user_id']) as $key) {
    $id = $key['id'];
    $name = $key['user_name'];
    $role_id = $key['role_id'];
    $photo_profile = $key['photo_profile'];
    $role_name = $key['role_name'];
}
