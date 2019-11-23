<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Exo+2|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>E-Kepenter</title>
    <link rel="icon" href="assets/img/logo.png">
</head>

<body>
    <?php if (isset($_SESSION['login'])) {
        ?>
        <nav>
            <div id="menubar" class="menubar">
                <div class="listMenu">
                    <a class="icon" href="#home"><img src="assets/img/emblem.png" alt=""></a>
                    <a href='home' class='menu-navbar'><i class='fa fa-home'></i> Depan</a>
                    <a href='courses' class='menu-navbar'><i class='fa fa-users'></i> Kelas Kursus</a>
                    <div class='menubar-right'>
                        <button onclick='myFunction()' style="background-image:url('assets/img/profile/<?= $photo_profile; ?>')"> </button>
                        <ul class='submenu'>
                            <li><a href='edit_profile.php'>Edit Profil</a></li>
                            <li><a href='logout.php'>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menubarMain">
                <div class="listMenu">
                    <a class="icon" href="#home"><img src="assets/img/emblem.png" alt=""></a>
                    <a href='home' class='menu-navbar'><i class='fa fa-home'></i> Depan</a>
                    <a href='courses' class='menu-navbar'><i class='fa fa-users'></i> Kelas Kursus</a>
                    <div class='menubar-right'>
                        <button onclick='myFunction()' style="background-image:url('assets/img/profile/<?= $photo_profile; ?>')"> </button>
                        <ul class='submenu'>
                            <li><a href='edit_profile.php'>Edit Profil</a></li>
                            <li><a href='logout.php'>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php }; ?>