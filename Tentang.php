<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <title>Angkasa | Tentang Kami Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        #circularcursor {
            background-color: #000;
            border: 1px solid black;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            position: absolute;
            z-index: 1;
            transition: left 0.1s, top 0.1s;
            transform: translate(-30%, -15%);
            pointer-events: none;
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

        .navbar-menu #Tentang-Kami {
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

        .content {
            max-width: 800px;
            margin: 20px auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 100px;
        }

        .about-section {
            padding: 2rem;
            margin-top: 20px;
        }

        .about-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .about-row {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .about-image {
            flex: 1;
        }

        .about-image img {
            width: auto;
            border-radius: 15px;
            height: 290px
        }

        .about-content {
            flex: 1;
        }

        .about-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: -30px;
        }

        .about-paragraph {
            font-size: 1.125rem;
            margin-top: -20px;
        }

        .latarbelakang-section {
            padding: 0.5rem;
        }

        .latarbelakang-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .latarbelakang-row {
            display: flex;
            justify-content: center;
        }

        .latarbelakang-column {
            flex: 1;
        }

        .latarbelakang-text-muted {
            font-size: 1rem;
            color: #888;
        }

        .latarbelakang-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
        }

        .latarbelakang-paragraph {
            font-size: 1.125rem;
            margin-top: -10px;
            padding: 25px;
            text-align: center;
            text-align: justify;
        }

        .tujuan-section {
            padding: 25px;
        }

        .tujuan-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .tujuan-row {
            display: flex;
            justify-content: center;
        }

        .latarbelakang-column {
            flex: 1;
        }

        .tujuan-text-muted {
            font-size: 1rem;
            color: #888;
        }

        .tujuan-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
        }

        .tujuan-paragraph {
            font-size: 1.125rem;
            text-align: left;
            list-style: none;
        }

        .tujuan-paragraph::before {
            content: "⭐";
            font-weight: bold;
            margin-right: 5px;
        }

        .feedback-section {
            padding: 25px;
        }

        .feedback-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .feedback-row {
            display: flex;
            justify-content: center;
        }

        .feedback-column {
            flex: 1;
        }

        .feedback-text-muted {
            font-size: 1rem;
            color: #888;
        }

        .feedback-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
        }

        .feedback-paragraph {
            font-size: 1.125rem;
            text-align: left;
            margin-left: 35px;
            align-items: center;
            list-style: none;
        }

        .feedback-paragraph::before {
            content: "⭐";
            font-weight: bold;
            margin-right: 5px;
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
            <li><a href="ourpackage.php" id="Our-Package">Our Package</a></li>
            <li><a href="gallery.php" id="Gallery">Gallery</a></li>
            <li><a href="tentang.php" id="Tentang-Kami" class="active-link">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div id="circularcursor"></div>

    <div class="content">
        <section class="about-section">
            <div class="about-container">
                <div class="about-row">
                    <div class="about-column about-image" data-aos="fade-right" data-aos-easing="ease" data-aos-duration="700">
                        <img src="assets/Gallery/fotoTentang.jpg" alt="Square Image">
                    </div>
                    <div class="about-column about-content" data-aos="fade-left" data-aos-easing="ease" data-aos-duration="700">
                        <h2 class="about-title">Tentang Kami</h2>
                        <p class="about-paragraph">Angkasa Photobooth, penyempurna setiap acara! Hadirkan keceriaan dan tangkap momen-momen spesial dengan foto-foto kreatif kami. Desain elegan, teknologi mutakhir, dan pengalaman yang tak terlupakan. Booking sekarang dan buat acaramu berbeda!✨</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="latarbelakang-section">
            <div class="latarbelakang-container">
                <div class="latarbelakang-row">
                    <div class="latarbelakang-column">
                        <div class="text-center"  data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
                            <h2 class="latarbelakang-title">Latar Belakang</h2>
                            <p class="latarbelakang-paragraph">
                                Photobooth adalah hiburan yang menyenangkan dalam event. Ini membantu menciptakan
                                suasana santai saat berada di acara bersama teman dan keluarga. Acara seperti ini jarang
                                terjadi, jadi photobooth memberikan kenangan berharga saat berfoto dengan latar yang
                                menarik. Hotel juga menjadi tempat yang berkesan untuk mengadakan acara, di mana
                                kenangan berfoto di sana akan dikenang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tujuan-section">
            <div class="tujuan-container">
                <div class="tujuan-row">
                    <div class="tujuan-column">
                        <div class="text-center" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
                            <h2 class="tujuan-title">Sasaran dan Tujuan</h2>
                            <li class="tujuan-paragraph">
                                Untuk mengenalkan dan membuat acara lebih menarik
                            </li>
                            <li class="tujuan-paragraph">
                                Sweet 17, Wedding, Gathering sangat sesuai untuk merayakan momen bersama.
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feedback-section">
            <div class="feedback-container">
                <div class="feedback-row">
                    <div class="feedback-column">
                        <div class="text-center"  data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
                            <h2 class="feedback-title">Feedback</h2>
                            <li class="feedback-paragraph"">
                                Fee 8%
                            </li>
                            <li class="feedback-paragraph">
                                Dapat Video sebuah acara serta promosi
                            </li>
                            <li class="feedback-paragraph">
                                Free photo Staff Hotel
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('mousemove', function (e) {
                $('#circularcursor').css({
                    left: e.pageX,
                    top: e.pageY
                });
            })
        });
    </script>
</body>

</html>