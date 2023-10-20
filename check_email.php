<?php
require('koneksi.php');

$koneksi = new koneksi();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $query = "SELECT * FROM user WHERE email = :email";
    $stmt = $koneksi->getKoneksi()->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $namaLengkap = $row['nama_lengkap'];
        echo '<script>window.location.href = "editpass.php?successMessage=Selamat, ' . $namaLengkap . ', Anda berhasil diverifikasi!";</script>';
    } else {
        echo '<script>window.location.href = "lupapass.php?successMessage=Username tidak valid. Silakan coba lagi atau daftar jika Anda belum memiliki akun.";</script>';
    }    
} else {
    echo "Metode permintaan tidak valid.";
}
?>