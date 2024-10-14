<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.html');
    exit();
}

require '../database.php';

$id = $_GET['id'];
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM form WHERE id = '$id' AND (user_id = '$user_id' OR '$role' = 'admin')";
$result = mysqli_query($kon, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql_delete = "DELETE FROM form WHERE id = '$id'";
    if (mysqli_query($kon, $sql_delete)) {
        header('Location: ../data.php');
    } else {
        echo "Error: " . $sql_delete . "<br>" . mysqli_error($kon);
    }
} else {
    header('Location: ../data.php');
}

mysqli_close($kon);
?>