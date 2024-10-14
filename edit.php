<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

require 'database.php';

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

$id = $_GET['id'];

if ($role != 'admin') {
    $sql = mysqli_query($kon, "SELECT * FROM form WHERE id = '$id' AND user_id = '$user_id'");
} else {
    $sql = mysqli_query($kon, "SELECT * FROM form WHERE id = '$id'");
}

if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
} else {
    header('Location: data.php');
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftar | PPDB Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="menusamping">
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="form.php">Formulir Pendaftaran</a></li>
            <li><a href="data.php">Data Pendaftaran</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
    <h1>Edit Data Pendaftar</h1>
    <p> Nomor Pendaftar: <?php echo $id; ?></p>
    <br>
    <form action="proses/proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required><br>
        <label for="asal_sekolah">Asal Sekolah (SMP):</label>
        <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?php echo $row['asal_sekolah']; ?>" required><br>
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required><br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required><br>
        <label for="jk">Jenis Kelamin:</label>
        <select id="jk" name="jk" required>
            <option value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($row['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select><br>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea><br>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" pattern="[0-9]{10,15}" value="<?php echo $row['nomor_telepon']; ?>" required><br>
        <label for="agama">Agama:</label>
        <input type="text" id="agama" name="agama" value="<?php echo $row['agama']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="program_studi">Program Studi Pilihan:</label>
        <input type="text" id="program_studi" name="program_studi" value="<?php echo $row['program_studi']; ?>" required><br>
        <?php if ($role == 'admin') { ?>
        <label for="status">Status Pendaftaran:</label>
        <select id="status" name="status">
            <option value="Diterima" <?php if ($row['status'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
            <option value="Ditolak" <?php if ($row['status'] == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
            <option value="Cadangan" <?php if ($row['status'] == 'Cadangan') echo 'selected'; ?>>Cadangan</option>
        </select><br>
        <?php } else { ?>
                <input type="hidden" name="status" value="<?php echo $row['status']; ?>">
            <?php } ?>
        <button type="submit">Simpan Perubahan</button>
    </form>
    </div>
</body>

</html>