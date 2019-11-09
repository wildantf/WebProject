<?php
session_start();
// login == 1 berarti telah login (agar navbar berubah) SESSION
$role_id = $_SESSION['role_id'];
$name = $_SESSION['name'];
$img = $_SESSION['foto_profile'];
$course = array("Bahasa Madura", "Bahasa Melayu", "Bahasa Inggris");
$page = 'home';
include "templates/header.php" ?>

<div class="grid-container">
    <!-- Bar KIRI -->
    <div class="sidebar-left">
        <div class="content">
            <img src="assets/img/profile/<?= $img; ?>" alt="">
            <div class="person-name">
                <?= $name; ?>
            </div>
        </div>
        <div class="content">
            <h3>Kursus List</h3>
            <ul>
                <?php foreach ($course as $c) : ?>
                    <li><a href=""><?= $c; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="update">
                <a href="tambahclass.php"><i class="fa fa-plus"></i> Tambah Kelas</a>
            </div>
        </div>
    </div>
    <!-- Akhir Bar KIRI -->

    <!-- MAIN BAR -->
    <div class="bar-center">
        <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius dolorem necessitatibus nostrum corporis? Asperiores iusto exercitationem odio similique excepturi, perferendis labore deserunt commodi laboriosam libero tenetur voluptatibus minus porro beatae cupiditate consequatur ducimus voluptates dolorem voluptate, quas quos a? Totam quod quam eos, dolor aut, possimus praesentium dolorum iste harum ea veritatis laboriosam autem fugit optio pariatur animi? Placeat repellendus distinctio nemo quidem ducimus, iure cumque perferendis culpa. Aspernatur facere iusto maiores architecto doloribus ipsum sapiente? Vitae cumque quia adipisci doloribus nobis illum omnis nisi in. Quaerat dolores deserunt culpa unde iste cum suscipit maxime, repellendus, explicabo cumque assumenda aliquam!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius dolorem necessitatibus nostrum corporis? Asperiores iusto exercitationem odio similique excepturi, perferendis labore deserunt commodi laboriosam libero tenetur voluptatibus minus porro beatae cupiditate consequatur ducimus voluptates dolorem voluptate, quas quos a? Totam quod quam eos, dolor aut, possimus praesentium dolorum iste harum ea veritatis laboriosam autem fugit optio pariatur animi? Placeat repellendus distinctio nemo quidem ducimus, iure cumque perferendis culpa. Aspernatur facere iusto maiores architecto doloribus ipsum sapiente? Vitae cumque quia adipisci doloribus nobis illum omnis nisi in. Quaerat dolores deserunt culpa unde iste cum suscipit maxime, repellendus, explicabo cumque assumenda aliquam!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius dolorem necessitatibus nostrum corporis? Asperiores iusto exercitationem odio similique excepturi, perferendis labore deserunt commodi laboriosam libero tenetur voluptatibus minus porro beatae cupiditate consequatur ducimus voluptates dolorem voluptate, quas quos a? Totam quod quam eos, dolor aut, possimus praesentium dolorum iste harum ea veritatis laboriosam autem fugit optio pariatur animi? Placeat repellendus distinctio nemo quidem ducimus, iure cumque perferendis culpa. Aspernatur facere iusto maiores architecto doloribus ipsum sapiente? Vitae cumque quia adipisci doloribus nobis illum omnis nisi in. Quaerat dolores deserunt culpa unde iste cum suscipit maxime, repellendus, explicabo cumque assumenda aliquam!</p>
        </div>
    </div>
    <!-- Akhir Main BAR -->

    <!-- BAR KANAN -->
    <div class="sidebar-right">
        <div class="content">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit facere praesentium asperiores itaque non delectus amet odit. Repudiandae totam et molestiae autem, laboriosam pariatur magni veritatis reprehenderit omnis sequi corrupti nisi ab accusamus praesentium. Nobis a, architecto ipsum, ad vero alias, deserunt maxime consequuntur ducimus officia ea incidunt eum possimus?</p>
        </div>
    </div>
</div>
<!-- AKHIR BAR KANAN -->

<?php include "templates/footer.php" ?>