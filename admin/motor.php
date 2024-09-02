<?php
include '../koneksi.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch motor data for the list
$motor = mysqli_query($koneksi, "SELECT * FROM motor");

// Fetch jenis_motor data for the dropdown
$jenis_motor_result = mysqli_query($koneksi, "SELECT id_jenis_motor, nama_jenis_motor FROM jenis_motor");
$jenis_motor_data = [];

if ($jenis_motor_result) {
    while ($row = mysqli_fetch_assoc($jenis_motor_result)) {
        $jenis_motor_data[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

<h2>Motor List</h2>
<a href="admin.php?page=motor&action=add">Add New Motor</a>
<table border="1">
    <tr>
        <th>ID Motor</th>
        <th>ID Jenis Motor</th>
        <th>Nama Motor</th>
        <th>No Plat</th>
        <th>Harga Per-Jam</th>
        <th>Foto Unit</th>
        <th>Detail</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($motor)) : ?>
    <tr>
        <td><?php echo $row['id_motor']; ?></td>
        <td><?php echo $row['id_jenis_motor']; ?></td>
        <td><?php echo $row['nama_motor']; ?></td>
        <td><?php echo $row['plat_motor']; ?></td>
        <td><?php echo $row['harga_perjam']; ?></td>
        <td><img src="uploads/<?php echo $row['foto']; ?>" alt="Foto Unit" style="width: 100px;"></td>
        <td><?php echo $row['detail']; ?></td>
        <td>
            <a href="admin.php?page=motor&action=edit&id_motor=<?php echo $row['id_motor']; ?>">Edit</a>
            <a href="crud_motor.php?delete&id_motor=<?php echo $row['id_motor']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if ($_GET['action'] == 'edit') {
        $id_motor = $_GET['id_motor'];
        $motor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM motor WHERE id_motor='$id_motor'"));
    } else {
        $motor = ['id_motor' => '', 'id_jenis_motor' => '', 'nama_motor' => '', 'plat_motor' => '', 'harga_perjam' => '', 'foto' => '', 'detail' => ''];
    }
?>

<form action="crud_motor.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_motor" value="<?php echo $motor['id_motor']; ?>">

    <label for="id_jenis_motor">Jenis Motor :</label>
    <select name="id_jenis_motor" required>
        <?php foreach ($jenis_motor_data as $jenis_motor) : ?>
            <option value="<?php echo $jenis_motor['id_jenis_motor']; ?>" <?php echo $motor['id_jenis_motor'] == $jenis_motor['id_jenis_motor'] ? 'selected' : ''; ?>>
                <?php echo $jenis_motor['nama_jenis_motor']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="nama_motor">Nama Motor :</label>
    <input type="text" name="nama_motor" value="<?php echo $motor['nama_motor']; ?>" required><br>

    <label for="plat_motor">No Plat :</label>
    <input type="text" name="plat_motor" value="<?php echo $motor['plat_motor']; ?>" required><br>

    <label for="harga_perjam">Harga Per-Jam:</label>
    <input type="text" name="harga_perjam" value="<?php echo $motor['harga_perjam']; ?>" required><br>

    <label for="foto">Foto :</label>
    <input type="file" name="foto" <?php echo empty($motor['foto']) ? 'required' : ''; ?>><br>

    <label for="detail">Detail :</label>
    <input type="text" name="detail" value="<?php echo $motor['detail']; ?>" required><br>
    
    <button type="submit" name="save">Save</button>
</form>
<?php } ?>
