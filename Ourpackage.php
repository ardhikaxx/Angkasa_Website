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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, .1), 0 2px 4px -2px rgba(0, 0, 0, .1);
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
            padding: 12px 20px;
            margin-top: 1rem;
            border-radius: 1rem;
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
            z-index: 1;
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
            background-image: linear-gradient(to right, #2996f0, #165487);
            color: #fff;
            border-radius: 10px;
            padding: 45px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s;
        }

        .popup-content:hover {
            border: 2px solid #fff;
            transform: translate(-50%, -50%) scale(1.05);
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
            color: #ffffff;
            transition: color 0.3s, background-color 0.3s;
            padding: 5px 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .popup-close:hover {
            color: #000000;
            background-color: #ffffff;
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

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            transform: rotate(-45deg);
            z-index: -1;
        }

        .star {
            --star-color: #000;
            --star-tail-length: 6em;
            --star-tail-height: 2px;
            --star-width: calc(var(--star-tail-length) / 6);
            --fall-duration: 9s;
            --tail-fade-duration: var(--fall-duration);
            position: absolute;
            top: var(--top-offset);
            left: 0;
            width: var(--star-tail-length);
            height: var(--star-tail-height);
            color: var(--star-color);
            background: linear-gradient(45deg, currentColor, transparent);
            border-radius: 50%;
            filter: drop-shadow(0 0 6px currentColor);
            transform: translate3d(104em, 0, 0);
            animation: fall var(--fall-duration) var(--fall-delay) linear infinite, tail-fade var(--tail-fade-duration) var(--fall-delay) ease-out infinite;
        }

        @media screen and (max-width: 750px) {
            .star {
                animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
            }
        }

        .star:nth-child(1) {
            --star-tail-length: 6.18em;
            --top-offset: 2.77vh;
            --fall-duration: 9.302s;
            --fall-delay: 8.793s;
        }

        .star:nth-child(2) {
            --star-tail-length: 7.17em;
            --top-offset: 66.06vh;
            --fall-duration: 10.241s;
            --fall-delay: 8.654s;
        }

        .star:nth-child(3) {
            --star-tail-length: 7.09em;
            --top-offset: 94.52vh;
            --fall-duration: 11.141s;
            --fall-delay: 9.094s;
        }

        .star:nth-child(4) {
            --star-tail-length: 6.81em;
            --top-offset: 13.13vh;
            --fall-duration: 11.168s;
            --fall-delay: 9.954s;
        }

        .star:nth-child(5) {
            --star-tail-length: 5.1em;
            --top-offset: 45.71vh;
            --fall-duration: 8.984s;
            --fall-delay: 5.795s;
        }

        .star:nth-child(6) {
            --star-tail-length: 7.03em;
            --top-offset: 2.15vh;
            --fall-duration: 8.328s;
            --fall-delay: 2.035s;
        }

        .star:nth-child(7) {
            --star-tail-length: 5.01em;
            --top-offset: 5.34vh;
            --fall-duration: 8.409s;
            --fall-delay: 1.354s;
        }

        .star:nth-child(8) {
            --star-tail-length: 6.52em;
            --top-offset: 60.89vh;
            --fall-duration: 8.17s;
            --fall-delay: 9.254s;
        }

        .star:nth-child(9) {
            --star-tail-length: 6.75em;
            --top-offset: 30.55vh;
            --fall-duration: 11.755s;
            --fall-delay: 5.274s;
        }

        .star:nth-child(10) {
            --star-tail-length: 6.65em;
            --top-offset: 11.37vh;
            --fall-duration: 8.407s;
            --fall-delay: 7.224s;
        }

        .star:nth-child(11) {
            --star-tail-length: 7.22em;
            --top-offset: 39.4vh;
            --fall-duration: 7.04s;
            --fall-delay: 8.536s;
        }

        .star:nth-child(12) {
            --star-tail-length: 7.19em;
            --top-offset: 0vh;
            --fall-duration: 11.238s;
            --fall-delay: 2.007s;
        }

        .star:nth-child(13) {
            --star-tail-length: 6.03em;
            --top-offset: 24.37vh;
            --fall-duration: 8.192s;
            --fall-delay: 0.104s;
        }

        .star:nth-child(14) {
            --star-tail-length: 5.25em;
            --top-offset: 69.2vh;
            --fall-duration: 11.047s;
            --fall-delay: 5.353s;
        }

        .star:nth-child(15) {
            --star-tail-length: 6.62em;
            --top-offset: 16.38vh;
            --fall-duration: 7.422s;
            --fall-delay: 6.189s;
        }

        .star:nth-child(16) {
            --star-tail-length: 6.36em;
            --top-offset: 46.63vh;
            --fall-duration: 10.244s;
            --fall-delay: 9.483s;
        }

        .star:nth-child(17) {
            --star-tail-length: 7.02em;
            --top-offset: 89.97vh;
            --fall-duration: 6.241s;
            --fall-delay: 4.777s;
        }

        .star:nth-child(18) {
            --star-tail-length: 5.04em;
            --top-offset: 70.79vh;
            --fall-duration: 11.501s;
            --fall-delay: 3.856s;
        }

        .star:nth-child(19) {
            --star-tail-length: 5.36em;
            --top-offset: 42.3vh;
            --fall-duration: 9.13s;
            --fall-delay: 5.746s;
        }

        .star:nth-child(20) {
            --star-tail-length: 5.75em;
            --top-offset: 24.85vh;
            --fall-duration: 10.716s;
            --fall-delay: 4.004s;
        }

        .star:nth-child(21) {
            --star-tail-length: 6.08em;
            --top-offset: 47.9vh;
            --fall-duration: 9.323s;
            --fall-delay: 3.768s;
        }

        .star:nth-child(22) {
            --star-tail-length: 5.23em;
            --top-offset: 18.79vh;
            --fall-duration: 7.428s;
            --fall-delay: 6.106s;
        }

        .star:nth-child(23) {
            --star-tail-length: 6.78em;
            --top-offset: 87.94vh;
            --fall-duration: 11.716s;
            --fall-delay: 7.94s;
        }

        .star:nth-child(24) {
            --star-tail-length: 7.41em;
            --top-offset: 23.63vh;
            --fall-duration: 9.369s;
            --fall-delay: 2.997s;
        }

        .star:nth-child(25) {
            --star-tail-length: 5.33em;
            --top-offset: 4.91vh;
            --fall-duration: 7.586s;
            --fall-delay: 3.846s;
        }

        .star:nth-child(26) {
            --star-tail-length: 6.62em;
            --top-offset: 56.35vh;
            --fall-duration: 10.753s;
            --fall-delay: 8.772s;
        }

        .star:nth-child(27) {
            --star-tail-length: 5.64em;
            --top-offset: 98.45vh;
            --fall-duration: 8.921s;
            --fall-delay: 4.529s;
        }

        .star:nth-child(28) {
            --star-tail-length: 6.14em;
            --top-offset: 7.53vh;
            --fall-duration: 6.098s;
            --fall-delay: 9.762s;
        }

        .star:nth-child(29) {
            --star-tail-length: 6.68em;
            --top-offset: 68.67vh;
            --fall-duration: 6.106s;
            --fall-delay: 0.075s;
        }

        .star:nth-child(30) {
            --star-tail-length: 5.66em;
            --top-offset: 80.81vh;
            --fall-duration: 11.828s;
            --fall-delay: 5.747s;
        }

        .star:nth-child(31) {
            --star-tail-length: 5.37em;
            --top-offset: 20.71vh;
            --fall-duration: 7.127s;
            --fall-delay: 8.575s;
        }

        .star:nth-child(32) {
            --star-tail-length: 6.63em;
            --top-offset: 29.95vh;
            --fall-duration: 6.081s;
            --fall-delay: 6.712s;
        }

        .star:nth-child(33) {
            --star-tail-length: 6.16em;
            --top-offset: 11.18vh;
            --fall-duration: 11.6s;
            --fall-delay: 6.256s;
        }

        .star:nth-child(34) {
            --star-tail-length: 7.18em;
            --top-offset: 63.25vh;
            --fall-duration: 9.293s;
            --fall-delay: 6.559s;
        }

        .star:nth-child(35) {
            --star-tail-length: 7.37em;
            --top-offset: 50.14vh;
            --fall-duration: 8.656s;
            --fall-delay: 2.739s;
        }

        .star:nth-child(36) {
            --star-tail-length: 5.31em;
            --top-offset: 84.68vh;
            --fall-duration: 8.981s;
            --fall-delay: 5.089s;
        }

        .star:nth-child(37) {
            --star-tail-length: 6.21em;
            --top-offset: 60.4vh;
            --fall-duration: 11.235s;
            --fall-delay: 2.578s;
        }

        .star:nth-child(38) {
            --star-tail-length: 6.61em;
            --top-offset: 76.81vh;
            --fall-duration: 10.623s;
            --fall-delay: 3.838s;
        }

        .star:nth-child(39) {
            --star-tail-length: 6.81em;
            --top-offset: 10.89vh;
            --fall-duration: 6.439s;
            --fall-delay: 9.852s;
        }

        .star:nth-child(40) {
            --star-tail-length: 6.45em;
            --top-offset: 76.09vh;
            --fall-duration: 11.118s;
            --fall-delay: 9.122s;
        }

        .star:nth-child(41) {
            --star-tail-length: 5.68em;
            --top-offset: 64.01vh;
            --fall-duration: 9.496s;
            --fall-delay: 5.52s;
        }

        .star:nth-child(42) {
            --star-tail-length: 6.13em;
            --top-offset: 39.07vh;
            --fall-duration: 6.992s;
            --fall-delay: 6.959s;
        }

        .star:nth-child(43) {
            --star-tail-length: 5.12em;
            --top-offset: 54.43vh;
            --fall-duration: 8.621s;
            --fall-delay: 2.537s;
        }

        .star:nth-child(44) {
            --star-tail-length: 6.8em;
            --top-offset: 65.23vh;
            --fall-duration: 9.942s;
            --fall-delay: 5.664s;
        }

        .star:nth-child(45) {
            --star-tail-length: 6.17em;
            --top-offset: 78.89vh;
            --fall-duration: 11.613s;
            --fall-delay: 8.372s;
        }

        .star:nth-child(46) {
            --star-tail-length: 5.36em;
            --top-offset: 47.3vh;
            --fall-duration: 7.498s;
            --fall-delay: 6.505s;
        }

        .star:nth-child(47) {
            --star-tail-length: 7.45em;
            --top-offset: 98.2vh;
            --fall-duration: 10.452s;
            --fall-delay: 6.225s;
        }

        .star:nth-child(48) {
            --star-tail-length: 5.04em;
            --top-offset: 67.95vh;
            --fall-duration: 11.582s;
            --fall-delay: 0.193s;
        }

        .star:nth-child(49) {
            --star-tail-length: 7.34em;
            --top-offset: 8.31vh;
            --fall-duration: 6.859s;
            --fall-delay: 9.71s;
        }

        .star:nth-child(50) {
            --star-tail-length: 7.04em;
            --top-offset: 88.31vh;
            --fall-duration: 6.067s;
            --fall-delay: 4.694s;
        }

        .star::before,
        .star::after {
            position: absolute;
            content: "";
            top: 0;
            left: calc(var(--star-width) / -2);
            width: var(--star-width);
            height: 100%;
            background: linear-gradient(45deg, transparent, currentColor, transparent);
            border-radius: inherit;
            animation: blink 2s linear infinite;
        }

        .star::before {
            transform: rotate(45deg);
        }

        .star::after {
            transform: rotate(-45deg);
        }

        @keyframes fall {
            to {
                transform: translate3d(-100em, 0, 0);
            }
        }

        @keyframes tail-fade {

            0%,
            50% {
                width: var(--star-tail-length);
                opacity: 1;
            }

            70%,
            80% {
                width: 0;
                opacity: 0.4;
            }

            100% {
                width: 0;
                opacity: 0;
            }
        }

        @keyframes blink {
            50% {
                opacity: 0.6;
            }
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

        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="dashboard.php"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="dashboard.php">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="daerahjember.php">Daerah Jember</a>
                    <a href="diluarjember.php">Diluar Jember</a>
                    <a href="sponsor.php">Sponsor</a>
                </div>
            </li>
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
            <p>Choose the Package You Want</p>
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
                <button class="btn-detail" id="self-photobox">Detail</button>
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
                <button class="btn-detail" id="self-photo">Detail</button>
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
                <button class="btn-detail" id="manual-photobooth">Detail</button>
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

    <div class="pack-layout">
        <div class="title-layout">
            <h1>Photo Layout Option</h1>
            <p>Choose the Layout You Want</p>
        </div>
    </div>

    <div class="price-list">
        <div class="title-price">
            <h1>Price List</h1>
            <p>Explore Our Photobooth Packages</p>
        </div>
    </div>

    <div class="content-layout">
        <div class="price-container">
            <div class="row">
                <div class="column">
                    <div class="product">
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
                    <div class="product">
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
                    <div class="product">
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
                    <div class="product">
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
        <!-- <div class="price-container">
            <div class="column">
                <div class="product">
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
                <div class="product">
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
            <div class="column">
                <div class="product">
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
                <div class="product">
                    <h2>Note</h2>
                    <div class="options">
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
        </div> -->
    </div>

    <div class="stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
    </div>


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