<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP dan MySQLi</title>
</head>
<body>
    <h2>CRUD DATA MAHASISWA</h2>
    </br>
    </br>
    <h3>EDIT DATA MAHASISWA</h3>

    <?php
    include("koneksi.php");

    // ambil no_pendaftaran dari URL (GET)
    $no = $_POST['no_pendaftaran'];

    $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_pendaftaran ='$no'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="POST" action="edit_action.php">
        <table>
            <tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" value="<?php echo $d['nim'];?>"></td>
                </tr>
                <td>Nama</td>
                <td>
                    <input type="hidden" name="no_pendaftaran" value="<?php echo $d['no_pendaftaran'];?>">
                    <input type="text" name="nama" value="<?php echo $d['nama']?>">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $d['alamat']?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?php echo $d['jurusan']?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $d['tanggal']?>"></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td><input type="text" name="agama" value="<?php echo $d['agama']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>
</html>
