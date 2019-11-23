<?php
include_once "model/user_model.php";
include_once "model/kepenter_model.php";


include_once "templates/header.php";

$data_user = getDataUser($id);
?>

<div class="container">
    <div class="content">
        <div class="form">
            <form action="validation_edit_profile.php" method="POST" enctype="multipart/form-data" class="input-container">
                <h1>Edit Profile</h1>
                <table>
                    <?php foreach ($data_user as $d_u) : ?>
                        <div class="input-wrapper">
                            <!-- mengirim id user -->
                            <input type="hidden" name="user_id" value="<?= $id ?>">
                            <tr>
                                <td><label for="user_name">Nama</label>
                                </td>
                                <td>
                                    <input type="text" name="user_name" value="<?= $d_u['user_name'] ?>" class="input-text">
                                </td>
                            </tr>
                        </div>
                        <?php echo "<tr>
                            <td></td>
                            <td class='error'>";
                            if (isset($errors['user_name'])) echo $errors['user_name'];
                            echo "</td>
                            </tr>"; ?>
                        <div class="input-wrapper">
                            <tr>
                                <td>
                                    <label for="email">Email</label>
                                </td>
                                <td>
                                    <input type="text" name="email" value="<?= $d_u['email'] ?>" class="input-text">
                                </td>
                            </tr>
                        </div>
                        <?php echo "<tr>
                            <td></td>
                            <td class='error'>";
                            if (isset($errors['email'])) echo $errors['email'];
                            echo "</td>
                            </tr>"; ?>
                        <div class="input-wrapper">
                            <tr>
                                <td>
                                    <label for="bio">Biografi </label>
                                </td>
                                <td>
                                    <input type="text" name="bio" value="<?= $d_u['bio'] ?>" class="input-text">
                                </td>
                            </tr>
                        </div>
                        <tr>
                            <td>
                                <label for="photo_profile">Foto Profile</label>
                            </td>
                            <td>
                                <input type="hidden" value="<?= $d_u['photo_profile'] ?>" name="photo_profile">
                                <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg" class="input-text">
                            </td>
                        </tr>
                        <?php echo "<tr>
                            <td></td>
                            <td class='error'>";
                            if (isset($errors['photo'])) echo $errors['photo'];
                            echo "</td>
                            </tr>"; ?>
                        <tr>
                            <td>
                                <label for=" date_of_birth">Tanggal Lahir </label>
                            </td>
                            <td>
                                <input type="date" name='date_of_birth' value="<?= $d_u['date_of_birth'] ?>" class="input-text">
                            </td>
                        </tr>
                        <div class="input-wrapper">
                            <tr>
                                <td>
                                    <label for="password">Password Baru</label>
                                </td>
                                <td>
                                    <input type="password" name="password" class="input-text">
                                </td>
                            </tr>
                        </div>
                        <?php echo "<tr>
                            <td></td>
                            <td class='error'>";
                            if (isset($errors['password'])) echo $errors['password'];
                            echo "</td>
                            </tr>"; ?>
                        <div class="input-wrapper">
                            <tr>
                                <td>
                                    <label for="re-password">Ulangi Password</label>
                                </td>
                                <td>
                                    <input type="password" name="re-password" class="input-text">
                                </td>
                            </tr>
                        </div>
                        <?php echo "<tr>
                            <td></td>
                            <td class='error'>";
                            if (isset($errors['re-password'])) echo $errors['re-password'];
                            echo "</td>
                            </tr>"; ?>
                        <tr>
                            <td>
                                <input type="submit" name="edit" value="Edit">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        </div>
    </div>
</div>