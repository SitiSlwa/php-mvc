<?php
$koneksiD = new mysqli('localhost', 'root', '', 'siti_xipplg2');
if ($koneksiD->connect_error) {
    die("Connection failed: " . $koneksiD->connect_error);
}

if (isset($_POST['simpan'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];
    $koneksiD->query("INSERT INTO dokter (idDokter, nmDokter, spesialisasi, noTelp) VALUES ('$idDokter', '$nmDokter', '$spesialisasi', '$noTelp')");
    header('Location: dokter.php');
    exit();
}

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    $koneksiD->query("DELETE FROM dokter WHERE idDokter = '$idDokter'");
    header('Location: dokter.php');
    exit();
}

if (isset($_POST['edit'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];
    $koneksiD->query("UPDATE dokter SET nmDokter='$nmDokter', spesialisasi='$spesialisasi', noTelp='$noTelp' WHERE idDokter='$idDokter'");
    header('Location: dokter.php');
    exit();
}
?>
