<?php
include "model/user_model.php";
include "model/kepenter_model.php";
include "model/course_model.php";

if (isset($_POST['Tambah'])) {
    addMateri($id);
}
$course_Info = getInfoCourse($_GET['course_id']); //kursus sudah gabung
$course_Participant = getAllCourseParticipant($_GET['course_id']);
$course_materi = getCourseMateri($_GET['course_id']);



include "templates/header.php"; ?>

<div class="container">
    <!--detil kursus header -->
    <div class="content">
        <h1>Detil Kursus</h1>
        <table>
            <?php foreach ($course_Info as $c_i) : ?>
                <tr>
                    <td>Nama Kursus</td>
                    <td>:</td>
                    <td><?= $c_i['course_name']; ?></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?= $c_i['description']; ?></td>
                </tr>
                <tr>
                    <td>Dibuat Oleh</td>
                    <td>:</td>
                    <td><?= $c_i['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Dibuat Tanggal</td>
                    <td>:</td>
                    <td><?= $c_i['date_created']; ?></td>
                </tr>
                <tr>
                    <td>Partisipan</td>
                    <td>:</td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- akhir detil kursu header-->

        <!-- menampilkan info participan dalam bentuk tabel -->
        <div class="border">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kapasitas</th>
                    <?php if ($role_id == 1) :  ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($course_Participant as $c_p) : ?>
                    <tr>
                        <td><?= $c_p['user_id']; ?></td>
                        <td><?= $c_p['user_name']; ?></td>
                        <td><?= $c_p['role_name']; ?></td>
                        <!-- kondisi untuk mengecek role,jika instruktur maka punya akses untuk mengeluarkan partisipan -->
                        <?php if ($role_id == 1) :  ?>
                            <?php if ($c_p['user_id'] != $id) { ?>
                                <td><a href="withdraw_course.php?id=<?= $c_p['user_id'] ?>&course_id=<?= $c_p['course_id']; ?>" class="btn btn-danger">Keluarkan</a></td>
                            <?php } else {  ?>
                                <td><a href="withdraw_course.php?id=<?= $_SESSION['user_id'] ?>&course_id=<?= $c_p['course_id'] ?>" class="btn btn-warning">Keluar</a></td>
                            <?php } ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php if ($role_id == 1) :  ?>
            <a class="btn btn-danger" href="delete_course.php?course_id=<?= $c_p['course_id'] ?>">Hapus Kursus</a>
        <?php endif; ?>
    </div>
    <!-- akhir -->

    <!-- tambah materi kursus -->
    <?php if ($role_id == 1) : ?>
        <div class="content">
            <h3>Tambah Materi</h3>
            <form action="detil_course.php?course_id=<?= $_GET['course_id'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>">
                <input type="text" name="title" placeholder="Judul Materi..." class="input-text" required>
                <textarea name="content" class="input-text-area" placeholder="Text Area..."></textarea>
                <input type="file" name="file" accept=".pdf,.doc,.docx" class="input-file">
                <input type="hidden" name="date_posted" value="<?= time() ?>">
                <br>
                <input type="submit" name="Tambah" value="Tambah" class="btn btn-primary">
            </form>
        </div>
    <?php endif; ?>
    <!-- akhir -->


    <!-- Materi materi kursus -->
    <?php foreach ($course_materi as $c_m) : ?>
        <div class="content">
            <div class="content-materi">
                <div class="header-course-content">
                    <img src="assets/img/profile/<?= $c_m['photo_profile']; ?>" class="img-profile">
                    <div class="size-12"><?= $c_m['user_name']; ?></div>
                    <div class="size-12"><b><?= $c_m['course_name']; ?></b></div>
                    <div class="size-10">Di publikasikan <?= date("h:i:s A D M Y", $c_m['date_posted']); ?></div>
                </div>
                <h3><?= $c_m['title']; ?></h3>
                <?php if ($c_m['file_material'] != null) : ?>
                    <a class="file-materi" href="folder/<?= $c_m['file_material'] ?>"><?= $c_m['file_material'] ?></a>
                <?php endif; ?>
                <p class="text-justify"><?= $c_m['content']; ?></p>
                <?php if ($role_id == 1) : ?>
                    <a href="delete_materi.php?course_id=<?= $_GET['course_id'] ?>&material_id=<?= $c_m['id'] ?>" class="btn btn-danger">Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- akhir -->
</div>