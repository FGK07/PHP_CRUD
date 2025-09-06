<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>Register</title>
    <link rel="stylesheet" href="register_action.css">
</head>
<body>
    <?php
    include('koneksi.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim     = $_POST['nim'];
        $nama    = $_POST['nama'];
        $alamat  = $_POST['alamat'];
        $jurusan = $_POST['jurusan'];
        $tanggal = $_POST['tanggal'];
        $agama   = $_POST['agama'];

        $masuk = $koneksi->prepare("INSERT INTO siswa (nim, nama, alamat, jurusan, tanggal, agama) VALUES (?, ?, ?, ?, ?, ?)");
        $masuk->bind_param("isssss", $nim, $nama, $alamat, $jurusan, $tanggal, $agama);

        if ($masuk->execute()) {
            echo "<div class='container-box'><p>Data berhasil disimpan!</p><form action='index.php'><button type='submit'>Kembali</button></form></div>";
        } else {
            echo "Gagal menyimpan data: " . $masuk->error;
        }

        $masuk->close();
        $koneksi->close();
    } else {
        echo "<div class='container-box'><p>Akses halaman ini harus lewat form register!</p><form action='register.php'><button type='submit'>Kembali</button></form></div>";
    }
    ?>
</body>
</html>