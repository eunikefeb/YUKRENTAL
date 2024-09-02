<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <h1>Daftar Motor Tersedia</h1>
    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "yukrental1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil data motor dari database dan tampilkan
    $sql = "SELECT * FROM motor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . $row["nama_motor"] . "</h2>";
            echo "<p>Plat: " . $row["plat_motor"] . "</p>";
            echo "<p>Harga per Jam: " . $row["harga_perjam"] . "</p>";
            echo "<a href='detail_motor.php?id=" . $row["id_motor"] . "'>Detail</a>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada motor tersedia.";
    }
    $conn->close();
    ?>
</body>
</html>
