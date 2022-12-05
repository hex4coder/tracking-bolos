<?php

require("koneksi.php");

$kode = "TRUNCATE tracking";
$q = mysqli_query($koneksi, $kode);
header("location:index.php");

?>