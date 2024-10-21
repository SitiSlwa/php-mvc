<?php
$koneksiD = new mysqli('localhost', 'root', '', 'siti_xipplg2');
if ($koneksiD->connect_error) {
    die("Connection failed: " . $koneksiD->connect_error);
}

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    $result = $koneksiD->query("SELECT * FROM dokter WHERE idDokter='$idDokter'");
    if ($result) {
        $row = $result->fetch_assoc();
    } else {
        die("Query failed: " . $koneksiD->error);
    }
}
?>

<html>
<head>
    <title>Edit Data Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Edit Dokter</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="koneksi_dokter.php" method="post">
                    <div class="form-group">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" name="idDokter" id="idDokter" class="form-control" value="<?php echo $row['idDokter']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmDokter">Nama Dokter</label>
                        <input type="text" name="nmDokter" id="nmDokter" class="form-control" value="<?php echo $row['nmDokter']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" name="spesialisasi" id="spesialisasi" class="form-control" value="<?php echo $row['spesialisasi']; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="noTelp">No.Telp</label>
                        <input type="text" name="noTelp" id="noTelp" class="form-control" value="<?php echo $row['noTelp']; ?>">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="edit" value="Simpan" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
