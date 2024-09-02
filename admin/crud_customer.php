<?php
    include '../koneksi.php';

    // Create or Update Customer
    if (isset($_POST['save'])) {
        $id_customer = $_POST['id_customer'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $nik = $_POST['nik'];

        if (empty($id_customer)) {
            $sql = "INSERT INTO customer (nama, email, alamat, no_telp, nik) VALUES ('$nama', '$email', '$alamat', '$no_telp', '$nik')";
        } else {
            $sql = "UPDATE customer SET nama='$nama', email='$email', alamat='$alamat', no_telp='$no_telp', nik='$nik' WHERE id_customer='$id_customer'";
        }
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=customer");
    }

    // Delete Customer
    if (isset($_GET['delete'])) {
        $id_customer = $_GET['id_customer'];
        $sql = "DELETE FROM customer WHERE id_customer='$id_customer'";
        mysqli_query($koneksi, $sql);
        header("Location: admin.php?page=customer");
    }
?>