<?php require("koneksi.php"); ?>

<?php
$kode = "SELECT * FROM tracking ORDER BY waktu DESC";
$q = mysqli_query($koneksi, $kode);

function lokasi($posisi)
{
    $lokasi = "";
    if ($posisi == '001') {
        $lokasi = "Gerbang Sekolah";
    } elseif ($posisi == '002') {
        $lokasi = "Tembok Samping Musholla";
    } elseif ($posisi == '003') {
        $lokasi = "Tembok Belakang / Kantin";
    } elseif ($posisi == '004') {
        $lokasi = "Samping Lab Busana Lama";
    } else {
        $lokasi = "Di alam gaib";
    }

    return $lokasi;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Bolos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-Tracking Bolos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-sm btn-warning" aria-current="page" href="reset.php"
                            onclick="return confirm('Anda yakin ingin menghapus semua data coy ?')">Reset Data</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <main class="container py-5">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Bolos</h5>
                <p class="card-text">Berikut adalah catatan sensor pada sistem kami !</p>
                <a href="index.php" class="btn btn-primary">Refresh Data</a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Sensor</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Waktu Terdeteksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php while ($r = mysqli_fetch_array($q)) { ?>
                        <tr>
                            <th scope="row">
                                <?php echo $nomor; ?>
                            </th>
                            <td>
                                <?php echo $r['posisi']; ?>
                            </td>
                            <td>
                                <?php echo lokasi($r['posisi']) ?>
                            </td>
                            <td>
                                <?php echo $r['waktu'] ?>
                            </td>
                        </tr>


                        <?php $nomor = $nomor + 1; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>