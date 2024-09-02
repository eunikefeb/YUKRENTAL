<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi data yang diterima dari formulir
    $errors = array();

    if (empty($_POST['nama'])) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    if (empty($_POST['alamat'])) {
        $errors[] = "Alamat harus diisi.";
    }

    if (empty($_POST['no_telp'])) {
        $errors[] = "Nomor telepon harus diisi.";
    }

    if (empty($_POST['tanggal_mulai']) || empty($_POST['tanggal_selesai'])) {
        $errors[] = "Tanggal sewa harus diisi.";
    }

    if (empty($_POST['motor_id'])) {
        $errors[] = "Motor ID harus diisi.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Simpan data pemesanan ke database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "yukrental1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
       
