<?php
require('koneksi.php');

$koneksi = new koneksi();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    $query = "SELECT * FROM user WHERE username = :username";
    $stmt = $koneksi->getKoneksi()->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<script>window.location.href = "editpass.php?successMessage=Selamat, Anda berhasil diverifikasi!";</script>';
    } else {
        echo '<script>window.location.href = "lupapass.php?successMessage=Username tidak valid. Silakan coba lagi atau daftar jika Anda belum memiliki akun.";</script>';
    }    
} else {
    echo "Metode permintaan tidak valid.";
}
?>