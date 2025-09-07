<?php
$koneksi = mysqli_connect("localhost", "root","" ,"pendaftaran", 3307);

if (!$koneksi) {
    echo "Koneksi Gagal";
}
?>