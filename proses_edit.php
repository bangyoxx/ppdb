<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.html');
    exit();
}

require '../database.php';

$id = $_POST['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$asal_sekolah = $_POST['asal_sekolah'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$nomor_telepon = $_POST['nomor_telepon'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$program_studi = $_POST['program_studi'];
$status = $_POST['status'];

$sql = "UPDATE form SET nama_lengkap = '$nama_lengkap', asal_sekolah = '$asal_sekolah', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jk = '$jk', alamat = '$alamat', nomor_telepon = '$nomor_telepon', agama = '$agama', email = '$email', program_studi = '$program_studi', status = '$status' WHERE id = '$id'";

if (mysqli_query($kon, $sql)) {
    header('Location: ../data.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($kon);
}

mysqli_close($kon);
?>