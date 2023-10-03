<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurPackage</title>
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
            backdrop-filter: blur(10px);
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

        .navbar-menu li a {
            color: #000;
            text-decoration: none;
        }

        .navbar-menu li a:hover {
            text-decoration: underline;
        }

        .admin-link {
            color: #000;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            font-weight: bolder;
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
            margin-top: 100px;
            margin-left: 100px;
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
        .content p.description{
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

        .card-price {
            padding: 0.75rem 1.5rem;
            margin-top: 1rem;
            border-radius: 0.5rem;
            background-color: #816124;
            font-family: sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="#"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="Pemesanan.php">Pemesanan</a></li>
            <li><a href="Ourpackage.php">Our Package</a></li>
            <li><a href="Gallery.php">Gallery</a></li>
            <li><a href="Tentang.php">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>
    <div class="pack">
        <div class="pack-title">
            <h1>Our Package</h1>
            <p>ingpokan penjual terang bulan terdekat</p>
        </div>
    </div>
    <div class="pack-card">
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Gedang Goreng</h5>
                <p class="description">
                    Pisang goreng adalah makanan yang terbuat dari pisang matang yang dicelupkan ke dalam adonan tepung berbumbu, lalu digoreng hingga berwarna kecokelatan dan renyah. Ini adalah camilan populer di Indonesia dan Asia Tenggara.
                </p>
                <p class="card-price">RP.5000</p>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Gedang Goreng</h5>
                <p class="description">
                    Pisang goreng adalah makanan yang terbuat dari pisang matang yang dicelupkan ke dalam adonan tepung berbumbu, lalu digoreng hingga berwarna kecokelatan dan renyah. Ini adalah camilan populer di Indonesia dan Asia Tenggara.
                </p>
                <p class="card-price">RP.5000</p>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Gedang Goreng</h5>
                <p class="description">
                    Pisang goreng adalah makanan yang terbuat dari pisang matang yang dicelupkan ke dalam adonan tepung berbumbu, lalu digoreng hingga berwarna kecokelatan dan renyah. Ini adalah camilan populer di Indonesia dan Asia Tenggara.
                </p>
                <p class="card-price">RP.5000</p>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <h5 class="title">Gedang Goreng</h5>
                <p class="description">
                    Pisang goreng adalah makanan yang terbuat dari pisang matang yang dicelupkan ke dalam adonan tepung berbumbu, lalu digoreng hingga berwarna kecokelatan dan renyah. Ini adalah camilan populer di Indonesia dan Asia Tenggara.
                </p>
                <p class="card-price">RP.5000</p>
            </div>
        </div>
    </div>
</body>

</html>