<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.html');
    exit();
}

require '../database.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];

if (!isset($_SESSION['user_id'])) {
    die("Maaf permintaan gagal, User ID tidak ditemukan di data kami.");
}

$user_id = $_SESSION['user_id'];
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

$sql = "INSERT INTO form (user_id, nama_lengkap, asal_sekolah, tempat_lahir, tanggal_lahir, jk, alamat, nomor_telepon, agama, email, program_studi) VALUES ('$user_id', '$nama_lengkap', '$asal_sekolah', '$tempat_lahir', '$tanggal_lahir', '$jk', '$alamat', '$nomor_telepon', '$agama', '$email', '$program_studi')";

$result = mysqli_query($kon, $sql);

if ($result) {
    header('Location: ../data.php');
    exit();
} else {
    echo "Error: " . mysqli_error($kon);
}

mysqli_close($kon);
?>