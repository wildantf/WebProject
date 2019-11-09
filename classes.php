<?php
$login = 1;
$page = 'classes';
$course = array("Bahasa Madura", "Bahasa Melayu", "Bahasa Inggris", "Bahasa Tubuh");
$img = 'default.png';
include "templates/header.php" ?>
<div class="grid-container">
    <div class="header">
        <h3>Kelas Saya :</h3>
    </div>
    <?php foreach ($course as $c) : ?>
        <div class="item">
            <h3><?= $c; ?></h3>
        </div>
    <?php endforeach; ?>


    <div class="header">
        <h3>Daftar Kelas :</h3>
    </div>
    <?php foreach ($course as $c) : ?>
        <div class="item">
            <h3><?= $c; ?></h3>
        </div>
    <?php endforeach; ?>

</div>


<?php include "templates/footer.php" ?>