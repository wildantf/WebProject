<?php
$query = new PDO('mysql:HOST=localhost;dbname=elearning', 'root', '');
$query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Method digunakan untuk validasi akun
function checkPassword()
{
    global $query;
    $statement = $query->prepare(
        'SELECT * 
        FROM user 
        WHERE email=:email and password=SHA2(:password,0)'
    );
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
    return $statement->rowCount() > 0;
}
//Method digunakan untuk mengambil data user
function getIdUser()
{
    global $query;
    $statement = $query->prepare(
        'SELECT * 
        FROM user WHERE email=:email and password=SHA2(:password,0)'
    );
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
    return $statement;
}

// MATERI
// mengambil semua materi dikursus yang diikuti
function getAllMateri($id)
{
    global $query;
    $statement = $query->prepare(
        'SELECT m.course_id,c.course_name,m.user_id,u.user_name,u.photo_profile,m.title,m.content,m.date_posted,m.file_material
        FROM material m
        INNER JOIN user u
        ON u.id=m.user_id
        INNER JOIN course c
        ON m.course_id=c.id
        WHERE m.course_id IN(SELECT cp.course_id
        FROM course_participant cp
        WHERE cp.user_id=:user_id)
        ORDER BY date_posted DESC'
    );
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}
// mengambil materi berdasarkan parameter kursusnya
function getCourseMateri($course_id)
{
    global $query;
    $statement = $query->prepare(
        'SELECT m.id,m.course_id,c.course_name,m.user_id,u.user_name,u.photo_profile,m.title,m.content,m.file_material,m.date_posted 
        FROM material m
        INNER JOIN user u
        ON u.id=m.user_id
        INNER JOIN course c
        ON m.course_id=c.id
        WHERE m.course_id =:course_id
        ORDER BY date_posted DESC'
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    return $statement;
}


// FRIEND
function getDataFriend($id)
{
    global $query;
    $statement = $query->prepare(
        'SELECT cp.user_id,u.user_name,u.role_id
        FROM course_participant cp
        INNER JOIN user u
        ON cp.user_id=u.id
        WHERE cp.course_id IN (SELECT cp.course_id
        FROM course_participant cp
        WHERE cp.user_id=:user_id) AND cp.user_id<>:user_id
        GROUP BY cp.user_id
        ORDER BY u.user_name'
    );
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}
