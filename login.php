<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, md5($pass));

    if (empty($user)) {
        header("Location: index.php?gagal=userKosong");
    } else if (empty($pass)) {
        header("Location: index.php?gagal=passKosong");
    } else {
        $sql = "SELECT `id_user`, `level`, `password` FROM `user` WHERE `username`='$username'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);

        if ($jumlah == 0) {
            header("Location: index.php?gagal=userSalah");
        } else {
            $data = mysqli_fetch_assoc($query);
            if ($data['password'] != $password) {
                header("Location: index.php?gagal=passSalah");
            } else {
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['level'] = $data['level'];
                header("Location: ./admin/admin.php");
            }
        }
    }
}
?>
 