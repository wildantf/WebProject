<?php
// session_start();
// $page = 'index';
include "templates/header.php" ?>
<!-- jumbotron  -->
<div class="jumbotron">
    <div class="grid-container">
        <div class="left-content">
            <h1>Tingkatkan Skillmu Dengan Mengikuti Berbagai Kursus yang Ada.</h1>
            <h2><i>Manabi Ajher Kaangguy Web Panèka E-Kepenter</i></h2>
        </div>
        <div class="right-content">
            <div class="form">
                <form action="login" method="POST">
                    <div class="input-container">
                        <img src="assets/img/icon/login.png" alt="">
                        <div class="input-wrapper">
                            <input class="input-field" type="email" name="email" placeholder="Email">
                            <label for="email" class="fa fa-at input-icon"></label>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-field" type="password" name="password" placeholder="Password">
                            <label for="password" class="fa fa-key input-icon"></label>
                        </div>
                        <input type="submit" name="login" value="Masuk">
                        <!-- <a href="">lupa akun?</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir -->

<?php include "templates/footer.php" ?>