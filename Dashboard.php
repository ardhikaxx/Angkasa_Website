<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa Photobooth</title>
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

        .dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-top: 90px;
        }

        .left-content {
            flex: 1;
            text-align: left;
            padding-left: 50px;
        }

        .dashboard-title {
            font-size: 65px;
            font-family: "Poppins", sans-serif;
            font-weight: 800;
        }

        .dashboard-subtitle {
            font-size: 20px;
            font-family: "Poppins", sans-serif;
        }

        .continue-button {
            background-color: #000;
            color: white;
            font-size: 18px;
            font-family: "Poppins", sans-serif;
            padding: 10px 20px;
            border-radius: 50px;
            margin-top: 20px;
            border: 0;
            outline: 0;
            cursor: pointer;
            text-decoration: none;
        }

        .right-content {
            flex: 1;
            text-align: right;
            margin-top: 20px;
            padding-right: 50px;
        }

        .contohfoto {
            width: 450px;
            height: 300px;
            perspective: 1000px;
            margin-left: 200px;
        }

        .contohfoto-inner {
            width: 450px;
            height: 300px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.999s;
        }

        .contohfoto:hover .contohfoto-inner {
            transform: rotateY(180deg);
        }

        .contohfoto-front,
        .contohfoto-back {
            position: absolute;
            width: 450px;
            height: 300px;
            backface-visibility: hidden;
        }

        .contohfoto-front {
            background-color: #000;
            color: #fff;
            display: flex;
            align-items: center;
            border: 0;
            border-radius: 10px;
            justify-content: center;
            transform: rotateY(0deg);
        }

        .contohfoto-front img {
            width: 450px;
            height: 300px;
            border-radius: 10px;
        }

        .contohfoto-back {
            background-color: #000;
            color: #fff;
            display: flex;
            align-items: center;
            border: 0;
            border-radius: 10px;
            justify-content: center;
            transform: rotateY(180deg);
        }

        .contohfoto-back img {
            width: 450px;
            height: 300px;
            border-radius: 10px;
        }

        .pack {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;
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
            flex-wrap: wrap;
            gap: 50px;
            justify-content: center;
            align-items: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .card {
            padding: 20px;
            box-sizing: border-box;
            width: calc(330px - 10px);
            min-height: 370px;
            margin: 10px;
            border-radius: 20px;
            background: #000;
            transition: 0.4s;
        }

        .card:hover {
            translate: 0 -10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin: 15px 0 0 10px;
        }

        .card-image {
            min-height: 200px;
            background-color: #313131;
            border-radius: 15px;
            background: #313131;
            box-shadow: inset 5px 5px 3px #2f2f2f,
                inset -5px -5px 3px #333333;
        }

        .card-body {
            margin: 13px 0 0 10px;
            color: rgb(184, 184, 184);
            font-size: 15px;
        }

        .btn {
            background-color: #816124;
            font-family: "Poppins", sans-serif;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            display: inline-block;
            font-size: 1rem;
            margin: 15px 0 10px 10px;
        }

        .btn:hover {
            background-color: #816124;
        }

        .gallery {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;
        }

        .gallery-title p {
            margin-top: 5px;
            font-family: "Poppins", sans-serif;
        }

        .gallery-title h1 {
            margin-bottom: 5px;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
        }

        @-webkit-keyframes carousel-animate {
            0% {
                visibility: hidden;
                opacity: 0;
                transform: translateX(200%) scale(0.7);
            }

            3%,
            14.2857142857% {
                visibility: visible;
                opacity: 0.8;
                transform: translateX(100%) scale(0.9);
            }

            17.2857142857%,
            28.5714285714% {
                visibility: visible;
                opacity: 1;
                transform: translateX(0) scale(1);
            }

            31.5714285714%,
            42.8571428571% {
                visibility: visible;
                opacity: 0.8;
                transform: translateX(-100%) scale(0.9);
            }

            45.8571428571% {
                visibility: visible;
                opacity: 0;
                transform: translateX(-200%) scale(0.9);
            }

            100% {
                visibility: hidden;
                opacity: 0;
                transform: translateX(-200%) scale(0.7);
            }
        }

        @keyframes carousel-animate {
            0% {
                visibility: hidden;
                opacity: 0;
                transform: translateX(200%) scale(0.7);
            }

            3%,
            14.2857142857% {
                visibility: visible;
                opacity: 0.8;
                transform: translateX(100%) scale(0.9);
            }

            17.2857142857%,
            28.5714285714% {
                visibility: visible;
                opacity: 1;
                transform: translateX(0) scale(1);
            }

            31.5714285714%,
            42.8571428571% {
                visibility: visible;
                opacity: 0.8;
                transform: translateX(-100%) scale(0.9);
            }

            45.8571428571% {
                visibility: visible;
                opacity: 0;
                transform: translateX(-200%) scale(0.9);
            }

            100% {
                visibility: hidden;
                opacity: 0;
                transform: translateX(-200%) scale(0.7);
            }
        }

        :root {
            --light: 0;
            --light: 0;
            --max-width-post: 420px;
            --primary: hsl(0, 0%, 100%);
            --bg: hsl(0, 0%, calc(0% + 100% * var(--light)));
            --text-primary: hsl(calc(60 * var(--light)),
                    calc(19% * var(--light)),
                    calc(97% - 89% * var(--light)));
            --font-size-sm: clamp(0.7rem, 0.91vw + 0.47rem, 1.2rem);
            --font-size-base: clamp(0.88rem, 1.14vw + 0.59rem, 1.5rem);
            --font-size-md: clamp(1.09rem, 1.42vw + 0.74rem, 1.88rem);
            --font-size-lg: clamp(1.37rem, 1.78vw + 0.92rem, 2.34rem);
            --font-size-xl: clamp(1.71rem, 2.22vw + 1.15rem, 2.93rem);
            --font-size-xxl: clamp(2.14rem, 2.77vw + 1.44rem, 3.66rem);
            --font-size-xxxl: clamp(2.67rem, 3.47vw + 1.8rem, 4.58rem);
        }

        .container-carousel {
            --container-padding-horizontal: 32px;
            position: relative;
            padding-inline: var(--container-padding-horizontal);
            display: grid;
            place-items: center;
            height: 100%;
            width: 100vh;
        }

        .carousel {
            pointer-events: none;
            margin-top: 20px;
            position: absolute;
            -webkit-padding-before: 67px;
            padding-block-start: 67px;
            -webkit-padding-after: max(24px, calc(29px + var(--font-size-md)));
            padding-block-end: max(24px, calc(29px + var(--font-size-md)));
            perspective: 100px;
            width: 100%;
        }

        @media (max-width: 568px) {
            .carousel {
                -webkit-padding-after: 52px;
                padding-block-end: 52px;
            }
        }

        .carousel__wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 61.2vh;
        }

        .carousel .item {
            position: absolute;
            max-width: 418px;
            height: 100%;
            margin-inline: var(--container-padding-horizontal);
            opacity: 0;
            will-change: transform, opacity;
            -webkit-animation: carousel-animate 27s cubic-bezier(0.37, 0, 0.63, 1) infinite;
            animation: carousel-animate 27s cubic-bezier(0.37, 0, 0.63, 1) infinite;
        }

        @media (max-width: 568px) {
            .carousel .item {
                margin-inline: calc(var(--container-padding-horizontal) + 1px);
            }
        }

        .carousel .item:nth-child(1) {
            -webkit-animation-delay: calc(3.8571428571s * -1);
            animation-delay: calc(3.8571428571s * -1);
        }

        .carousel .item:nth-child(2) {
            -webkit-animation-delay: calc(3.8571428571s * 0);
            animation-delay: calc(3.8571428571s * 0);
        }

        .carousel .item:nth-child(3) {
            -webkit-animation-delay: calc(3.8571428571s * 1);
            animation-delay: calc(3.8571428571s * 1);
        }

        .carousel .item:nth-child(4) {
            -webkit-animation-delay: calc(3.8571428571s * 2);
            animation-delay: calc(3.8571428571s * 2);
        }

        .carousel .item:nth-child(5) {
            -webkit-animation-delay: calc(3.8571428571s * 3);
            animation-delay: calc(3.8571428571s * 3);
        }

        .carousel .item:nth-child(6) {
            -webkit-animation-delay: calc(3.8571428571s * 4);
            animation-delay: calc(3.8571428571s * 4);
        }

        .carousel .item:last-child {
            -webkit-animation-delay: calc(-3.8571428571s * 2);
            animation-delay: calc(-3.8571428571s * 2);
        }

        .carousel img {
            max-width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            height: 100%;
        }

        .instagram {
            --pading-horizontal: 16px;
            --border: 2px solid #000;
            max-width: var(--max-width-post);
            width: 100%;
            border: var(--border);
            border-radius: 20px;
        }

        .instagram__header {
            padding-block: 12px;
            border-bottom: var(--border);
        }

        .instagram__header figure {
            padding-block: 0;
            padding-inline: var(--pading-horizontal);
            margin: 0;
            display: flex;
            align-items: center;
        }

        .instagram__header figure img {
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
            border: var(--border);
            -webkit-margin-end: 8px;
            margin-inline-end: 8px;
        }

        .instagram__media {
            display: flex;
            border-bottom: var(--border);
        }

        .instagram__media .img {
            max-width: 100%;
            height: 61.2vh;
        }

        .instagram__buttons {
            padding-block: 12px;
            padding-inline: var(--pading-horizontal);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .instagram__buttons .left {
            display: flex;
            align-items: center;
        }

        .instagram__buttons .left svg:nth-of-type(2) {
            margin-inline: 12px;
        }

        .instagram__icon {
            cursor: pointer;
            width: 1em;
            height: 1em;
            font-size: var(--font-size-md);
            min-width: 24px;
            min-height: 24px;
        }

        .instagram__icon:hover {
            opacity: 0.7;
        }

        .instagram__icon path {
            stroke: #000;
            stroke-linejoin: round;
        }

        .instagram__icon--comment path {
            stroke-width: 2;
        }

        .instagram__icon--message {
            -webkit-margin-before: 3px;
            margin-block-start: 3px;
        }

        .instagram__icon--message path {
            stroke-width: 2;
        }

        .instagram__icon--saved path {
            stroke-width: 2;
        }

        .pack-peta {
            max-width: 1500px;
            flex-direction: column;
            font-family: "Poppins", sans-serif;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;
        }

        .map-info {
            display: flex;
            align-items: center;
            max-width: 750px;
        }

        .map {
            flex: 1;
            padding: 20px;
        }

        .map img {
            max-width: 100%;
        }

        .detail-map {
            flex: 2;
            padding: 20px;
        }

        .detail-map h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .detail-map p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .detail-map ul {
            list-style: none;
            padding: 0;
        }

        .detail-map li {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .detail-map h1 {
            text-align: center;
            font-size: 30px;
        }

        .nama-map {
            text-align: center;
        }

        footer {
            bottom: 0;
            background-color: #000;
            min-width: 300px;
            width: 100%;
            bottom: 0px;
            display: flex;
            align-items: center;
            flex-direction: column;
            font-family: "Poppins", sans-serif;
        }

        .footer-wrapper {
            display: flex;
            background: #000;
            flex-direction: column;
            max-width: 1320px;
            padding: 16px;
        }

        .footer-line {
            display: block;
            width: 100%;
            height: 8px;
        }

        .footer-coloumns {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: start;
            align-items: start;
            flex: 2 0 140px;
            width: 100%;
            gap: 16px;
            padding: 24px 8px 16px 8px;
            margin: 0 auto;
        }

        .footer-coloumns ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer-coloumns ul a {
            color: #fff;
            text-decoration: none;
        }

        .footer-coloumns ul a:hover {
            text-decoration: underline;
        }

        .footer-coloumns ul li {
            margin-bottom: 16px;
        }

        .footer-coloumns h3 {
            color: #fff;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 1.125rem;
        }

        .footer-centering {
            margin: 0 auto;
        }

        .footer-coloumns>section {
            min-width: 150px;
        }

        .footer-logo {
            display: flex;
            flex-direction: row;
            align-items: start;
            justify-content: start;
            gap: 16px;
            margin-bottom: 60px;
        }

        .footer-logo img {
            width: 100px;
            height: 100px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 48px;
            display: flex;
            align-items: center;
            width: 100%;
            gap: 16px;
            padding: 16px 0px;
            flex-wrap: wrap;
            justify-content: space-between;
            color: #FEFEFE;
        }

        .footer-bottom>small {
            font-size: 16px;
            font-weight: bold;
            margin: 0 4px;
        }

        .footer-line {
            display: block;
            min-width: 40px;
            background-color: #FEFEFE;
        }

        .social-links {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .social-text {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .social-links svg {
            width: 20px;
            height: 24px;
            transition: all 0.2s ease-in-out;
        }

        .social-links svg:hover {
            transform: scale(1.1);
        }

        .social-links ul {
            display: flex;
            gap: 12px;
            list-style-type: none;
        }

        @media (max-width: 800px) {
            .footer-bottom {
                display: flex;
                flex-direction: column-reverse;
                align-items: space-between;
                justify-content: center;
                margin: 0 auto;
            }
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

    <div class="dashboard">
        <div class="left-content">
            <h1 class="dashboard-title">Angkasa<br>Photobooth</h1>
            <p class="dashboard-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                luctus nec ullamcorper mattis.</p>
            <a href="Pemesanan.php" class="continue-button">Get Started</a>
        </div>
        <div class="right-content">
            <div class="contohfoto">
                <div class="contohfoto-inner">
                    <div class="contohfoto-front">
                        <img src="assets/Gallery/foto1.jpg" alt="foto depan">
                    </div>
                    <div class="contohfoto-back">
                        <img src="assets/Gallery/foto2.jpg" alt="foto belakang">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pack">
        <div class="pack-title">
            <h1>Our Package</h1>
            <p>ingpokan penjual terang bulan terdekat</p>
        </div>
    </div>
    <div class="pack-card">
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Card title</p>
            <p class="card-body">Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna
                tristique, non lobortis.</p>
            <a href="paket1.html" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Card title</p>
            <p class="card-body">Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna
                tristique, non lobortis.</p>
            <a href="paket1.html" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Card title</p>
            <p class="card-body">Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna
                tristique, non lobortis.</p>
            <a href="paket1.html" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Card title</p>
            <p class="card-body">Nullam ac tristique nulla, at convallis quam. Integer consectetur mi nec magna
                tristique, non lobortis.</p>
            <a href="paket1.html" class="btn">Read More</a>
        </div>
    </div>

    <div class="gallery">
        <div class="gallery-title">
            <h1>Gallery</h1>
            <p>info beli gedang goreng</p>
        </div>
    </div>

    <div class="container-carousel">
        <aside class="carousel">
            <div class="carousel__wrapper">
                <div class="item" id="slide-0"><img src="assets/Gallery/foto1.jpg" alt="" width="418" height="418" />
                </div>
                <div class="item" id="slide-1"><img src="assets/Gallery/foto2.jpg" alt="" width="418" height="418" />
                </div>
                <div class="item" id="slide-2"><img src="assets/Gallery/foto3.jpg" alt="" width="418" height="418" />
                </div>
                <div class="item" id="slide-3"><img src="assets/Gallery/foto4.jpg" alt="" width="418" height="418" />
                </div>
                <div class="item" id="slide-4"><img src="" alt="" width="418" height="418" /></div>
                <div class="item" id="slide-5"><img src="" alt="" width="418" height="418" /></div>
                <div class="item" id="slide-6"><img src="" alt="" width="418" height="418" /></div>
            </div>
        </aside>
        <article class="instagram">
            <header class="instagram__header">
                <figure><img src="assets/Logo Angkasa Photobooth.png" alt="Logo" width="42" height="42" />
                    <figcaption>
                        <h4 class="header-carousel">Angkasa Photobooth</h4>
                    </figcaption>
                </figure>
            </header>
            <section class="instagram__media">
                <div class="img"></div>
            </section>
            <div class="instagram__buttons">
                <div class="left">
                    <svg class="instagram__icon instagram__icon--heart" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M16.8196 3.40477L16.8196 3.40468L16.8105 3.40435C15.9939 3.37401 15.1837 3.55848 14.4607 3.93934C13.7415 4.31818 13.1337 4.87813 12.6974 5.56376C12.3799 6.0141 12.1595 6.38237 12.0011 6.66645C11.841 6.38254 11.6182 6.01451 11.2971 5.5646C10.8588 4.88294 10.252 4.32584 9.53521 3.94728C8.81455 3.56666 8.00746 3.37954 7.19284 3.40423L7.19283 3.40408L7.18038 3.40477C5.73422 3.48471 4.37827 4.133 3.40801 5.20836C2.44041 6.28078 1.93462 7.69124 1.99999 9.13385C2.00344 10.8131 2.73878 12.1587 3.76066 13.3486C4.54375 14.2605 5.52952 15.1172 6.516 15.9745C6.80035 16.2216 7.08476 16.4688 7.36439 16.7173C7.71256 17.0283 8.0484 17.3289 8.36875 17.6156C9.03981 18.2163 9.64287 18.7561 10.1488 19.2024C10.8808 19.8482 11.4505 20.3358 11.7281 20.5156L11.9996 20.6915L12.2713 20.516C12.5291 20.3494 13.0097 19.9415 13.7041 19.3303C14.2257 18.8712 14.8883 18.2789 15.7018 17.5517C15.9935 17.2909 16.3047 17.0128 16.6357 16.7172C16.9253 16.4597 17.2205 16.2037 17.5157 15.9477C18.4876 15.105 19.4601 14.2617 20.2346 13.3628C21.2586 12.1744 21.9965 10.8264 22 9.13385C22.0653 7.69123 21.5596 6.28078 20.592 5.20836C19.6217 4.133 18.2657 3.48471 16.8196 3.40477ZM11.6142 4.35506L11.9954 4.80294L12.3761 4.35467C12.9155 3.71951 13.5913 3.21422 14.3531 2.87644C15.1144 2.53889 15.9419 2.37731 16.7742 2.40369C18.4866 2.47112 20.1027 3.21362 21.2694 4.46897C22.4364 5.72476 23.0588 7.39158 23.0003 9.10494L23 9.11347V9.122C23 12.4787 20.5608 14.6294 18.1924 16.6842C17.8966 16.94 17.598 17.2003 17.3031 17.462L17.3018 17.4632L16.3798 18.2872L16.3736 18.2927L16.3676 18.2985C15.2327 19.3827 14.0415 20.4065 12.7991 21.3656C12.5599 21.5162 12.2829 21.5962 12 21.5962C11.7171 21.5962 11.4402 21.5162 11.201 21.3657C9.9972 20.4352 8.84189 19.4436 7.73965 18.3948L7.73401 18.3894L7.7282 18.3842L6.7012 17.4662L6.70057 17.4657C6.43759 17.2314 6.17305 17.0015 5.91337 16.7758C5.88988 16.7554 5.86643 16.735 5.84303 16.7147C3.34442 14.5424 0.999982 12.4694 0.999982 9.122V9.11347L0.999691 9.10494C0.941196 7.39158 1.56352 5.72476 2.73058 4.46897C3.89709 3.21378 5.51295 2.47131 7.2251 2.40372C8.0557 2.37962 8.88112 2.54227 9.6405 2.87968C10.4006 3.21742 11.0751 3.72163 11.6142 4.35506Z">
                        </path>
                    </svg>
                    <svg class="instagram__icon instagram__icon--comment" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20.656 17.008C21.8711 14.9061 22.2795 12.4337 21.8048 10.0527C21.3301 7.67172 20.0048 5.54497 18.0765 4.06978C16.1482 2.59458 13.7488 1.87186 11.3266 2.0366C8.9043 2.20135 6.62486 3.24231 4.91408 4.96501C3.20329 6.68772 2.17817 8.97432 2.03024 11.3977C1.8823 13.821 2.62166 16.2153 4.1102 18.1334C5.59874 20.0514 7.73463 21.3619 10.1189 21.82C12.5031 22.2782 14.9726 21.8527 17.066 20.623L22 22L20.656 17.008Z">
                        </path>
                    </svg>
                    <svg class="instagram__icon instagram__icon--message" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path d="M22 3 9.218 10.083M11.698 20.334 22 3.001H2L9.218 10.084 11.698 20.334Z"></path>
                    </svg>
                </div>
                <div class="right">
                    <svg class="instagram__icon instagram__icon--saved" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path d="M20 21L12 13.44L4 21V3H20V21Z"></path>
                    </svg>
                </div>
            </div>
        </article>
    </div>

    <div class="pack-peta">
        <div class="nama-map">
            <h1>Contact Information</h1>
        </div>
        <div class="map-info">
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.325500129409!2d113.69664727369177!3d-8.169925081875032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943badc22eff%3A0x6f4eb0009c7ea083!2sJl.%20Sultan%20Agung%20No.11%2C%20Tembaan%2C%20Kepatihan%2C%20Kec.%20Kaliwates%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur%2068131!5e0!3m2!1sid!2sid!4v1695602102332!5m2!1sid!2sid"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="detail-map">
                <h2>Contact Us</h2>
                <p>Apabila mengalami kesusahan bisa menghubungi kami</p>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-phone" viewBox="0 0 16 16">
                            <path
                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg> +62 877-5287-4282
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg> @angkasa_photo
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg> Jl. Sultan agung no. 11 jember
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-line"></div>
        <div class="footer-wrapper">
            <div class="footer-coloumns">
                <section class="footer-logo">
                    <img src="assets/Logo Angkasa Photobooth.png" alt="Logo footer">
                </section>
                <section>
                    <h3>Menu</h3>
                    <ul>
                        <li>
                            <a href="Dashboard.php" title="Home">Home</a>
                        </li>
                        <li>
                            <a href="Gallery.php" title="Gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="Ourpackage.php" title="Our-Package">Our Package</a>
                        </li>
                        <li>
                            <a href="Pemesanan.php" title="Pemesanan">Pemesanan</a>
                        </li>
                        <li>
                            <a href="Tentang.php" title="Tentang-Kami">Tentang Kami</a>
                        </li>
                    </ul>
                </section>
                <section>
                    <h3>Pemesanan</h3>
                    <ul>
                        <li>
                            <a href="#" title="Pemesanan-Daerah-Jember">Pemesanan Daerah Jember</a>
                        </li>
                        <li>
                            <a href="#" title="Pemesanan-Diluar-Daerah-Jember">Pemesanan Diluar Daerah Jember</a>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="footer-bottom">
                <div class="social-links">
                    <ul>
                        <li>
                            <a href="#" title="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="WhatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <small>
                    &copy; <span id="year"></span> ANGKASA PHOTOBOOTH
                </small>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
</body>

</html>