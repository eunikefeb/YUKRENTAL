<?php
    include '../koneksi/koneksi.php';

    // Create or Update Transaksi
    if (isset($_POST['save'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $id_user = $_POST['id_user'];
        $id_customer = $_POST['id_customer'];
        $id_motor = $_POST['id_motor'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $tgl_mulai_sewa = $_POST['tgl_mulai_sewa'];
        $tgl_selesai_sewa = $_POST['tgl_selesai_sewa'];
        $total_harga = $_POST['total_harga'];
        $status_pembayaran = $_POST['status_pembayaran'];
        echo $id_transaksi;
        if (empty($id_transaksi)) {
            $sql = "INSERT INTO transaksi (id_user, id_customer, id_motor, tgl_transaksi, tgl_mulai_sewa, tgl_selesai_sewa, total_harga, status_pembayaran) 
            VALUES ('$id_user', '$id_customer', '$id_motor', '$tgl_transaksi', '$tgl_mulai_sewa', '$tgl_selesai_sewa', '$total_harga', '$status_pembayaran')";
        } else {
            $sql = "UPDATE transaksi SET id_user='$id_user', id_customer='$id_customer', id_motor='$id_motor', tgl_transaksi='$tgl_transaksi', tgl_mulai_sewa='$tgl_mulai_sewa', tgl_selesai_sewa='$tgl_selesai_sewa', total_harga='$total_harga', status_pembayaran='$status_pembayaran' 
            WHERE id_transaksi='$id_transaksi'";
        }
        mysqli_query($koneksi, $sql);
        header("Location: transaksi.php?page=transaksi");
    }

    // Delete Transaksi
    if (isset($_GET['delete'])) {
        $id_transaksi = $_GET['id_transaksi'];
        $sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
        mysqli_query($koneksi, $sql);
        header("Location: transaksi.php?page=transaksi");
    }
?>