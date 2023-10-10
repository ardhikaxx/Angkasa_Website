<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa | Tentang Kami Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
        }

        .navbar-logo img {
            max-height: 65px;
        }

        .navbar-menu {
            list-style: none;
            font-family: "Poppins", sans-serif;
            display: flex;
            gap: 20px;
            margin: 0;
            font-weight: bold;
        }

        .navbar-menu li {
            margin: 0;
        }

        .navbar-menu li a {
            color: #000;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
        }

        .navbar-menu li a:hover {
            color: #fff;
            background-color: #000;
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .admin-link {
            color: #000;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
            font-weight: 700;
        }

        .admin-link:hover {
            color: #fff;
            background-color: #000;
            transform: scale(1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .dropbtn {
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .pack {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .pack-title p {
            margin-top: 5px;
            font-family: "Poppins", sans-serif;
        }

        .pack-title h1 {
            margin-bottom: 5px;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .content h2 {
            font-size: 24px;
        }

        .content p {
            font-size: 16px;
        }

        .content ul {
            list-style-type: disc;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="#"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="dashboard.php">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="daerahjember.php">Daerah Jember</a>
                    <a href="diluarjember.php">Diluar Jember</a>
                </div>
            </li>
            <li><a href="sponsor.php">Sponsor</a></li>
            <li><a href="ourpackage.php">Our Package</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="tentang.php">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div class="pack">
        <div class="pack-title">
            <h1>Tentang Kami</h1>
            <p>ingpokan penjual terang bulan terdekat</p>
        </div>
    </div>

    <div class="content">
        <div class="intro">
            <h2>Latar Belakang</h2>
            <p>Photobooth merupakan salah satu entertainment dalam sebuah event. Dimana Photobooth dapat mencairkan
                suasana dikala mereka senggang. Event dihadiri bersama teman, kerabat, saudara, dll. dimana mereka
                dipertemukan dalam sebuah acara yang belum tau acara itu kapan diadakan lagi, photobooth dapat
                memberikan sebuah kenangan bagi mereka dalam acara mereka. berfoto bersama orang terdekat dengan
                background yang menarik itu menjadi daya minat mereka. Hotel juga suatu wadah bagi mereka untuk bisa
                terselenggaranya sebuah acara. dimana mereka juga bakal mengenang lokasi tempat photo mereka berada
                dahulu.</p>
        </div>
        <div class="mission">
            <h2>Sasaran dan Tujuan</h2>
            <ul>
                <li>Untuk mengenalkan dan membuat acara lebih menarik</li>
                <li>Sweet 17, Wedding, Gathering sangat cocok bagi mereka untuk mengabadikan moment bersama</li>
            </ul>
        </div>
        <div class="feedback">
            <h2>Feedback</h2>
            <p class="animated-text">Kami selalu berusaha memberikan layanan terbaik untuk memastikan setiap momen
                berharga Anda menjadi tak terlupakan.</p>
        </div>
    </div>
</body>

</html>