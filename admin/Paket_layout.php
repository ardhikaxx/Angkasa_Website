<?php
$koneksi = mysqli_connect("localhost", "tifbmyho_angkasa", "@JTIpolije2023", "tifbmyho_angkasa");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../Login.php");
    exit;
}
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Angkasa | Paket Layout Page</title>
    <title>Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="../assets/Logo Web.png">
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: #EBECF0;
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
            margin-top: 80px;
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

        .tabel-paket-layout {
            width: 1100px;
            margin: 0 auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            margin-top: 20px;
            margin-left: 120px;
            display: grid;
            place-items: start;
            place-content: start;
            grid-template-columns: repeat(2, 1fr);
            flex-wrap: wrap;
            gap: 5px;
        }

        .tabel-quota {
            background: #1A2226;
            width: 450px;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            margin-left: 15px;
            max-height: 400px;
            overflow-y: auto;
        }

        .tabel-quota h2 {
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            padding: 10px;
        }

        .tabel-quota table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            color: #fff;
        }

        .tabel-quota th,
        .tabel-quota td {
            border-bottom: 1px solid #ccc;
            padding: 8px;
        }

        .tabel-quota td {
            font-size: 15px;
            text-align: center;
        }

        .tabel-quota th {
            font-size: 18px;
            position: sticky;
            top: 0px;
        }

        .tabel-quota #no-quota {
            background-color: #fff;
            color: #000;
            border-top-left-radius: 10px;
        }

        .tabel-quota #namaquota {
            background-color: #fff;
            color: #000;
        }

        .tabel-quota #hargaquota {
            background-color: #fff;
            color: #000;
        }

        .tabel-quota #actionquota {
            background-color: #fff;
            color: #000;
            border-top-right-radius: 10px;
        }

        .tabel-quota tr {
            background-color: transparent;
        }

        .btn-edit {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 5px 10px;
            margin-right: 10px;
            text-decoration: none;
        }

        .btn-edit i {
            font-size: 15px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border-radius: 10px;
            padding: 5px 10px;
            text-decoration: none;
        }

        .btn-delete i {
            font-size: 15px;
        }

        .tabel-unlimited {
            background: #1A2226;
            width: 450px;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            margin-left: -25px;
            max-height: 400px;
            overflow-y: auto;
        }

        .tabel-unlimited h2 {
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            padding: 10px;
        }

        .tabel-unlimited table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            color: #fff;
        }

        .tabel-unlimited th,
        .tabel-unlimited td {
            border-bottom: 1px solid #ccc;
            padding: 8px;
        }

        .tabel-unlimited td {
            font-size: 15px;
            text-align: center;
        }

        .tabel-unlimited th {
            font-size: 18px;
            position: sticky;
            top: 0px;
        }

        .tabel-unlimited #no-unlimited {
            background-color: #fff;
            color: #000;
            border-top-left-radius: 10px;
        }

        .tabel-unlimited #namaunlimited {
            background-color: #fff;
            color: #000;
        }

        .tabel-unlimited #hargaunlimited {
            background-color: #fff;
            color: #000;
        }

        .tabel-unlimited #actionunlimited {
            background-color: #fff;
            color: #000;
            border-top-right-radius: 10px;
        }

        .tabel-unlimited tr {
            background-color: transparent;
        }

        .tabel-unlimited-360 {
            background: #1A2226;
            width: 450px;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            margin-left: 15px;
            max-height: 400px;
            overflow-y: auto;
        }

        .tabel-unlimited-360 h2 {
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            padding: 10px;
        }

        .tabel-unlimited-360 table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
            color: #fff;
        }

        .tabel-unlimited-360 th,
        .tabel-unlimited-360 td {
            border-bottom: 1px solid #ccc;
            padding: 8px;
        }

        .tabel-unlimited-360 td {
            font-size: 15px;
            text-align: center;
        }

        .tabel-unlimited-360 th {
            font-size: 18px;
            position: sticky;
            top: 0px;
        }

        .tabel-unlimited-360 #no-unlimited {
            background-color: #fff;
            color: #000;
            border-top-left-radius: 10px;
        }

        .tabel-unlimited-360 #namaunlimited {
            background-color: #fff;
            color: #000;
        }

        .tabel-unlimited-360 #hargaunlimited {
            background-color: #fff;
            color: #000;
        }

        .tabel-unlimited-360 #actionunlimited {
            background-color: #fff;
            color: #000;
            border-top-right-radius: 10px;
        }

        .tabel-unlimited-360 tr {
            background-color: transparent;
        }

        .btn-tambah {
            background: #1A2226;
            /* background: linear-gradient(to right, #E7B76F, #9D6E1C); */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px 25px;
            border-radius: 15px;
            cursor: pointer;
            position: fixed;
            justify-content: bottom;
            align-items: bottom;
            z-index: 999;
            bottom: 20px;
            right: 20px;
        }

        .btn-tambah a {
            color: #fff;
            text-decoration: none;
        }

        .btn-tambah i {
            color: #fff;
            text-decoration: none;
            font-size: 26px;
            font-weight: bold;
            text-shadow: #000;
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
            margin-bottom: -5px;
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

        .modal-edit {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.7);
        }

        .edit-content {
            background-color: #EBECF0;
            color: #000;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            font-family: "Poppins", sans-serif;
            border: 0;
            width: 350px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.5s;
        }

        .edit-content button {
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            margin-bottom: -5px;
        }

        .edit-content button#confirmEditYes {
            background-color: #4CAF50;
            color: white;
        }

        .edit-content button#confirmEditYes:hover {
            background-color: #45a049;
        }

        .edit-content button#confirmEditNo {
            background-color: #f44336;
            color: white;
        }

        .edit-content button#confirmEditNo:hover {
            background-color: #da190b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-delete {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content-delete {
            background-color: #EBECF0;
            color: #000;
            position: absolute;
            font-family: "Poppins", sans-serif;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 0;
            width: 350px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .modal-content-delete h2 {
            margin: 0;
        }

        .modal-content-delete p {
            margin: 10px 0;
        }

        .modal-content-delete button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        .modal-content-delete button#confirmDeleteYes {
            background-color: #f44336;
            color: white;
        }

        .modal-content-delete button#confirmDeleteYes:hover {
            background-color: #da190b;
        }

        .modal-content-delete button#confirmDeleteNo {
            background-color: #4CAF50;
            color: white;
        }

        .modal-content-delete button#confirmDeleteNo:hover {
            background-color: #45a049;
        }

        .notification {
            position: fixed;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            top: 20px;
            left: 53%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: #fff;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .notification.show {
            opacity: 1;
        }

        .notification-noChange {
            position: fixed;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            top: 20px;
            left: 53%;
            transform: translateX(-50%);
            background-color: #f44336;
            color: #fff;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .notification-noChange.show {
            opacity: 1;
        }

        #notification-delete {
            position: fixed;
            text-align: center;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            width: 300px;
            top: 20px;
            left: 50%;
            transform: translate(-50%, 10%);
            background-color: #f44336;
            color: #fff;
            padding: 15px 10px;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        #notification-delete.show {
            opacity: 1;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <img src="assets/Logo Angkasa Photobooth.png" alt="Logo">
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="Dashboard-admin.php" class="navbar__link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="navbar__item">
                <a href="register.php" class="navbar__link"><i data-feather="users"></i><span>Register</span></a>
            </li>
            <li class="navbar__item">
                <a href="laporan.php" class="navbar__link"><i data-feather="folder"></i><span>Pemesanan</span></a>
            </li>
            <li class="navbar__item">
                <a href="Laporan_sponsor.php" class="navbar__link"><i data-feather="pocket"></i><span>Sponsor</span></a>
            </li>
            <li class="navbar__item">
                <a href="Laporan_promo.php" class="navbar__link"><i data-feather="percent"></i><span>Promo</span></a>
            </li>
            <li class="navbar__item">
                <a href="settings.php" class="navbar__link" id="settings"><i data-feather="settings"></i><span>Pengaturan</span></a>
            </li>
            <li class="navbar__item">
                <a href="Paket_layout.php" class="navbar__link" id="settings"><i data-feather="plus-circle"></i><span>Paket Layout</span></a>
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

    <div class="btn-tambah">
        <a href="Tambah_PaketLayout.php"><i class="fas fa-plus"></i></a>
    </div>

    <div class="tabel-paket-layout">
        <div class="tabel-quota">
            <h2>Tabel Quota PaperFrame 4R</h2>
            <table>
                <thead>
                    <tr>
                        <th id="no-quota">No</th>
                        <th id="namaquota">Nama Quota</th>
                        <th id="hargaquota">Harga Quota</th>
                        <th id="actionquota">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $query = "SELECT id_quota,nama_quota,harga_quota from quota where id_layout='1'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $idquota = isset($row['id_quota']) ? $row['id_quota'] : '';
                            $namaquota = isset($row['nama_quota']) ? $row['nama_quota'] : '';
                            $hargaquota = isset($row['harga_quota']) ? $row['harga_quota'] : '';
                            ?>

                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namaquota; ?>
                            </td>
                            <td>
                                <?php echo 'Rp. ' . number_format($hargaquota, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <a href="#" class="btn-edit" data-id="<?php echo $idquota; ?>" data-type="quota"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-delete" data-id="<?php echo $idquota; ?>" data-type="quota"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="tabel-unlimited">
            <h2>Tabel Unlimited PaperFrame 4R</h2>
            <table>
                <thead>
                    <tr>
                        <th id="no-unlimited">No</th>
                        <th id="namaunlimited">Nama Unlimited</th>
                        <th id="hargaunlimited">Harga Unlimited</th>
                        <th id="actionunlimited">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $query = "SELECT id_unlimited,nama_unlimited,harga_unlimited from unlimited where id_layout='1'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $idunlimited = isset($row['id_unlimited']) ? $row['id_unlimited'] : '';
                            $namaunlimited = isset($row['nama_unlimited']) ? $row['nama_unlimited'] : '';
                            $hargaunlimited = isset($row['harga_unlimited']) ? $row['harga_unlimited'] : '';
                            ?>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namaunlimited; ?>
                            </td>
                            <td>
                                <?php echo 'Rp. ' . number_format($hargaunlimited, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <a href="#" class="btn-edit" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-delete" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="tabel-quota">
            <h2>Tabel Quota PaperFrame 2R</h2>
            <table>
                <thead>
                    <tr>
                        <th id="no-quota">No</th>
                        <th id="namaquota">Nama Quota</th>
                        <th id="hargaquota">Harga Quota</th>
                        <th id="actionquota">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $query = "SELECT id_quota,nama_quota,harga_quota from quota where id_layout='2'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $idquota = isset($row['id_quota']) ? $row['id_quota'] : '';
                            $namaquota = isset($row['nama_quota']) ? $row['nama_quota'] : '';
                            $hargaquota = isset($row['harga_quota']) ? $row['harga_quota'] : '';
                            ?>

                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namaquota; ?>
                            </td>
                            <td>
                                <?php echo 'Rp. ' . number_format($hargaquota, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <a href="#" class="btn-edit" data-id="<?php echo $idquota; ?>" data-type="quota"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-delete" data-id="<?php echo $idquota; ?>" data-type="quota"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="tabel-unlimited">
            <h2>Tabel Unlimited PaperFrame 2R</h2>
            <table>
                <thead>
                    <tr>
                        <th id="no-unlimited">No</th>
                        <th id="namaunlimited">Nama Unlimited</th>
                        <th id="hargaunlimited">Harga Unlimited</th>
                        <th id="actionunlimited">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $query = "SELECT id_unlimited,nama_unlimited,harga_unlimited from unlimited where id_layout='2'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $idunlimited = isset($row['id_unlimited']) ? $row['id_unlimited'] : '';
                            $namaunlimited = isset($row['nama_unlimited']) ? $row['nama_unlimited'] : '';
                            $hargaunlimited = isset($row['harga_unlimited']) ? $row['harga_unlimited'] : '';
                            ?>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namaunlimited; ?>
                            </td>
                            <td>
                                <?php echo 'Rp. ' . number_format($hargaunlimited, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <a href="#" class="btn-edit" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-delete" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="tabel-unlimited-360">
            <h2>Tabel Unlimited 360 Videobooth</h2>
            <table>
                <thead>
                    <tr>
                        <th id="no-unlimited">No</th>
                        <th id="namaunlimited">Nama Unlimited</th>
                        <th id="hargaunlimited">Harga Unlimited</th>
                        <th id="actionunlimited">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $query = "SELECT id_unlimited,nama_unlimited,harga_unlimited from unlimited where id_layout='3'";
                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $idunlimited = isset($row['id_unlimited']) ? $row['id_unlimited'] : '';
                            $namaunlimited = isset($row['nama_unlimited']) ? $row['nama_unlimited'] : '';
                            $hargaunlimited = isset($row['harga_unlimited']) ? $row['harga_unlimited'] : '';
                            ?>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namaunlimited; ?>
                            </td>
                            <td>
                                <?php echo 'Rp. ' . number_format($hargaunlimited, 0, ',', '.'); ?>
                            </td>
                            <td>
                                <a href="#" class="btn-edit" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-delete" data-id="<?php echo $idunlimited; ?>" data-type="unlimited"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="notification" class="notification"></div>
    <div id="notification-noChange" class="notification-noChange"></div>

    <div id="notification-delete" style="display: none;">
        <p id="deleteMessage"></p>
    </div>

    <div id="myModal" class="modal-edit">
        <div class="edit-content">
            <p>Apakah Anda Yakin Ingin Mengedit Data Ini?</p>
            <button id="confirmEditYes">Ya</button>
            <button id="confirmEditNo">Tidak</button>
            <input type="hidden" id="IdToEdit">
            <input type="hidden" id="TypeToEdit">
        </div>
    </div>

    <div class="modal-delete">
        <div class="modal-content-delete">
            <p>Apakah Anda Yakin Ingin Menghapus Data Ini??</p>
            <button id="confirmDeleteYes">Ya</button>
            <button id="confirmDeleteNo">Tidak</button>
        </div>
    </div>

    <script src='https://unpkg.com/feather-icons'></script>
    <script>feather.replace()</script>

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
            window.location.href = '../logout.php';
        });
    </script>

    <script>
        const editButtons = document.querySelectorAll(".btn-edit");
        const modal = document.getElementById("myModal");
        const confirmEditYes = document.getElementById("confirmEditYes");
        const confirmEditNo = document.getElementById("confirmEditNo");

        editButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                const Id = this.getAttribute("data-id");
                const type = this.getAttribute("data-type");
                document.getElementById("IdToEdit").value = Id;
                document.getElementById("TypeToEdit").value = type;
                modal.style.display = "block";
            });
        });

        confirmEditYes.addEventListener("click", function () {
            const Id = document.getElementById("IdToEdit").value;
            const type = document.getElementById("TypeToEdit").value;

            if (Id && type) {
                if (type === "quota") {
                    window.location.href = "Edit_PaketQuota.php?id=" + Id;
                } else if (type === "unlimited") {
                    window.location.href = "Edit_PaketUnlimited.php?id=" + Id;
                }
            }

            modal.style.display = "none";
        });

        confirmEditNo.addEventListener("click", function () {
            modal.style.display = "none";
        });
    </script>

    <script>
        const deleteButtons = document.querySelectorAll(".btn-delete");
        const modalDelete = document.querySelector(".modal-delete");
        const confirmDeleteYes = document.getElementById("confirmDeleteYes");
        const confirmDeleteNo = document.getElementById("confirmDeleteNo");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                const userId = this.getAttribute("data-id");
                const type = this.getAttribute("data-type");
                showModalDelete(userId, type);
            });
        });

        function showModalDelete(userId, type) {
            modalDelete.style.display = "block";

            confirmDeleteYes.addEventListener("click", function () {
                if (type === "quota") {
                    window.location.href = "Hapus_PaketQuota.php?id=" + userId;
                } else if (type === "unlimited") {
                    window.location.href = "Hapus_PaketUnlimited.php?id=" + userId;
                }
            });

            confirmDeleteNo.addEventListener("click", function () {
                closeModalDelete();
            });
        }

        function closeModalDelete() {
            modalDelete.style.display = "none";
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const successMessage = urlParams.get('successMessage');
            const noChangeMessage = urlParams.get('NoChageMessage');

            if (successMessage) {
                displayNotification(successMessage, 'notification');
            }

            if (noChangeMessage) {
                displayNotification(noChangeMessage, 'notification-noChange');
            }
        });

        function displayNotification(message, elementId) {
            const notification = document.getElementById(elementId);
            notification.innerText = message;
            notification.style.display = 'block';

            setTimeout(function () {
                notification.classList.add('show');
            }, 100);

            setTimeout(function () {
                notification.classList.remove('show');
                setTimeout(function () {
                    notification.style.display = 'none';
                }, 500);
            }, 5000);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const deleteMessage = urlParams.get('deleteMessage');

            if (deleteMessage) {
                const notification = document.getElementById('notification-delete');
                const deleteMessageElement = document.getElementById('deleteMessage');
                deleteMessageElement.innerText = deleteMessage;

                notification.style.display = 'block';

                setTimeout(function () {
                    notification.classList.add('show');
                }, 100);

                setTimeout(function () {
                    notification.classList.remove('show');
                    setTimeout(function () {
                        notification.style.display = 'none';
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>

</html>