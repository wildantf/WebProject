<?php if (isset($_SESSION['login'])) {
    $listBar = "<a href='#home' class='active'><i class='fa fa-home'></i> Depan</a>
    <a href='#home'><i class='fa fa-users'></i> Kelas Kursus</a>
    <a href='#home'><i class='fa fa-calendar-alt'></i>Agenda</a>
    <div class='menubar-right'>
        <a href='editprofile.php' class='foto-profile'><img src='assets/img/profile/$img'></a>
    </div>";
} else if (!isset($_SESSION['login'])) {
    $listBar = '<div class="dropdown">
    <button class="dropbtn">Pelajari Lagi
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="#Instuctor">Insturktur</a>
        <a href="#Assistant Instructor">Asistent Instrukstur</a>
        <a href="#Student">Peserta</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Developer
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="#Instuctor">Wildan Tamma FC</a>
        <a href="#Assistant Instructor">Asistent Instrukstur</a>
        <a href="#Student">Peserta</a>
    </div>
</div>
<div class="menubar-right">
    <a href="#login " class="btn register">Daftar</a>
    <a href="#login " class="btn">Masuk</a>
</div>';
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Exo+2|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php if ($page == 'classes') : ?>
        <link rel="stylesheet" href="assets/css/classes.css">
    <?php endif; ?>
    <title>E-Kepenter</title>
    <link rel="icon" href="assets/img/logo.png">
</head>

<body>
    <nav>
        <div id="menubar" class="menubar">
            <div class="listMenu">
                <a class="icon" href="#home"><img src="assets/img/emblem.png" alt=""></a>
                <?= $listBar; ?>
            </div>
        </div>
        <div class="menubarMain">
            <div class="listMenu">
                <a class="icon" href="#home"><img src="assets/img/emblem.png" alt=""></a>
                <?= $listBar; ?>
            </div>
        </div>
    </nav>