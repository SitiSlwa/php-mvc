<?php
$koneksiK = new mysqli('localhost', 'root', '', 'siti_xipplg2') or die(mysqli_error($koneksiK));

if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];
    $result = $koneksiK->query("SELECT * FROM kunjungan WHERE idKunjungan='$idKunjungan'") or die($koneksiK->error);
    $row = $result->fetch_assoc();
}
?>

<html>
<head>
    <title>Edit Kunjungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Edit Kunjungan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="koneksi_kunjungan.php" method="post">
                    <div class="form-group">
                        <label for="idKunjungan">ID Kunjungan</label>
                        <input type="text" name="idKunjungan" id="idKunjungan" class="form-control" value="<?php echo $row['idKunjungan']; ?>" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" name="idPasien" id="idPasien" class="form-control" value="<?php echo $row['idPasien']; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" name="idDokter" id="idDokter" class="form-control" value="<?php echo $row['idDokter']; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row['tanggal'])); ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" cols="5" rows="3" placeholder="Keluhan" class="form-control"><?php echo $row['keluhan']; ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="edit" value="Edit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
