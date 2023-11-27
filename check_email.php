<?php
require('koneksi.php');
session_start();

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
        $_SESSION['email'] = $email;
        echo '<script>window.location.href = "editpass.php?successMessage=Selamat, ' . $namaLengkap . ', Anda Berhasil diverifikasi!";</script>';
    } else {
        echo '<script>window.location.href = "lupapass.php?successMessage=Email Yang Anda Masukkan Tidak Valid";</script>';
    }
} else {
    echo "Metode Permintaan Tidak Valid.";
}
?>