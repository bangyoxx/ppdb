<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}

require 'database.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data | PPDB Online</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    @media print {
        .menusamping, button, .aksi {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    }
</style>
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
        <?php if ($role == 'admin'): ?>
            <h2>Data Semua Pendaftar</h2>
            <button onclick="window.print()">Cetak Data</button>
            <br>
            <br>
            <?php
            $sql = mysqli_query($kon, "SELECT * FROM form");
            if (mysqli_num_rows($sql) > 0) {
                echo "<table border='1'>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Asal Sekolah</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Agama</th>
                        <th>Email</th>
                        <th>Program Studi</th>
                        <th>Status</th>
                        <th class='aksi'>Aksi</th>
                    </tr>";
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>
                        <td>{$row['nama_lengkap']}</td>
                        <td>{$row['asal_sekolah']}</td>
                        <td>{$row['tempat_lahir']}</td>
                        <td>{$row['tanggal_lahir']}</td>
                        <td>{$row['jk']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['nomor_telepon']}</td>
                        <td>{$row['agama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['program_studi']}</td>
                        <td>{$row['status']}</td>
                        <td class='aksi'><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='proses/delete.php?id={$row['id']}'onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a></td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data pendaftar.";
            }
            ?>
        <?php else: ?>
            <h2>Data Pendaftaran Saya</h2>
            <button onclick="window.print()">Cetak Data</button>
            <br>
            <br>
            <?php
            $result = mysqli_query($kon, "SELECT * FROM form WHERE user_id = '$user_id'");
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
            <tr>
                <th>Nama Lengkap</th>
                <th>Asal Sekolah</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Agama</th>
                <th>Email</th>
                <th>Program Studi</th>
                <th>Status</th>
                <th class='aksi'>Aksi</th>
            </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['asal_sekolah']}</td>
                <td>{$row['tempat_lahir']}</td>
                <td>{$row['tanggal_lahir']}</td>
                <td>{$row['jk']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['nomor_telepon']}</td>
                <td>{$row['agama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['program_studi']}</td>
                <td>{$row['status']}</td>
                <td class='aksi'><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='proses/delete.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a></td>
            </tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data pendaftaran Anda.";
            }
            ?>
        <?php endif; ?>
    </div>
</body>

</html>