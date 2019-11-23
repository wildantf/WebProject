<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";
$course_Joined = getAllCourseJoined($id); //kursus sudah gabung
$course_Unjoined = getAllCourseUnjoined($id); //kursus yang belum bergabung



include "templates/header.php" ?>
<div class="classes-page">
    <div class="grid-container">
        <div class="grid-header">
            <h3>Kursus Saya :</h3>
        </div>
        <?php foreach ($course_Joined as $c_j) : ?>
            <div class="item">
                <h3><?= $c_j['course_name'] ?></h3>
                <p class="description text-justify"><?= $c_j['description'] ?></p>
                <!-- Kondisi untuk melakukan proses pengecekan apakah anggota kursus lebih dari 1 dan kurang dari 1-->
                <?php if (getAllCourseParticipant($c_j['course_id'])->rowCount() > 1) { ?>
                    <a href="withdraw_course.php?id=<?= $_SESSION['user_id'] ?>&course_id=<?= $c_j['course_id'] ?>" class="btn btn-danger">Keluar</a><?php } else { ?>
                    <a href="delete_course.php?course_id=<?= $c_j['course_id'] ?>" class="btn btn-danger">Keluar & Hapus</a>
                <?php } ?>
                <!-- Kondisi untuk mengecek apakah Instuctur atau partisipan -->
                <?php if ($role_id == 1) : ?>
                    <a href=" edit_course.php?course_id=<?= $c_j['course_id'] ?>" class="btn btn-primary">Edit</a>
                <?php endif; ?>
                <a href="detil_course.php?course_id=<?= $c_j['course_id'] ?>" class="btn btn-warning">Detil</a>
            </div>
        <?php endforeach; ?>
        <?php if ($role_id == 1) : ?>
            <div class="grid-header">
                <div class="item adding-box">
                    <a href="create_course.php"><i class="fa fa-plus"></i> Tambah Kelas Kursus</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="grid-header">
            <h3>Daftar Kursus :</h3>
        </div>
        <?php if ($course_Unjoined->rowCount() < 1) {
            ?>
            <div class="grid-header">
                <div class="item adding-box">
                    <h3> Tidak Ada Kelas Lainnya</h3>
                </div>
            </div>
        <?php }; ?>

        <?php foreach ($course_Unjoined as $c_u) : ?>
            <div class="item">
                <h3><?= $c_u['course_name']; ?></h3>
                <p class="description"><?= $c_u['description'] ?></p>
                <a href="join_course.php?course_id=<?= $c_u['course_id'] ?>" class="btn btn-primary">Gabung</a>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<?php include "templates/footer.php" ?>