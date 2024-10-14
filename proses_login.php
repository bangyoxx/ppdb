<?php
session_start();

require '../database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($kon, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../beranda.php');
        exit();
    } else {
        $error = "Password salah";
    }
} else {
    $error = "Username tidak ditemukan";
}

mysqli_close($kon);

if (isset($error)) {
    header("Location: ../login.html?error=" . urlencode($error));
    exit();
}
?>