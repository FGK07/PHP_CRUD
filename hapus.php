<?php  
include('koneksi.php'); 

if (isset($_POST['no_pendaftaran'])) {
    $no = $_POST['no_pendaftaran'];

    // hapus data dengan prepared statement
    $hapus = $koneksi->prepare("DELETE FROM siswa WHERE no_pendaftaran = ?");
    $hapus->bind_param("i", $no);

    if ($hapus->execute()) {
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
