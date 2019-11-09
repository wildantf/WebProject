<?php
session_start();
$page = 'index';
include "templates/header.php" ?>
<!-- jumbotron  -->
<div class="jumbotron">
    <div class="grid-container">
        <div class="left-content">
            <h1><b>Tingkatkan Skillmu Dengan Mengikuti Berbagai Kursus yang Ada.</b></h1>
            <h2><i>Mon Ajher Kaangguy aplikasi riah E-Kepenter</i></h2>
        </div>
        <div class="right-content">
            <div class="form">
                <form action="login" method="POST">
                    <div class="input-container">
                        <h4>Login</h4>
                        <div class="input-wrapper">
                            <input class="input-field" type="email" name="email" placeholder="Email">
                            <label for="email" class="fa fa-at input-icon"></label>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-field" type="password" name="password" placeholder="Password">
                            <label for="password" class="fa fa-key input-icon"></label>
                        </div>
                        <input type="submit" name="login" value="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir -->

<?php include "templates/footer.php" ?>