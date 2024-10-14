<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
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
    <title>Beranda | PPDB Online</title>
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
        <h2>Selamat Datang di Halaman Beranda PPDB Online, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Konten utama Anda di sini.</p>
        <br>
        <br>
        <br>
        <p>Bantuan:</p>
        <p>Klik Formulir Pendaftaran untuk Mendaftar.</p>
        <p>Klik Data Pendaftaran untuk Melihat Detail Pendaftaran Anda.</p>
        <p>Klik Logout untuk Keluar.</p>
    </div>
</body>

</html>