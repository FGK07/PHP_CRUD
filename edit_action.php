<?php
// koneksi database 
include 'koneksi.php'; 
  
// menangkap data yang di kirim dari form 
$no = $_POST['no_pendaftaran'];
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jurusan=$_POST['jurusan'];
$tanggal=$_POST['tanggal'];
$agama =$_POST['agama'];

// update data ke database 
$data = $koneksi->prepare("UPDATE siswa SET nim=?, nama=?, alamat=?, jurusan=?, tanggal=?, agama=? WHERE no_pendaftaran=?");
$data->bind_param("isssssi",$nim, $nama, $alamat, $jurusan, $tanggal, $agama, $no);

if ($data->execute()) {
    // berhasil update
    header("Location: index.php");
    exit();
} else {
    echo "Gagal update data: " . $data->error;
}

$data->close();
$koneksi->close();
  
?>