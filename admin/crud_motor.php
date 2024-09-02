<?php
include '../koneksi.php';

if (isset($_POST['save'])) {
    $id_motor = $_POST['id_motor'];
    $id_jenis_motor = $_POST['id_jenis_motor'];
    $nama_motor = $_POST['nama_motor'];
    $plat_motor = $_POST['plat_motor'];
    $harga_perjam = $_POST['harga_perjam'];
    $detail = $_POST['detail'];

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $foto_name = time() . '_' . $foto['name'];
        $foto_tmp_name = $foto['tmp_name'];
        $img = $foto_name;

        // Move the uploaded file to the desired folder
        if (move_uploaded_file($foto_tmp_name, $img)) {
            // If the file is uploaded successfully, save the file path to the database
            if ($id_motor) {
                // Update existing motor
                $query = "UPDATE motor SET nama_motor='$nama_motor', plat_motor='$plat_motor', harga_perjam='$harga_perjam', foto='$img', detail='$detail' WHERE id_motor='$id_motor'";
            } else {
                // Insert new motor
                $query = "INSERT INTO motor (id_jenis_motor, nama_motor, plat_motor, harga_perjam, foto, detail) VALUES ('$id_jenis_motor', '$nama_motor', '$plat_motor', '$harga_perjam', '$img', '$detail')";
            }

            if (mysqli_query($koneksi, $query)) {
                header('Location: admin.php?page=motor');
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}

// // Handle delete
if (isset($_GET['delete'])) {
    $id_motor = $_GET['id_motor'];
    $query = "DELETE FROM motor WHERE id_motor='$id_motor'";

    if (mysqli_query($koneksi, $query)) {
        header('Location: admin.php?page=motor');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

?>
