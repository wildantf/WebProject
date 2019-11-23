<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";


$course_Joined = getAllCourseJoined($id); //menyimpan kursus yang telah diikuti dalam variabel
$course_Unjoined = getAllCourseUnjoined($id); // menyimpan kursus yang belum diikuti dalam variabel
$all_course_materi = getAllMateri($id); // menyimpan materi-materi dari kursus yang diikuti dalam variabel
$course_instructor = getDataFriend($id); //menympan data instruktur sekelas user
$course_friend = getDataFriend($id); //menympan data teman sekelas user
include "templates/header.php"; ?>

<div class="grid-container">
    <!--contetn KIRI -->
    <div class="sidebar-left">
        <div class="content">
            <img src="assets/img/profile/<?= $photo_profile; ?>" alt="">
            <div class="size-14">
                <b><?= $name; ?></b>
            </div>
            <div class=" size-12">
                <?= $role_name; ?>
            </div>
        </div>
        <div class="content">
            <h3>Kursus List</h3>
            <ul>
                <!-- kursus yang sudah join -->
                <?php foreach ($course_Joined as $c_j) : ?>
                    <li><a href="detil_course.php?course_id=<?= $c_j['course_id'] ?>"><?= $c_j['course_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if ($course_Unjoined->rowCount() > 0) : ?>
                <h3>Kursus Lainnya</h3>
                <ul>
                    <!-- kursus belum join -->
                    <?php foreach ($course_Unjoined as $c_u) : ?>
                        <li><a href=""><?= $c_u['course_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <!-- button tambah kelas -->
            <div class="update">
                <a href="courses"><i class="fa fa-plus"></i> Tambah Kelas</a>
            </div>
        </div>
    </div>
    <!-- Akhir content KIRI -->

    <!-- MAIN BAR -->
    <div class="bar-center">
        <?php if ($all_course_materi->rowCount() < 1) { ?>
            <div class="content">
                <p class="size-14">Anda Belum Mendapatkan Materi Atau belum Masuk kelas.</p>
            </div>
        <?php } ?>
        <!-- melooping materi-materi dari kursus yang diikuti -->
        <?php foreach ($all_course_materi as $a_c_m) : ?>
            <div class="content">
                <div class="header-course-content">
                    <img src="assets/img/profile/<?= $a_c_m['photo_profile']; ?>" class="img-profile">
                    <div class="size-12"><?= $a_c_m['user_name']; ?></div>
                    <div class="size-12"><b><?= $a_c_m['course_name']; ?></b></div>
                    <div class="size-10">Di publikasikan <?= date("h:i:s A D M Y", $a_c_m['date_posted']); ?></div>
                </div>
                <h3><?= $a_c_m['title']; ?></h3>
                <?php if ($a_c_m['file_material'] != null) : ?>
                    <a class="file-materi" href="folder/<?= $a_c_m['file_material'] ?>"><?= $a_c_m['file_material']; ?></a>
                <?php endif; ?>
                <p class="text-justify"><?= $a_c_m['content']; ?></p>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- Akhir Main content-->

    <!-- content KANAN -->
    <div class="sidebar-right">
        <!-- menampilkan partisipan lainnya yang mengikuti kursus sama dengan user -->
        <div class="content">
            <?php if ($role_id == 1) {
                $text = "Rekan";
            } else {
                $text = "";
            }; ?>
            <ul class="friend">
                <h3><?= $text; ?> Instruktur</h3>
                <?php foreach ($course_instructor as $c_in) :
                    if ($c_in['role_id'] == 1) { ?>
                        <li><?= $c_in['user_name']; ?></li>
                    <?php }  ?>
                <?php endforeach; ?>
            </ul>
            <ul class="friend">
                <h3>Teman Kursus</h3>
                <?php foreach ($course_friend as $c_f) :
                    if ($c_f['role_id'] > 1) { ?>
                        <li><?= $c_f['user_name']; ?></li>
                    <?php } ?>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
<!-- AKHIR content KANAN -->

<?php include "templates/footer.php" ?>