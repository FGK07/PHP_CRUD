<?php
$koneksi = mysqli_connect("localhost", "root","" ,"db_pendaftaran", 3307);

if (!$koneksi) {
    echo "Koneksi Gagal";
}
?>