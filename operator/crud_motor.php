<?php
    include '../koneksi/koneksi.php';

    // Create or Update Motor
    if (isset($_POST['save'])) {
        $id_motor = $_POST['id_motor'];
        $id_jenis_motor = $_POST['id_jenis_motor'];
        $nama_motor = $_POST['nama_motor'];
        $plat_motor = $_POST['plat_motor'];
        $harga_perjam = $_POST['harga_perjam'];
        $foto = $_POST['foto'];
        $detail = $_POST['detail'];

        if (empty($id_motor)) {
            $sql = "INSERT INTO motor (id_jenis_motor, nama_motor, plat_motor, harga_perjam, foto, detail) 
            VALUES ('$id_jenis_motor', '$nama_motor', '$plat_motor', '$harga_perjam', '$foto', '$detail')";
        } else {
            $sql = "UPDATE motor SET id_jenis_motor='$id_jenis_motor', nama_motor='$nama_motor', plat_motor='$plat_motor', harga_perjam='$harga_perjam', foto='$foto', detail='$detail' 
            WHERE id_motor='$id_motor'";
        }
        mysqli_query($koneksi, $sql);
        header("Location: motor.php?page=motor");
    }

    // Delete Motor
    if (isset($_GET['delete'])) {
        $id_motor = $_GET['id_motor'];
        $sql = "DELETE FROM motor WHERE id_motor='$id_motor'";
        mysqli_query($koneksi, $sql);
        header("Location: motor.php?page=motor");
    }
?>