<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa | OurPackage Page</title>
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

        .container_mouse {
            position: fixed;
            justify-content: bottom;
            align-items: bottom;
            z-index: 99;
            bottom: 25px;
            right: 30px;
        }

        .mouse-btn {
            margin: 10px auto;
            width: 20px;
            height: 40px;
            border: 3px solid #000;
            border-radius: 20px;
            display: flex;
        }

        .mouse-scroll {
            display: block;
            width: 10px;
            height: 10px;
            background: #000;
            border-radius: 50%;
            margin: auto;
            animation: scrolling13 1s linear infinite;
        }

        .title-mouse {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
        }

        @keyframes scrolling13 {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(20px);
            }
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

        .pack-layout {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .title-layout p {
            margin-top: 5px;
            font-family: "Poppins", sans-serif;
        }

        .title-layout h1 {
            margin-bottom: 5px;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
        }

        .pack-card {
            display: grid;
            place-items: center;
            place-content: center;
            grid-template-columns: repeat(2, 1fr);
            width: 100%;
            height: auto;
            background-color: transparent;
            gap: 5px;
            justify-content: center;
            align-items: center;
            max-width: 700px;
            margin: 0px 250px 50px;
        }

        .card {
            width: 20rem;
            max-width: 80%;
            display: flex;
            flex-direction: column;
            border-radius: 1rem;
            background-color: black;
            margin-top: 85px;
            margin-left: 75px;
        }

        .header {
            position: relative;
            margin: 1rem;
            margin-top: -1.5rem;
            height: 10rem;
            overflow: hidden;
            border-radius: 1rem;
            background-color: #667EA0;
            background-image: linear-gradient(to right, #3490dc, #2779bd);
            color: white;
            margin-bottom: -40px;
        }

        .content {
            padding: 1.5rem;
            margin-top: 0px;
        }

        .content p.description {
            margin-top: -25px;
        }

        .title {
            font-family: sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.4;
            color: #fff;
        }

        .description {
            font-family: sans-serif;
            font-size: 1rem;
            font-weight: 300;
            line-height: 1.5;
            color: #fff;
        }

        .btn-detail {
            padding: 0.75rem 1.5rem;
            margin-top: 1rem;
            border-radius: 50px;
            background-color: #fff;
            font-family: "Poppins", sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: #000;
            border: 2px solid black;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            outline: none;
            cursor: pointer;
        }

        .btn-detail:hover {
            background-color: #000;
            color: #fff;
            border-color: white;
            transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease;
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

    <div class="container_mouse">
        <span class="mouse-btn">
            <span class="mouse-scroll"></span>
        </span>
        <span class="title-mouse">Scroll Down</span>
    </div>
    <div class="pack">
        <div class="pack-title">
            <h1>Choose a Package</h1>
            <p>ingpokan penjual terang bulan terdekat</p>
        </div>
    </div>

    <div class="pack-card">
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Self Photobox</h5>
                <p class="description">
                    Take a booth with automatic
                    touchscreen screen
                    (Only Landscape)
                </p>
                <button class="btn-detail">Detail</button>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Self Photo</h5>
                <p class="description">
                    Self Photo with Remote
                    Shuter
                    (Landscape & Portrait)
                </p>
                <button class="btn-detail">Detail</button>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Manual Photobooth</h5>
                <p class="description">
                    Take a photo manual with
                    photographer
                    (Landscape & portrait)
                </p>
                <button class="btn-detail">Detail</button>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">360 Videobooth</h5>
                <p class="description">
                    Take a Video with
                    our equipment
                    (Only portrait)
                </p>
                <button class="btn-detail">Detail</button>
            </div>
        </div>
    </div>

    <div class="pack-layout">
        <div class="title-layout">
            <h1>Photo Layout Option</h1>
            <p>ingpokan penjual terang bulan terdekat</p>
        </div>
    </div>

    <div class="container-layout">
        <div class="layout-2R"></div>
        <div class="layout-4R"></div>
    </div>
</body>

</html>