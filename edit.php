<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP dan MySQLi</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <?php
    include("koneksi.php");

    // cek apakah ada data no_pendaftaran yang dikirim lewat POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['no_pendaftaran'])) {

        $no = $_POST['no_pendaftaran'];

        // ambil data sesuai no_pendaftaran
        $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_pendaftaran ='$no'");

        // cek apakah data ada
        if (mysqli_num_rows($data) > 0) {
            while ($d = mysqli_fetch_array($data)) {
    ?>
                <div class="container-form">
                    <h2>CRUD DATA MAHASISWA</h2>
                    <br><br>
                    <h3>EDIT DATA MAHASISWA</h3>
                    <form method="POST" action="edit_action.php" class="form">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" value="<?php echo $d['nim']; ?>">

                        <label for="nama">Nama</label>
                        <input type="hidden" name="no_pendaftaran" value="<?php echo $d['no_pendaftaran']; ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama'] ?>">

                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $d['alamat'] ?>">

                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" value="<?php echo $d['jurusan'] ?>">

                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" value="<?php echo $d['tanggal'] ?>">

                        <label for="agama">Agama</label>
                        <input type="text" name="agama" value="<?php echo $d['agama'] ?>">

                        <button type="submit">SIMPAN</button>
                    </form>
                </div>
    <?php
            }
        } else {
            echo "Data tidak ditemukan!";
        }
    } else {
        // jika akses langsung tanpa POST atau no_pendaftaran kosong
        header("Location: index.php");
        exit();
    }
    ?>
</body>

</html>