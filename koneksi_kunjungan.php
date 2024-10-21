<?php
$koneksiK = new mysqli('localhost', 'root', '', 'siti_xipplg2') or die(mysqli_error($koneksiK));

if (isset($_POST['simpan'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $koneksiK->query("INSERT INTO kunjungan (idKunjungan, idPasien, idDokter, tanggal, keluhan) VALUES ('$idKunjungan', '$idPasien', '$idDokter', '$tanggal', '$keluhan')");
    header('location:kunjungan.php');
    exit();
}

if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];
    $koneksiK->query("DELETE FROM kunjungan WHERE idKunjungan = '$idKunjungan'");
    header('location:kunjungan.php');
    exit();
}

if (isset($_POST['edit'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $koneksiK->query("UPDATE kunjungan SET idPasien='$idPasien', idDokter='$idDokter', tanggal='$tanggal', keluhan='$keluhan' WHERE idKunjungan='$idKunjungan'");
    header('location:kunjungan.php');
    exit();
}
?>
