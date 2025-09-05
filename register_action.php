<?php
//koneksi ke db
include('koneksi.php');

//ambil input dari form
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jurusan=$_POST['jurusan'];
$tanggal=$_POST['tanggal'];
$agama =$_POST['agama'];

$masuk = $koneksi->prepare("INSERT INTO siswa (nim, nama, alamat, jurusan, tanggal, agama) VALUES (?, ?, ?, ?, ?, ?)");
$masuk->bind_param("isssss", $nim, $nama, $alamat, $jurusan, $tanggal, $agama);

// eksekusi query
if ($masuk->execute()) {
    echo "Data berhasil disimpan! <a href='index.php'>Kembali</a>";
} else {
    echo "Gagal menyimpan data: " . $masuk->error;
}
// tutup statement dan koneksi
$masuk->close();
$koneksi->close();
?>