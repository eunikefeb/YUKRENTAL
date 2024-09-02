<?php
include '../koneksi.php';
$customers = mysqli_query($koneksi, "SELECT * FROM customer");
?>

<h2>Customer List</h2>
<a href="admin.php?page=customer&action=add">Add New Customer</a>
<table border="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>NIK</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($customers)) : ?>
    <tr>
        <td><?php echo $row['id_customer']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['no_telp']; ?></td>
        <td><?php echo $row['nik']; ?></td>
        <td>
            <a href="admin.php?page=customer&action=edit&id_customer=<?php echo $row['id_customer']; ?>">Edit</a>
            <a href="crud_customer.php?delete&id_customer=<?php echo $row['id_customer']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if ($_GET['action'] == 'edit') {
        $id_customer = $_GET['id_customer'];
        $customer = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$id_customer'"));
    } else {
        $customer = ['id_customer' => '', 'nama' => '', 'email' => '', 'alamat' => '', 'no_telp' => '', 'nik' => ''];
    }
?>
<form action="crud_customer.php" method="post">
    <input type="hidden" name="id_customer" value="<?php echo $customer['id_customer']; ?>">

    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo $customer['nama']; ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $customer['email']; ?>" required><br>

    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" value="<?php echo $customer['alamat']; ?>" required><br>
    
    <label for="no_telp">No Telp:</label>
    <input type="text" name="no_telp" value="<?php echo $customer['no_telp']; ?>" required><br>
    
    <label for="nik">NIK:</label>
    <input type="text" name="nik" value="<?php echo $customer['nik']; ?>" required><br>
    
    <button type="submit" name="save">Save</button>
</form>
<?php } ?>
