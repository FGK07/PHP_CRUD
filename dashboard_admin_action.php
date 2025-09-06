<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: dashboard_login_admin.php");
    exit();
}

include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP dan MySQLi</title>
    <link rel="stylesheet" href="dashboard_admin_action.css">
</head>
<body>
    <h2>CRUD DATA MAHASISWA</h2>
    <table border="1">
        <tr>
            <th>NO PENDAFTARAN</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>JURUSAN</th>
            <th>TANGGAL</th>
            <th>AGAMA</th>
            <th>OPSI</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM siswa");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['nim'] ?></td>
                <td><?php echo $d['nama'] ?></td>
                <td><?php echo $d['alamat'] ?></td>
                <td><?php echo $d['jurusan'] ?></td>
                <td><?php echo $d['tanggal'] ?></td>
                <td><?php echo $d['agama'] ?></td>
                <td>
                    <form action="edit.php" method="POST" style="display:inline;">
                        <input type="hidden" name="no_pendaftaran" value="<?php echo $d['no_pendaftaran']; ?>">
                        <button type="submit" class="btn-edit">Edit</button>
                    </form>

                    <form action="hapus.php" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?');">
                        <input type="hidden" name="no_pendaftaran" value="<?php echo $d['no_pendaftaran']; ?>">
                        <button type="submit" class="btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <form action="register.php" method="POST">
        <button type="submit">TAMBAH MAHASISWA</button>
    </form>

    <form action="logout.php" method="POST">
        <button type="submit">LOGOUT</button>
    </form>
</body>
</html>
