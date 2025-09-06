<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php
    include('koneksi.php');
    ?>
    <div class="container-form">
        <h2>Pendaftaran</h2>
        <form method="POST" action="register_action.php" class="form">
            <label for="nim">Nim</label></br>
            <input type="number" name="nim" placeholder="Masukkan nim">
            </br>
            <label for="nama">Nama</label></br>
            <input type="text" name="nama" placeholder="Masukkan nama">
            </br>
            <label for="alamat">Alamat</label></br>
            <input type="text" name="alamat" placeholder="Masukkan alamat">
            </br>
            <label for="jurusan">Jurusan</label></br>
            <input type="text" name="jurusan" placeholder="Masukkan jurusan">
            </br>
            <label for="tanggal">Tanggal</label></br>
            <input type="date" id="tanggal" name="tanggal" required>
            </br>
            <label for="agama">Agama</label></br>
            <input type="text" name="agama" placeholder="Masukkan agama">
            </br>
            <button type="submit">SUBMIT</button>
            </br>
        </form>
        <form action="dashboard_login_admin.php" class="form">
            <button type="submit">LOGIN SEBAGAI ADMIN</button>
        </form>
    </div>
</body>
</html>