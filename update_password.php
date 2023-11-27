<?php
require('koneksi.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $email = $_POST['email'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword === $confirmPassword) {
            $hashedPassword = $_POST['new_password'];

            $db = new koneksi();
            $conn = $db->getKoneksi();

            $query = "UPDATE user SET password = :password WHERE email = :email";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":email", $email);

            if ($stmt->execute()) {
                echo '<script>window.location.href = "Login.php?successMessage=Password+baru+telah+berhasil+disimpan!";</script>';
            } else {
                echo '<script>window.location.href = "lupapass.php?failedMessage=Gagal+mengupdate+password!";</script>';
            }
        } else {
            echo '<script>window.location.href = "lupapass.php?failedMessage=Password+baru+dan+konfirmasi+password+tidak+cocok!";</script>';
        }
    } else {
        echo '<script>alert("Data POST tidak lengkap.");</script>';
    }
}

session_destroy();
?>