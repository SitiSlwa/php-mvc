<?php
// Koneksi ke database
$koneksiD = new mysqli('localhost', 'root', '', 'siti_xipplg2');
if ($koneksiD->connect_error) {
    die("Connection failed: " . $koneksiD->connect_error);
}

// Ambil data kunjungan
$result = $koneksiD->query("SELECT * FROM dokter");
if (!$result) {
    die("Query failed: " . $koneksiD->error);
}
?>

<html>
<head>
    <title>my App | Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                           <a href="pasien.php" class="nav-link" aria-current="page">Pasien</a>
                       </li>
                       <li class="nav-item">
                           <a href="dokter.php" class="nav-link" aria-current="page">Dokter</a>
                       </li>
                       <li class="nav-item">
                           <a href="kunjungan.php" class="nav-link" aria-current="page">Kunjungan</a>
                       </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Data Dokter</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="tambah_dokter.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Dokter</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Spesialisasi</th>
                            <th>No-Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['idDokter']}</td>
                                    <td>{$row['nmDokter']}</td>
                                    <td>{$row['spesialisasi']}</td>
                                    <td>{$row['noTelp']}</td>
                                    <td>
                                        <a href='edit_dokter.php?idDokter={$row['idDokter']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='koneksi_dokter.php?idDokter={$row['idDokter']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                    </td>
                                </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
