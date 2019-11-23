<?php
$query = new PDO('mysql:HOST=localhost;dbname=elearning', 'root', '');
$query->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//untuk mengammbil data yang bergabung dalam kursus
function getAllCourseParticipant($course_id)
{
    global $query;
    $statement = $query->prepare(
        'SELECT cp.course_id, cp.user_id,u.user_name,r.id,r.role_name
        FROM course_participant cp
        INNER JOIN user u
        ON cp.user_id=u.id
        INNER JOIN role r
        ON u.role_id=r.id
        WHERE cp.course_id=:course_id'
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    return $statement;
}
//untuk mengambil data kursus yang telah diambil(join) oleh user
function getAllCourseJoined($id)
{
    global $query;
    $statement = $query->prepare(
        "SELECT cp.course_id,c.course_name,c.description
        FROM course_participant cp
        INNER JOIN user u 
            ON cp.user_id=u.id
        INNER JOIN course c
            ON c.id=cp.course_id
        WHERE u.id=:user_id
        GROUP BY cp.course_id
        ORDER BY c.course_name"
    );
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}
//untuk mengambil data kursus yang belum diambil(unjoin) oleh user
function getAllCourseUnjoined($id)
{
    global $query;
    $statement = $query->prepare(
        "SELECT cp.course_id,c.course_name,c.description
        FROM course_participant cp
        INNER JOIN course c 
            ON cp.course_id=c.id
        INNER JOIN user u
            ON cp.user_id=u.id
        WHERE c.id NOT IN(SELECT cp.course_id
                FROM course_participant cp
                INNER JOIN user u 
                ON cp.user_id=u.id
                WHERE u.id=:user_id)
        GROUP BY cp.course_id
        ORDER BY c.course_name"
    );
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}

//method digunakan untuk mengambil informasi course
function getInfoCourse($course_id)
{
    global $query;
    $statement = $query->prepare(
        "SELECT c.id, c.course_name, c.date_created,c.description, u.user_name
    FROM course c
    INNER JOIN user u
    ON u.id=c.user_id
    WHERE c.id=:course_id"
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    return $statement;
}

function editCourse($course_id)
{
    global $query;
    $statement = $query->prepare(
        "UPDATE course
    SET course_name=:course_name, description=:description
    WHERE id=:course_id"
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':course_name', $_POST['courseName']);
    $statement->bindValue(':description', $_POST['courseDescription']);
    $statement->execute();
    return $statement;
}

function joinCourse($id, $course_id)
{
    global $query;
    $statement = $query->prepare(
        "INSERT INTO course_participant (course_id,user_id)
    VALUES(:course_id,:user_id)"
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}

function createCourse($id)
{
    global $query;
    $statement = $query->prepare(
        "INSERT INTO course (course_name,user_id,description,date_created)
    VALUES(:course_name,:user_id,:description,:date_created)"
    );
    $statement->bindValue(':course_name', $_POST['course_name']);
    $statement->bindValue(':user_id', $id);
    $statement->bindValue('description', $_POST['description']);
    $statement->bindValue('date_created', $_POST['date_created']);
    $statement->execute();
    return $statement;
}

function getIdCourse()
{
    global $query;
    $statement = $query->prepare(
        "SELECT MAX(id) AS 'id'
        FROM course"
    );
    $statement->execute();
    return $statement;
}
//function untuk keluar dari kursus
function withdrawCourse($id, $course_id)
{
    global $query;
    $statement = $query->prepare(
        "DELETE FROM course_participant 
    WHERE course_id=:course_id AND user_id=:user_id"
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    return $statement;
}
//function untuk menghapus kursus
function deleteCourse($course_id)
{
    global $query;
    $statement = $query->prepare(
        "DELETE FROM course
    WHERE id=:course_id"
    );
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    return $statement;
}
// fungsi untuk tambah materi
function addMateri($id)
{
    // deklarasi direktori penyimpanan file yg telah di upload
    $dirUpload = "folder/";
    $file_name = time() . '_' . $_FILES['file']['name'];
    $tmpFile = $_FILES['file']['tmp_name'];
    $query_file = array("", "");
    if (!empty($_FILES['file']['tmp_name'])) {
        $query_file[0] = "file_material,";
        $query_file[1] = ":file_material,";
    }
    global $query;
    $statement = $query->prepare("INSERT INTO material (course_id,user_id,title," . $query_file[0] . "content,date_posted)
    VALUES(:course_id, :user_id,:title," . $query_file[1] . ":content,:date_posted)
    ");
    $statement->bindValue(':course_id', $_POST['course_id']);
    $statement->bindValue(':user_id', $id);
    $statement->bindValue(':title', $_POST['title']);
    $statement->bindValue(':content', $_POST['content']);
    if (!empty($_FILES['file']['tmp_name'])) {
        $statement->bindValue(':file_material', $file_name);
        move_uploaded_file($tmpFile, $dirUpload . $file_name);
    };
    $statement->bindValue(':date_posted', $_POST['date_posted']);
    $statement->execute();
    return $statement;
}
// function untuk delete materi
function deleteMateri($material_id)
{
    global $query;
    $statement = $query->prepare("DELETE FROM material 
    WHERE id=:material_id
    ");
    $statement->bindValue(':material_id', $material_id);
    $statement->execute();
    return $statement;
}
