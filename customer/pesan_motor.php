<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Motor</title>
</head>
<body>
    <h1>Form Pemesanan Motor</h1>
    <form action="proses_pesan_motor.php" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"></textarea><br>

        <label for="no_telp">Nomor Telepon:</label><br>
        <input type="tel" id="no_telp" name="no_telp"><br>

        <label for="tanggal_mulai">Tanggal Mulai Sewa:</label><br>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai"><br>

        <label for="tanggal_selesai">Tanggal Selesai Sewa:</label><br>
        <input type="date" id="tanggal_selesai" name="tanggal_selesai"><br>

        <label for="motor_id">Motor ID:</label><br>
        <input type="number" id="motor_id" name="motor_id"><br>
        
        <button type="submit">Pesan Sekarang</button>
    </form>
</body>
</html>
