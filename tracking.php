<?php

require("koneksi.php");

$posisi = "001";
$sql = "INSERT INTO tracking(posisi) VALUES('$posisi')";
$q = mysqli_query($koneksi, $sql);

if ($q) {
    echo "Data terinput";
} else {
    echo "Data gagal terinput";
}

?>