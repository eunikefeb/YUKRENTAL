<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="?page=user">User</a></li>
            <li><a href="?page=customer">Customer</a></li>
            <li><a href="?page=jenis_motor">Jenis Motor</a></li>
            <li><a href="?page=motor">Motor</a></li>
            <li><a href="?page=transaksi">Transaksi</a></li>
        </ul>
    </div>
    <div class="content">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'customer';
        include $page . '.php';
        ?>
    </div>
</body>
</html>
