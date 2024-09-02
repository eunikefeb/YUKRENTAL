<?php
include '../koneksi.php';

$user = mysqli_query($koneksi, "SELECT * FROM user");
?>

<h2>User List</h2>
<a href="admin.php?page=user&action=add">Add New User</a>
<table border="1">
    <tr>
        <th>ID User</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($user)) : ?>
    <tr>
        <td><?php echo $row['id_user']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['level']; ?></td>
        <td>
            <a href="admin.php?page=user&action=edit&id_user=<?php echo $row['id_user']; ?>">Edit</a>
            <a href="crud_user.php?delete&id_user=<?php echo $row['id_user']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if ($_GET['action'] == 'edit') {
        $id_user = $_GET['id_user'];
        $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'"));
    } else {
        $user = ['id_user' => '', 'nama' => '', 'email' => '', 'username' => '', 'password' => '', 'level' => ''];
    }
?>
<form action="crud_user.php" method="post">
    <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
    
    <label for="nama">Nama :</label>
    <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required><br>

    <label for="email">Email :</label>
    <input type="text" name="email" value="<?php echo $user['email']; ?>" required><br>

    <label for="username">Username :</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>

    <label for="password">Password :</label>
    <input type="text" name="password" value="<?php echo $user['password']; ?>" required><br>

    <label for="level">Level :</label>
    <input type="text" name="level" value="<?php echo $user['level']; ?>" required><br>

    <button type="submit" name="save">Save</button>
</form>
<?php } ?>

