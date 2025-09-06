<?php  
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: dashboard_login_admin.php");
    exit();
}

include('koneksi.php'); 

if (isset($_POST['no_pendaftaran'])) {
    $no = intval($_POST['no_pendaftaran']);

    // hapus data dengan prepared statement
    $hapus = $koneksi->prepare("DELETE FROM siswa WHERE no_pendaftaran = ?");
    $hapus->bind_param("i", $no);

    if ($hapus->execute()) {
        // cek apakah tabel kosong
        $result = $koneksi->query("SELECT COUNT(*) as total FROM siswa");
        $row = $result->fetch_assoc();

        if ($row['total'] == 0) {
            // reset auto_increment kalau tabel kosong
            $koneksi->query("ALTER TABLE siswa AUTO_INCREMENT = 1");
        }

        header("Location: dashboard_admin_action.php");
        // cek apakah tabel kosong
        $result = $koneksi->query("SELECT COUNT(*) as total FROM siswa");
        $row = $result->fetch_assoc();

        if ($row['total'] == 0) {
            // reset auto_increment kalau tabel kosong
            $koneksi->query("ALTER TABLE siswa AUTO_INCREMENT = 1");
        }

        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $hapus->error;
    }

    $hapus->close();
} else {
    echo "ID tidak ditemukan di form";
}

$koneksi->close();
?>