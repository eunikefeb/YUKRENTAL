<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Motor</title>
</head>
<body>
    <?php
    if(isset($_GET['id'])) {
        $motor_id = $_GET['id'];

        // Koneksi ke database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "yukrental1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Ambil data motor dari database berdasarkan ID
        $sql = "SELECT * FROM motor WHERE id_motor=$motor_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>Detail Motor</h1>";
            echo "<h2>" . $row["nama_motor"] . "</h2>";
            echo "<p>Plat: " . $row["plat_motor"] . "</p>";
            echo "<p>Harga per Jam: " . $row["harga_perjam"] . "</p>";
            echo "<p>Foto:</p>";
            echo "<img src='" . $row["foto"] . "' alt='Foto Motor'>";
            echo "<a href='pesan_motor.php?id=" . $row["id_motor"] . "'>Pesan Motor</a>";
        } else {
            echo "Motor tidak ditemukan.";
        }
        $conn->close();
    } else {
        echo "Parameter ID motor tidak ditemukan.";
    }
    ?>
</body>
</html>
