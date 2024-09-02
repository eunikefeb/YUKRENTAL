<?php
    include '../koneksi.php';

    // Create or Update Jenis_motor
    if (isset($_POST['save'])) {
        $id_jenis_motor = $_POST['id_jenis_motor'];
        $nama_jenis_motor = $_POST['nama_jenis_motor'];
        $deskripsi = $_POST['deskripsi'];

        if (empty($id_jenis_motor)) {
            $sql = "INSERT INTO jenis_motor (id_jenis_motor, nama_jenis_motor, deskripsi) VALUES ('$id_jenis_motor', '$nama_jenis_motor', '$deskripsi')";
        } else {
            $sql = "UPDATE jenis_motor SET nama_jenis_motor='$nama_jenis_motor', deskripsi='$deskripsi' WHERE id_jenis_motor='$id_jenis_motor'";
        }
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=jenis_motor");
    }

    // Delete jenis_motor
    if (isset($_GET['delete'])) {
        $id_jenis_motor = $_GET['id_jenis_motor'];
        $sql = "DELETE FROM jenis_motor WHERE id_jenis_motor='$id_jenis_motor'";
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=jenis_motor");
    }
?>