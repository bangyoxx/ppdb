<?php
$kon = mysqli_connect("localhost", "root", "", "sekolah");

if (!$kon) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>