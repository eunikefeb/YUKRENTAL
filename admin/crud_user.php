<?php
    include '../koneksi.php';

    // Create or Update User
    if (isset($_POST['save'])) {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        if (empty($id_user)) {
            $sql = "INSERT INTO user (nama, email, username, password, level) VALUES ('$nama', '$email', '$username', '$password', '$level')";
        } else {
            $sql = "UPDATE user SET nama='$nama', email='$email', username='$username', password='$password', level='$level' WHERE id_user='$id_user'";
        }
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=user");
    }

    // Delete User
    if (isset($_GET['delete'])) {
        $id_user = $_GET['id_user'];
        $sql = "DELETE FROM user WHERE id_user='$id_user'";
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=user");
    }
?>