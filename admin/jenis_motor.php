<?php
include '../koneksi.php';

$jenis_motor = mysqli_query($koneksi, "SELECT * FROM jenis_motor");
?>

<h2>Jenis Motor List</h2>
<a href="admin.php?page=jenis_motor&action=add">Add New Jenis Motor</a>
<table border="1">
    <tr>
        <th>ID Jenis Motor</th>
        <th>Nama Jenis Motor</th>
        <th>Deskripsi</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($jenis_motor)) : ?>
    <tr>
        <td><?php echo $row['id_jenis_motor']; ?></td>
        <td><?php echo $row['nama_jenis_motor']; ?></td>
        <td><?php echo $row['deskripsi']; ?></td>
        <td>
            <a href="admin.php?page=jenis_motor&action=edit&id_jenis_motor=<?php echo $row['id_jenis_motor']; ?>">Edit</a>
            <a href="crud_jenis_motor.php?delete&id_jenis_motor=<?php echo $row['id_jenis_motor']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if ($_GET['action'] == 'edit') {
        $id_jenis_motor = $_GET['id_jenis_motor'];
        $jenis_motor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jenis_motor WHERE id_jenis_motor='$id_jenis_motor'"));
    } else {
        $jenis_motor = ['id_jenis_motor' => '', 'nama_jenis_motor' => '', 'deskripsi' => ''];
    }
?>
<form action="crud_jenis_motor.php" method="post">
    

    <label for="id_jenis_motor">ID Jenis Motor:</label>
    <input type="int" name="id_jenis_motor" value="<?php echo $jenis_motor['id_jenis_motor']; ?>" required><br>

    <label for="nama_jenis_motor">Nama Jenis Motor:</label>
    <input type="text" name="nama_jenis_motor" value="<?php echo $jenis_motor['nama_jenis_motor']; ?>" required><br>

    <label for="deskripsi">Deskripsi:</label>
    <input type="deskripsi" name="deskripsi" value="<?php echo $jenis_motor['deskripsi']; ?>" required><br>
    
    <button type="submit" name="save">Save</button>
</form>
<?php } ?>