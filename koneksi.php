<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'tb');

if ($koneksi) {
    // echo "Berhasil";
} else {
    echo "Koneksi gagal";
}
?>