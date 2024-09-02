<?php
include '../koneksi.php';

$transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi");
?>

<h2>Transaksi List</h2>
<a href="admin.php?page=transaksi&action=add">Add New Transaksi</a>
<table border="1">
    <tr>
        <th>ID Transsaksi</th>
        <th>ID User</th>
        <th>ID Customer</th>
        <th>ID Motor</th>
        <th>Tanggal Transaksi</th>
        <th>Tanggal Mulai Sewa</th>
        <th>Tanggal Selesai Sewa</th>
        <th>Total Harga</th>
        <th>Status Pembayaran</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($transaksi)) : ?>
    <tr>
        <td><?php echo $row['id_transaksi']; ?></td>
        <td><?php echo $row['id_user']; ?></td>
        <td><?php echo $row['id_customer']; ?></td>
        <td><?php echo $row['id_motor']; ?></td>
        <td><?php echo $row['tgl_transaksi']; ?></td>
        <td><?php echo $row['tgl_mulai_sewa']; ?></td>
        <td><?php echo $row['tgl_selesai_sewa']; ?></td>
        <td><?php echo $row['total_harga']; ?></td>
        <td><?php echo $row['status_pembayaran']; ?></td>
        <td>
            <a href="admin.php?page=transaksi&action=edit&id_transaksi=<?php echo $row['id_transaksi']; ?>">Edit</a>
            <a href="crud_transaksi.php?delete&id_transaksi=<?php echo $row['id_transaksi']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if ($_GET['action'] == 'edit') {
        $id_transaksi = $_GET['id_transaksi'];
        $transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'"));
    } else {
        $transaksi = ['id_transaksi' => '',  'id_user' => '', 'id_customer' => '', 'id_motor' => '', 'tgl_transaksi' => '', 'tgl_mulai_sewa' => '', 'tgl_selesai_sewa' => '', 'total_harga' => '', 'status_pembayaran' => ''];
    }
?>
<form action="crud_transaksi.php" method="post">
    <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi']; ?>">
    
    <label for="id_user">ID User :</label>
    <input type="text" name="id_user" value="<?php echo $transaksi['id_user']; ?>" required><br>

    <label for="id_customer">ID Customer :</label>
    <input type="text" name="id_customer" value="<?php echo $transaksi['id_customer']; ?>" required><br>

    <label for="id_motor">ID Motor :</label>
    <input type="text" name="id_motor" value="<?php echo $transaksi['id_motor']; ?>" required><br>

    <label for="tgl_transaksi">Tanggal Transaksi :</label>
    <input type="date" name="tgl_transaksi" value="<?php echo $transaksi['tgl_transaksi']; ?>" required><br>

    <label for="tgl_mulai_sewa">Tanggal Mulai Sewa :</label>
    <input type="datetime-local" name="tgl_mulai_sewa" value="<?php echo $transaksi['tgl_mulai_sewa']; ?>" required><br>

    <label for="tgl_selesai_sewa">Tanggal Selesai Sewa :</label>
    <input type="datetime-local" name="tgl_selesai_sewa" value="<?php echo $transaksi['tgl_selesai_sewa']; ?>" required><br>

    <label for="total_harga">Total Harga :</label>
    <input type="text" name="total_harga" value="<?php echo $transaksi['total_harga']; ?>" required><br>

    <label for="status_pembayaran">Status Pembayaran :</label>
    <input type="text" name="status_pembayaran" value="<?php echo $transaksi['status_pembayaran']; ?>" required><br>

    <button type="submit" name="save">Save</button>
</form>
<?php } ?>

