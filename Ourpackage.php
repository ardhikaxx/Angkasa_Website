<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <title>Angkasa | OurPackage Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background: #EBECF0;
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
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #EBECF0 0.5;
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

        .navbar-menu #Our-Package {
            color: #fff;
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

        .active-link {
            color: #fff;
            background-color: #000;
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: 0.3;
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
            flex-wrap: wrap;
            gap: 50px;
            max-width: 700px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .card {
            width: calc(330px - 10px);
            flex-direction: column;
            border-radius: 15px;
            background-color: black;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, .1), 0 2px 4px -2px rgba(0, 0, 0, .1);
            margin-top: 10px;
        }

        .header {
            position: relative;
            margin: 1rem;
            margin-top: -1.5rem;
            height: 10rem;
            overflow: hidden;
            border-radius: 15px;
            background-color: #667EA0;
            background-image: linear-gradient(to right, #3490dc, #2779bd);
            color: white;
            margin-bottom: -40px;
        }

        .header img {
            width: 350px;
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
            padding: 10px 15px;
            margin-top: 1rem;
            border-radius: 15px;
            background-color: #fff;
            font-family: "Poppins", sans-serif;
            font-size: 1rem;
            font-weight: 700;
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

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 999;
            transition: opacity 0.3s ease;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            position: fixed;
            font-family: "Poppins", sans-serif;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            color: #000;
            border-radius: 10px;
            padding: 45px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        }

        .popup-content {
            transition: border 0.1s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1.2px solid #ccc;
        }

        .popup-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .popup-close {
            cursor: pointer;
            font-size: 1.5rem;
            line-height: 1;
            color: #000;
            transition: color 0.3s, background-color 0.3s;
            padding: 5px 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .popup-close:hover {
            color: #fff;
            background-color: #000;
        }

        .popup-content p {
            font-size: 1.2rem;
            line-height: 1.4;
            margin-top: 10px;
            margin-bottom: -10px;
            text-align: justify;
        }

        .popup-close:focus {
            outline: none;
        }

        .popup.show {
            display: flex;
            opacity: 1;
        }

        .popup.show .popup-content {
            transform: translate(-50%, -50%) scale(1);
        }

        .price-list {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .title-price p {
            margin-top: 5px;
            font-family: "Poppins", sans-serif;
        }

        .title-price h1 {
            margin-bottom: 5px;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
        }

        .content-layout {
            width: 900px;
            margin: 0 auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .layout-2R {
            text-align: center;
        }

        .layout-photo-2R img {
            width: 700px;
            border-radius: 15px;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .layout-4R {
            margin-top: 50px;
            text-align: center;
        }

        .layout-photo-4R img {
            width: 700px;
            border-radius: 15px;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .price-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .column {
            flex: calc(50% - 20px);
            margin-right: 5px;
        }

        .product {
            background-color: #000;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            color: #333;
            margin-bottom: 20px;
            margin-left: 15px;
            margin-right: 15px;
        }

        .product h2 {
            font-size: 21px;
            margin-bottom: 10px;
            text-align: start;
            color: #fff;

        }

        .options {
            text-align: left;
        }

        .option {
            margin-bottom: 20px;
        }

        .product h3 {
            font-size: 17px;
            color: #ccc;
            margin-top: 20px;
            margin-bottom: -15px;
        }

        .option ul {
            list-style: none;
            padding: 0;
        }

        .option li {
            font-size: 15px;
            margin: 5px 0;
            color: #999;
            border-bottom: 1px solid #ccc;
            padding-top: 10px;
            padding-bottom: 15px;
        }

        .option li strong {
            margin-right: 207px;
            margin-left: 10px;
        }

        .options-note li {
            font-size: 13px;
            color: #ccc;
            margin-left: -25px;
            text-align: start;
        }

        .content-package {
            width: 100%;
            height: 100vh;
            margin-top: -10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #000;
            font-family: "Poppins", sans-serif;
        }

        .content-package h1 {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 10px;
        }

        .content-package p {
            text-align: center;
            margin-top: 10px;
            font-size: 20px;
            font-weight: 700;
        }

        .scroll-btn {
            position: absolute;
            bottom: 100px;
            top: 70%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 200px;
            height: 50px;
            gap: 5px;
            text-decoration: none;
            color: #fff;
            background: #000;
            border-radius: 30px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.25);
            cursor: pointer;
        }

        .scroll-btn i {
            font-size: 25px;
        }

        .scroll-btn p {
            margin: 0;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="dashboard.php"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="dashboard.php" id="Home">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" id="Pemesanan" class="dropbtn">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="daerahjember.php">Daerah Jember</a>
                    <a href="diluarjember.php">Diluar Jember</a>
                    <a href="sponsor.php">Sponsor</a>
                </div>
            </li>
            <li><a href="ourpackage.php" id="Our-Package" class="active-link">Our Package</a></li>
            <li><a href="gallery.php" id="Gallery" >Gallery</a></li>
            <li><a href="tentang.php" id="Tentang-Kami" >Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div class="content-package" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <h1>Pilih Paketmu Sesuai Dengan Keinginanmu</h1>
        <p>Klik Scroll Down Untuk Melihat Lebih Lanjut</p>
        <div class="scroll-icon-box">
            <a href="#Package" class="scroll-btn">
                <i class="uil uil-mouse-alt"></i>
                <p>Scroll Down</p>
            </a>
        </div>
    </div>

    <div class="pack" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700" id="Package">
        <div class="pack-title">
            <h1>Choose a Package</h1>
            <p>Choose the Package You Want</p>
        </div>
    </div>


    <div class="pack-card">
        <div class="card" data-aos="fade-right" data-aos-easing="ease" data-aos-duration="600">
            <div class="header">
                <img src="assets/Gallery/Self Photobox.jpg" alt="">
            </div>
            <div class="content">
                <h5 class="title">Self Photobox</h5>
                <p class="description">
                    Take a booth with automatic
                    touchscreen screen
                    (Only Landscape)
                </p>
                <button class="btn-detail" id="self-photobox">Detail</button>
            </div>
        </div>
        <div class="card" data-aos="fade-left" data-aos-easing="ease" data-aos-duration="600">
            <div class="header">
                <img src="assets/Gallery/Self Photo.jpg" alt="">
            </div>
            <div class="content">
                <h5 class="title">Self Photo</h5>
                <p class="description">
                    Self Photo with Remote
                    Shuter
                    (Landscape & Portrait)
                </p>
                <button class="btn-detail" id="self-photo">Detail</button>
            </div>
        </div>
        <div class="card" data-aos="fade-right" data-aos-easing="ease" data-aos-duration="600">
            <div class="header">
                <img src="assets/Gallery/Manual Photobooth.jpg" alt="">
            </div>
            <div class="content">
                <h5 class="title">Manual Photobooth</h5>
                <p class="description">
                    Take a photo manual with
                    photographer
                    (Landscape & portrait)
                </p>
                <button class="btn-detail" id="manual-photobooth">Detail</button>
            </div>
        </div>
        <div class="card" data-aos="fade-left" data-aos-easing="ease" data-aos-duration="600">
            <div class="header">
                <img src="assets/Gallery/360 Videobooth.jpg" alt="">
            </div>
            <div class="content">
                <h5 class="title">360 Videobooth</h5>
                <p class="description">
                    Take a Video with
                    our equipment
                    (Only portrait)
                </p>
                <button class="btn-detail" id="360-videobooth">Detail</button>
            </div>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <div class="popup-header">
                <h1 id="popup-title">Detail Title</h1>
                <span class="popup-close" id="popup-close">&times;</span>
            </div>
            <p id="popup-description">Detail Description</p>
        </div>
    </div>

    <div class="pack-layout" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <div class="title-layout">
            <h1>Photo Layout Option</h1>
            <p>Choose the Layout You Want</p>
        </div>
    </div>

    <div class="content-layout" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <div class="layout-2R">
            <h1>Strip 2R (5 cm x 15 cm)</h1>
            <div class="layout-photo-2R">
                <img src="assets/Gallery/Layout2R.png" alt="">
            </div>
        </div>
        <div class="layout-4R">
            <h1>Photo 4R (10cm x 15 cm)</h1>
            <div class="layout-photo-4R">
                <img src="assets/Gallery/Layout4R.png" alt="">
            </div>
        </div>
    </div>

    <div class="price-list" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <div class="title-price">
            <h1>Price List</h1>
            <p>Explore Our Photobooth Packages</p>
        </div>
    </div>

    <div class="content-layout" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <div class="price-container">
            <div class="row">
                <div class="column">
                    <div class="product" data-aos="fade-right" data-aos-easing="ease" data-aos-duration="1000">
                        <h2>PaperFrame 4R</h2>
                        <div class="options">
                            <div class="option">
                                <h3>Quota</h3>
                                <ul>
                                    <li><strong>100 Pcs</strong> Rp 750.000</li>
                                    <li><strong>150 Pcs</strong> Rp 1.000.000</li>
                                    <li><strong>200 Pcs</strong> Rp 1.250.000</li>
                                    <li><strong>300 Pcs</strong> Rp 1.700.000</li>
                                </ul>
                            </div>
                            <div class="option">
                                <h3>Unlimited</h3>
                                <ul>
                                    <li><strong>2 Hour</strong> Rp 1.200.000</li>
                                    <li><strong>3 Hour</strong> Rp 1.500.000</li>
                                    <li><strong>4 Hour</strong> Rp 1.800.000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="product" data-aos="fade-left" data-aos-easing="ease" data-aos-duration="1100">
                        <h2>PaperFrame strip 2R</h2>
                        <div class="options">
                            <div class="option">
                                <h3>Quota</h3>
                                <ul>
                                    <li><strong>200 Pcs</strong> Rp 750.000</li>
                                    <li><strong>300 Pcs</strong> Rp 1.000.000</li>
                                    <li><strong>400 Pcs</strong> Rp 1.250.000</li>
                                    <li><strong>600 Pcs</strong> Rp 1.700.000</li>
                                </ul>
                            </div>
                            <div class="option">
                                <h3>Unlimited</h3>
                                <ul>
                                    <li><strong>2 Hour</strong> Rp 1.000.000</li>
                                    <li><strong>3 Hour</strong> Rp 1.300.000</li>
                                    <li><strong>4 Hour</strong> Rp 1.600.000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="product" data-aos="fade-right" data-aos-easing="ease" data-aos-duration="1200">
                        <h2>360 Videobooth</h2>
                        <div class="options">
                            <div class="option">
                                <h3>Unlimited</h3>
                                <ul>
                                    <li><strong>2 Hour</strong> Rp 1.500.000</li>
                                    <li><strong>3 Hour</strong> Rp 2.000.000</li>
                                    <li><strong>4 Hour</strong> Rp 2.300.000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="product" data-aos="fade-left" data-aos-easing="ease" data-aos-duration="1300">
                        <h2>Note</h2>
                        <div class="options-note">
                            <ul>
                                <li>Extra paper per 50 lembar 4R = Rp 400.000,-</li>
                                <li>Extra unlimited paper dan video, per 1 jam = Rp 500.000,-</li>
                                <li>Free Simple Fabric gliter / Background Photo</li>
                                <li>High Speed Printer 15 Detik / Photo</li>
                                <li>Include 2 Crew</li>
                                <li>4 Hours Per quota Package</li>
                                <li>Softcopy Flashdisk + Online Google Drive</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        const popup = document.getElementById("popup");
        const popupTitle = document.getElementById("popup-title");
        const popupDescription = document.getElementById("popup-description");
        const popupClose = document.getElementById("popup-close");

        const buttons = document.querySelectorAll(".btn-detail");

        buttons.forEach((button, index) => {
            button.addEventListener("click", () => {
                const cardID = button.getAttribute("id");

                let title, description;

                if (cardID === "self-photobox") {
                    title = "Self Photobox";
                    description = "Self Photobox adalah fasilitas fotografi interaktif yang modern dan unik. Dengan booth otomatis dan layar sentuh, pengguna dapat memilih latar belakang, filter, dan cetak foto. Self Photobox juga bisa berbagi foto ke media sosial dengan pencahayaan bagus. Self Photobox bisa disesuaikan untuk berbagai acara, cocok untuk mengabadikan momen spesial atau menambahkan hiburan interaktif.";
                } else if (cardID === "self-photo") {
                    title = "Self Photo";
                    description = "Self Photo adalah fasilitas fotografi mandiri yang praktis dan inovatif. Dengan remote shutter, Self Photo bisa digunakan dalam landscape atau portrait, memberikan fleksibilitas dalam foto. Self Photo memungkinkan pengguna untuk menciptakan kenangan sesuai dengan estetika mereka. Self Photo adalah solusi efektif untuk foto pribadi berkualitas tanpa bantuan orang lain, sehingga memudahkan pengguna untuk menjelajahi kreativitas fotografi.";
                } else if (cardID === "manual-photobooth") {
                    title = "Manual Photobooth";
                    description = "Manual Photobooth adalah fasilitas fotografi yang memberikan pengalaman berbeda dengan fotografer profesional. Dengan bantuan fotografer, pengguna dapat mengambil foto berkualitas tinggi dengan sentuhan pribadi. Manual Photobooth memungkinkan pengguna untuk berkolaborasi dengan fotografer untuk hasil sesuai estetika mereka. Manual Photobooth adalah pilihan sempurna untuk acara yang membutuhkan profesional. Manual Photobooth memberikan kemungkinan untuk menciptakan kenangan istimewa.";
                } else if (cardID === "360-videobooth") {
                    title = "360 Videobooth";
                    description = "360 Videobooth adalah fasilitas unik yang membuat video 360 derajat yang menarik dan berbeda. Dengan orientasi portrait, fasilitas ini menggunakan peralatan canggih untuk merekam momen berharga dalam video. Pengguna dapat eksplorasi interaktif dengan video 360 derajat yang mengesankan. Dengan 360 Videobooth, pengguna dapat memberikan pengalaman visual yang menakjubkan dan inovatif dalam acara khusus, pesta, dan lainnya, membagikan momen berkesan dalam video yang memikat.";
                }

                popupTitle.textContent = title;
                popupDescription.textContent = description;

                popup.style.display = "block";
                setTimeout(() => {
                    popup.style.opacity = 1;
                }, 10);
            });
        });

        popupClose.addEventListener("click", () => {
            popup.style.opacity = 0;
            setTimeout(() => {
                popup.style.display = "none";
            }, 500);
        });
    </script>
</body>

</html>