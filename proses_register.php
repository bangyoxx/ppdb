<?php
require '../database.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";

if (mysqli_query($kon, $sql)) {
    header('Location: ../login.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($kon);
}

mysqli_close($kon);
?>