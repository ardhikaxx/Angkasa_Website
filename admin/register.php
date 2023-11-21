<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /Angkasa_Website/login.php");
    exit;
}
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $fullname = $_POST['txt_nama'];
    $email = $_POST['txt_email'];
    $nohp = $_POST['txt_phone'];
    $jeniskelamin = $_POST['txt_gender'];
    $pass = $_POST['txt_pass'];
    $jabatan=$_POST['id_jabatan'];

    $queryNamaLengkap = "SELECT * FROM user WHERE nama_lengkap = '$fullname'";
    $resultNamaLengkap = mysqli_query($koneksi, $queryNamaLengkap);
    $queryEmail = "SELECT * FROM user WHERE email = '$email'";
    $resultEmail = mysqli_query($koneksi, $queryEmail);
    $queryNoHP = "SELECT * FROM user WHERE no_hp = '$nohp'";
    $resultNoHP = mysqli_query($koneksi, $queryNoHP);
    if (empty(trim($fullname)) || empty(trim($email)) || empty(trim($nohp)) || empty(trim($jeniskelamin)) || empty(trim($pass))) {
        $error = ("Silahkan input semua informasi yang diperlukan");
    } elseif (mysqli_num_rows($resultNamaLengkap) > 0) {
        $error = ("Nama lengkap sudah terdaftar.");
    } elseif (mysqli_num_rows($resultEmail) > 0) {
        $error = ("Alamat email sudah terdaftar.");
    } elseif (mysqli_num_rows($resultNoHP) > 0) {
        $error = ("Nomor telepon sudah terdaftar.");
    } else {
        $query = "INSERT INTO user VALUES ('', '$fullname', '$email', '$nohp', '$jeniskelamin', '$pass','$jabatan')";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            header("Location: dashboard-admin.php?successMessage=Registrasi akun baru telah berhasil.");
        } else {
            $error = ("Registrasi gagal. Silahkan coba lagi nanti.");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Angkasa | Register Admin Page</title>
    <title>Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap">
    <link rel="icon" type="image/png" href="/Angkasa_Website/assets/Logo Web.png">
    <style>
        body {
            background-color: #EBECF0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 30px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }

        .navbar {
            position: fixed;
            top: 1rem;
            left: 1rem;
            background: #000000;
            border-radius: 10px;
            padding: 1rem 0;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
            height: calc(100vh - 4rem);
            z-index: 1;
            font-family: "Poppins", sans-serif;
        }

        .navbar img {
            height: 4rem;
            width: 4.5rem;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 5px;
        }

        .navbar__link {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3.5rem;
            width: 5.5rem;
            color: #ffffff;
            transition: 250ms ease all;
            text-decoration: none;
        }

        .navbar__link span {
            position: absolute;
            left: 100%;
            transform: translate(-3rem);
            margin-left: 1rem;
            opacity: 0;
            pointer-events: none;
            color: #ffffff;
            background: #000000;
            padding: 0.75rem;
            transition: 250ms ease all;
            border-radius: 17.5px;
        }

        .navbar__link:hover {
            color: #000000;
        }

        .navbar:not(:hover) .navbar__link:focus span,
        .navbar__link:hover span {
            opacity: 1;
            transform: translate(0);
        }

        .navbar__menu {
            position: relative;
            margin-top: 140px;
        }

        .navbar__item:last-child:before {
            content: "";
            position: absolute;
            opacity: 0;
            z-index: -1;
            top: 0;
            left: 1rem;
            width: 3.5rem;
            height: 3.5rem;
            background: #ffffff;
            border-radius: 17.5px;
            transition: 250ms cubic-bezier(1, 0.2, 0.1, 1.2) all;
        }

        .navbar__item:first-child:nth-last-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(1)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(1):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(1)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(1):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(1)~li:last-child:hover:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(2)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(2):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(2)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(2):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(2)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(2):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(2)~li:last-child:hover:before {
            top: 50%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(3):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(3)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(3):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:nth-child(2):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(3)~li:last-child:hover:before {
            top: 66.6666666667%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(4):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(4)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(2):hover~li:last-child:before {
            top: 25%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(3):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(4)~li:last-child:hover:before {
            top: 75%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(5):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(5)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(2):hover~li:last-child:before {
            top: 20%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(3):hover~li:last-child:before {
            top: 40%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(4):hover~li:last-child:before {
            top: 60%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(5)~li:last-child:hover:before {
            top: 80%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(6):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(6)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(2):hover~li:last-child:before {
            top: 16.6666666667%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(3):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(4):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(5):hover~li:last-child:before {
            top: 66.6666666667%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(6)~li:last-child:hover:before {
            top: 83.3333333333%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(7):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(7)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(2):hover~li:last-child:before {
            top: 14.2857142857%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(3):hover~li:last-child:before {
            top: 28.5714285714%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(4):hover~li:last-child:before {
            top: 42.8571428571%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(5):hover~li:last-child:before {
            top: 57.1428571429%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(6):hover~li:last-child:before {
            top: 71.4285714286%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(7)~li:last-child:hover:before {
            top: 85.7142857143%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(8):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(8)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(2):hover~li:last-child:before {
            top: 12.5%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(3):hover~li:last-child:before {
            top: 25%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(4):hover~li:last-child:before {
            top: 37.5%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(5):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(6):hover~li:last-child:before {
            top: 62.5%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(7):hover~li:last-child:before {
            top: 75%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(8)~li:last-child:hover:before {
            top: 87.5%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(9):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(9)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(2):hover~li:last-child:before {
            top: 11.1111111111%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(3):hover~li:last-child:before {
            top: 22.2222222222%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(4):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(5):hover~li:last-child:before {
            top: 44.4444444444%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(6):hover~li:last-child:before {
            top: 55.5555555556%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(7):hover~li:last-child:before {
            top: 66.6666666667%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(8):hover~li:last-child:before {
            top: 77.7777777778%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(9)~li:last-child:hover:before {
            top: 88.8888888889%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(10):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(10)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(2):hover~li:last-child:before {
            top: 10%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(3):hover~li:last-child:before {
            top: 20%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(4):hover~li:last-child:before {
            top: 30%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(5):hover~li:last-child:before {
            top: 40%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(6):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(7):hover~li:last-child:before {
            top: 60%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(8):hover~li:last-child:before {
            top: 70%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(9):hover~li:last-child:before {
            top: 80%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(10)~li:last-child:hover:before {
            top: 90%;
            animation: gooeyEffect-10 250ms 1;
        }

        @keyframes gooeyEffect-10 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(11):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(11)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(2):hover~li:last-child:before {
            top: 9.0909090909%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(3):hover~li:last-child:before {
            top: 18.1818181818%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(4):hover~li:last-child:before {
            top: 27.2727272727%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(5):hover~li:last-child:before {
            top: 36.3636363636%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(6):hover~li:last-child:before {
            top: 45.4545454545%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(7):hover~li:last-child:before {
            top: 54.5454545455%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(8):hover~li:last-child:before {
            top: 63.6363636364%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(9):hover~li:last-child:before {
            top: 72.7272727273%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(10):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(10):hover~li:last-child:before {
            top: 81.8181818182%;
            animation: gooeyEffect-10 250ms 1;
        }

        @keyframes gooeyEffect-10 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(11)~li:last-child:hover:before {
            top: 90.9090909091%;
            animation: gooeyEffect-11 250ms 1;
        }

        @keyframes gooeyEffect-11 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .register-box {
            text-align: center;
            width: 350px;
            height: 460px;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            padding: 15px;
            padding-top: 23px;
            padding-bottom: 23px;
            border-radius: 15px;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            transition: box-shadow 0.3s ease;
        }

        .register-box:hover {
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
        }

        .register-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 16px;
            font-family: "Montserrat", sans-serif;
            letter-spacing: -0.2px;
            font-size: 16px;
            text-shadow: 1px 1px 1px #FFF;
        }

        .segment {
            text-align: center;
            max-width: 200px;
            margin: 0 auto;
            padding: 5px 0;
        }

        .segment h1 {
            font-size: 35px;
            margin-bottom: 5px;
            font-weight: 800;
            margin-top: -30px;
        }


        button,
        input {
            border: 0;
            outline: 0;
            font-size: 16px;
            border-radius: 320px;
            padding: 15px;
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
        }

        label {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        input {
            margin-right: 8px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
        }

        .password {
            margin-right: 10.7px;
        }

        #showPassword {
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 2;
            margin-left: -40px;
        }

        .btn-register {
            margin-top: -8px;
            color: #61677C;
            font-weight: bold;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-register:hover {
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .btn-register:active {
            box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
        }

        .btn-register {
            display: block;
            width: 100%;
            color: #000000;
        }

        .notification {
            display: none;
            position: fixed;
            top: 10%;
            left: 53%;
            transform: translate(50%, -50%) scale(0.2);
            background-color: #000;
            color: #fff;
            font-family: "Poppins", sans-serif;
            text-align: center;
            padding: 15px 20px;
            border-radius: 50px;
            opacity: 0;
            z-index: 999;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            animation: notificationFadeIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes notificationFadeIn {
            0% {
                transform: translate(50%, -50%) scale(0.2);
                opacity: 0;
            }

            100% {
                transform: translate(50%, -50%) scale(1);
                opacity: 1;
            }
        }

        @keyframes notificationFadeOut {
            0% {
                transform: translate(50%, -50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(50%, -50%) scale(0.2);
                opacity: 0;
            }
        }

        .modal {
            background-color: #EBECF0;
            font-family: "Poppins", sans-serif;
            color: #000;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            z-index: 1000;
            text-align: center;
            padding: 20px;
            width: 400px;
        }

        .btn-confirm,
        .btn-cancel {
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            margin-left: 10px;
            color: white;
            transition: all 0.4s ease;
            text-rendering: optimizeLegibility;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        }

        .btn-confirm {
            background: #00C82E;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
        }

        .btn-cancel {
            background: #E4071C;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
        }

        .btn-confirm:hover {
            transform: scale(1.1);
        }

        .btn-cancel:hover {
            transform: scale(1.1);
        }

        .modal-overlay {
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            display: none;
        }

        .notification-password {
            color: red;
            font-size: 12px;
            animation: fadeOut 5s ease-in-out;
            text-align: center;
            margin-right: -25px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .gender-select {
            width: 100%;
            padding: 15px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            outline: none;
            border-radius: 50px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            transition: border-color 0.3s;
            text-align: left;
            color: #61677C;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: transparent;
        }

        .select-wrapper {
            position: relative;
        }

        .select-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #000;
        }

        .jabatan-select {
            width: 100%;
            padding: 15px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            outline: none;
            border-radius: 50px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            transition: border-color 0.3s;
            text-align: left;
            color: #61677C;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: transparent;
        }

        .select-wrapper {
            position: relative;
        }

        .select-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #000;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <img src="assets/Logo Angkasa Photobooth.png" alt="Logo">
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="dashboard-admin.php" class="navbar__link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="navbar__item">
                <a href="register.php" class="navbar__link"><i data-feather="users"></i><span>Register</span></a>
            </li>
            <li class="navbar__item">
                <a href="Laporan_sponsor.php" class="navbar__link"><i data-feather="pocket"></i><span>Sponsor</span></a>
            </li>
            <li class="navbar__item">
                <a href="laporan.php" class="navbar__link"><i data-feather="folder"></i><span>Laporan</span></a>
            </li>
            <li class="navbar__item">
                <a href="settings.php" class="navbar__link" id="settings"><i data-feather="settings"></i><span>Pengaturan</span></a>
            </li>
            <li class="navbar__item">
                <a href="Paket_layout.php" class="navbar__link" id="settings"><i data-feather="plus"></i><span>Paket Layout</span></a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link" id="logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </ul>
    </nav>

    <div id="overlay" class="modal-overlay"></div>

    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <p>Anda akan logout. Apakah Anda yakin?</p>
            <button id="confirmLogout" class="btn-confirm">Iya</button>
            <button id="cancelLogout" class="btn-cancel">Tidak</button>
        </div>
    </div>

    <div id="notification" class="notification">
        <span id="notification-content"></span>
    </div>

    <div class="register-box">
        <form action="register.php" method="POST" class="register-container" onsubmit="return validateForm();">
            <div class="segment">
                <h1>Register</h1>
            </div>
            <label class="nama-lengkap">
                <input type="text" placeholder="Masukkan Nama Lengkap" name="txt_nama" autocomplete="off">
            </label>
            <label class="email">
                <input type="email" placeholder="Masukkan email" name="txt_email" autocomplete="off">
            </label>
            <label class="nomer-telp">
                <input type="text" placeholder="Masukan Nomor telepon" name="txt_phone" id="phoneInput"
                    autocomplete="off">
            </label>
            <label class="gender">
                <div class="select-wrapper">
                    <select name="txt_gender" id="txt_gender" class="gender-select">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="select-icon">
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </label>
            <label class="jabatan">
                <div class="select-wrapper">
                    <select name="id_jabatan" id="txt_jabatan" class="jabatan-select">
                        <option value="" disabled selected>Jabatan</option>
                        <option >Admin</option>
                        <option >Karyawan</option>
                    </select>
                    <div class="select-icon">
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </label>
            <label class="password">
                <input type="password" id="password" placeholder="Masukkan Password" name="txt_pass"
                    oninput="validatePassword(this)">
                <span id="showPassword" onclick="togglePasswordVisibility('password', 'passwordIcon')">
                    <i id="passwordIcon" class="fas fa-eye"></i>
                </span>
                <p id="passwordLengthError" class="notification-password"></p>
            </label>
            <button class="btn-register" type="submit" name="register" value="Register">Register</button>
        </form>
    </div>

    <script src='https://unpkg.com/feather-icons'></script>
    <script>feather.replace()</script>
    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const showPasswordIcon = document.getElementById(iconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.remove("fa-eye");
                showPasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("fa-eye-slash");
                showPasswordIcon.classList.add("fa-eye");
            }
        }
    </script>

    <script>
        function showNotification(message) {
            var notification = document.getElementById('notification');
            var notificationContent = document.getElementById('notification-content');

            notificationContent.innerHTML = message;
            notification.style.display = 'block';

            setTimeout(function () {
                closeNotification();
            }, 3000);
        }

        function closeNotification() {
            var notification = document.getElementById('notification');
            notification.style.animation = 'notificationFadeOut 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards';

            setTimeout(function () {
                notification.style.display = 'none';
                notification.style.animation = '';

                document.getElementsByName('txt_nama')[0].value = '';
                document.getElementsByName('txt_email')[0].value = '';
                document.getElementsByName('txt_phone')[0].value = '';
                document.getElementById('txt_gender').value = '';
                document.getElementsByName('txt_pass')[0].value = '';
            }, 500);
        }

        function validateForm() {
            var fullname = document.getElementsByName('txt_nama')[0].value;
            var email = document.getElementsByName('txt_email')[0].value;
            var nohp = document.getElementsByName('txt_phone')[0].value;
            var jeniskelamin = document.getElementById('txt_gender').value;
            var pass = document.getElementsByName('txt_pass')[0].value;

            if (fullname === '' || email === '' || nohp === '' || jeniskelamin === '' || pass === '') {
                showNotification("Silahkan input semua informasi yang diperlukan");
                return false;
            }
            return true;
        }

        <?php
        if (!empty($error)) {
            echo 'showNotification' . $error;
        }
        ?>
    </script>

    <script>
        const logoutLink = document.getElementById('logout');
        const logoutModal = document.getElementById('logoutModal');
        const confirmLogoutBtn = document.getElementById('confirmLogout');
        const cancelLogoutBtn = document.getElementById('cancelLogout');
        const overlay = document.getElementById('overlay');

        logoutLink.addEventListener('click', function (e) {
            e.preventDefault();
            logoutModal.style.display = 'block';
            overlay.style.display = 'block';
        });

        cancelLogoutBtn.addEventListener('click', function () {
            logoutModal.style.display = 'none';
            overlay.style.display = 'none';
        });

        confirmLogoutBtn.addEventListener('click', function () {
            window.location.href = '/Angkasa_Website/logout.php';
        });
    </script>

    <script>
        const phoneInput = document.getElementById('phoneInput');

        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

    <script>
        function validatePassword(input) {
            input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
        }
    </script>

    <script>
        const passwordInput = document.getElementById('password');
        const passwordLengthError = document.getElementById('passwordLengthError');

        passwordInput.addEventListener('input', function () {
            const password = this.value;
            if (password.length < 6) {
                const missingChars = 6 - password.length;
                passwordLengthError.textContent = `*Panjang password terdiri dari 6-8 karakter. Kurang ${missingChars} karakter.`;
                passwordLengthError.style.display = 'block';
            } else if (password.length > 8) {
                passwordLengthError.textContent = `*Password terlalu panjang. Maksimal 8 karakter.`;
                passwordLengthError.style.display = 'block';
                this.value = password.slice(0, 8);
            } else {
                passwordLengthError.textContent = '';
                passwordLengthError.style.display = 'none';
            }
        });
    </script>
</body>

</html>