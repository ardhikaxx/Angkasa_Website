<?php
require('koneksi.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $username = $_POST['username'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword === $confirmPassword) {
            $hashedPassword = $_POST['new_password'];

            $db = new koneksi();
            $conn = $db->getKoneksi();

            $query = "UPDATE user SET password = :password WHERE username = :username";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":username", $username);

            if ($stmt->execute()) {
                echo '<script>window.location.href = "Login.php?successMessage=Password+baru+telah+berhasil+disimpan!";</script>';
            } else {
                echo "Gagal mengupdate password.";
            }
        } else {
            echo "Password baru dan konfirmasi password tidak cocok.";
        }
    } else {
        echo "Data POST tidak lengkap.";
    }
}

session_destroy();
?>