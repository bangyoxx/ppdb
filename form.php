<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

require 'database.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran | PPDB Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="menusamping">
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="form.php">Formulir Pendaftaran</a></li>
            <li><a href="data.php">Data Pendaftaran</a></li>
            <li><a href="logout.php" onclick="return confirm('Yakin Ingin Keluar?');">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Formulir Pendaftaran</h1>
        <form action="proses/proses_form.php" method="post">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" required><br>
            <label for="asal_sekolah">Asal Sekolah (SMP):</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan asal sekolah anda sebelumnya" required><br>
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir anda" required><br>
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>
            <label for="jk">Jenis Kelamin:</label>
            <select id="jk" name="jk" required>
            <option value="" selected disabled>Pilih opsi:</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select><br>
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat anda secara lengkap" required></textarea><br>
            <label for="nomor_telepon">Nomor Telepon:</label>
            <input type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{10,15}" placeholder="081234567890" required><br>
            <label for="agama">Agama:</label>
            <input type="text" id="agama" name="agama" placeholder="Mohon masukkan agama yang resmi di Indonesia!" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@email.com" required><br>
            <label for="program_studi">Program Studi Pilihan:</label>
            <input type="text" id="program_studi" name="program_studi" placeholder="Mohon masukkan program studi yang sesuai!" required><br>
            <button type="submit">Daftar Sekarang!</button>
        </form>
    </div>
</body>
</html>