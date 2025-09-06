<?php
session_start(); // WAJIB di awal

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "admin123") {
        // login berhasil -> simpan status login
        $_SESSION['is_admin'] = true;
        header("Location: dashboard_admin_action.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="dashboard_admin.css">
</head>
<body>
    <div class="container-form">
        <h2>DASHBOARD LOGIN ADMIN</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" action="" class="form">
            <label for="username">Username</label></br>
            <input type="text" name="username" placeholder="Masukkan username">
            </br>
            <label for="password">Password</label></br>
            <input type="password" name="password" placeholder="Masukkan password">
            </br>
            <button type="submit">SUBMIT</button>
            </br>
        </form>
    </div>
</body>
</html>