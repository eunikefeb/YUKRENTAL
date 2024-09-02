<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <?php if (isset($_GET['gagal'])): ?>
            <p class="error">
                <?php
                    if ($_GET['gagal'] == 'userKosong') {
                        echo "Username harus diisi.";
                    } elseif ($_GET['gagal'] == 'passKosong') {
                        echo "Password harus diisi.";
                    } elseif ($_GET['gagal'] == 'userSalah') {
                        echo "Username salah.";
                    } elseif ($_GET['gagal'] == 'passSalah') {
                        echo "Password salah.";
                    }
                ?>
            </p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
