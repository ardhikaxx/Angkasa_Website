<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa | Dashboard Page</title>
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

        .dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            justify-content: center;
            place-items: center;
            place-content: center;
            padding: 10px;
            margin-top: 100px;
        }

        .left-content {
            text-align: left;
            padding-left: 50px;
            width: 50%;
            animation: slideInLeft 1s ease;
            transition: transform 0.5s ease;
            margin-top: 2px;
        }

        .dashboard-title {
            font-size: 65px;
            font-family: "Poppins", sans-serif;
            font-weight: 800;
        }

        .dashboard-subtitle {
            font-size: 20px;
            font-family: "Poppins", sans-serif;
            margin-top: -35px;
            margin-bottom: 25px;
        }

        .continue-button {
            background-color: black;
            font-family: "Poppins", sans-serif;
            color: white;
            border: 2px solid black;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
            font-weight: 800;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            width: 300px;
            text-decoration: none;
        }

        .continue-button:hover {
            background-color: white;
            color: black;
            border: 2px solid black;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
        }

        .right-content {
            flex: 1;
            text-align: right;
            padding-right: 50px;
            width: 50%;
            animation: slideInRight 1s ease;
            transition: transform 0.5s ease;
            margin-top: 20px;
            margin-right: 40px;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
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
            border-radius: 15px;
            justify-content: center;
            transform: rotateY(0deg);
        }

        .contohfoto-front img {
            width: 450px;
            height: 300px;
            border-radius: 15px;
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
            font-family: "Poppins", sans-serif;
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
            font-family: "Poppins", sans-serif;
        }

        .btn {
            background: linear-gradient(to bottom, #000022, #0C0055, #1A0088, #2800BB, #3600EE, #4500FF);
            font-family: "Poppins", sans-serif;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            display: inline-block;
            font-size: 1rem;
            margin: 15px 0 10px 10px;
            cursor: pointer;
            transition: background 0.4s, transform 0.2s, box-shadow 0.4s, color 0.4s;
        }

        .btn:hover {
            background: linear-gradient(to bottom, #3600EE, #4500FF, #3600EE);
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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

        .pack-gallery {
            display: flex;
            align-items: center;
            column-gap: 20px;
            overflow-x: scroll;
            margin-top: 30px;
            margin-left: 35px;
            margin-right: 45px;
        }

        .gallery-item {
            scroll-snap-align: center;
            min-width: 40%;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
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
            width: 800px;
        }

        .map {
            flex: 1;
            padding: 20px;
        }

        .map iframe {
            max-width: 100%;
            border-radius: 15px;
            border: 2px solid linear-gradient(to bottom, #000022, #0C0055, #1A0088, #2800BB, #3600EE, #4500FF);
        }

        .detail-map {
            flex: 1;
            margin-bottom: 100px;
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
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .detail-map svg {
            margin-right: 10px;
        }

        .detail-map .bi-phone {
            stroke: black;
            stroke-width: 0.4;
        }

        .detail-map .bi-geo-alt {
            stroke: black;
            stroke-width: 0.4;
        }

        .detail-map h1 {
            text-align: center;
            font-size: 30px;
        }

        .nama-map {
            text-align: center;
        }

        footer {
            background-color: #000;
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

        .menu-footer {
            justify-content: end;
            align-items: flex-end;
        }

        .menu-footer li::before {
            content: "🌠";
        }

        .footer-coloumns ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer-coloumns ul a {
            color: #9C9C9C;
            text-decoration: none;
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-coloumns ul a::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #fff;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        .footer-coloumns ul a:hover {
            color: #fff;
        }

        .footer-coloumns ul a:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
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
            font-size: 14px;
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
            --star-color: linear-gradient(to bottom, #000022, #0C0055, #1A0088, #2800BB, #3600EE, #4500FF);
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

        .promo {
            width: 100%;
            text-align: center;
            height: auto;
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;
        }

        .promo-title p {
            margin-top: 5px;
            font-family: "Poppins", sans-serif;
        }

        .promo-title h1 {
            margin-bottom: 5px;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
        }

        .content {
            width: 900px;
            margin: 0 auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 10px;
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

    <div class="dashboard">
        <div class="left-content">
            <h1 class="dashboard-title">Angkasa<br>Photobooth</h1>
            <p class="dashboard-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                luctus nec ullamcorper mattis.</p>
            <a href="ourpackage.php" class="continue-button">Get Started</a>
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
            <p>Choose the Package You Want</p>
        </div>
    </div>
    <div class="pack-card">
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Self Photobox</p>
            <p class="card-body">Take a booth with automatic touchscreen screen (Only Landscape)</p>
            <a href="ourpackage.php" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Self Photo</p>
            <p class="card-body">Self Photo with Remote Shuter (Landscape & Portrait)</p>
            <a href="ourpackage.php" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">Manual Photobooth</p>
            <p class="card-body">Take a photo manual with photographer (Landscape & portrait)</p>
            <a href="ourpackage.php" class="btn">Read More</a>
        </div>
        <div class="card">
            <div class="card-image"></div>
            <p class="card-title">360 Videobooth</p>
            <p class="card-body">Take a Video with our equipment (Only portrait)</p>
            <a href="ourpackage.php" class="btn">Read More</a>
        </div>
    </div>

    <div class="promo">
        <div class="promo-title">
            <h1>Promo</h1>
            <p>Jangan sampai ketinggalan promonya!</p>
        </div>
    </div>

    <div class="content">

    </div>

    <div class="gallery">
        <div class="gallery-title">
            <h1>Gallery</h1>
            <p>info beli gedang goreng</p>
        </div>
    </div>

    <div class="carousel-wrapper">
        <div class="carousel-container">
            <div class="carousel">
                <div class="image-one"></div>
                <div class="image-two"></div>
                <div class="image-three"></div>
            </div>
        </div>
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
                <p>kalau anda ada kesulitan, anda dapat bisa menghubungi kontak yang tersedia.</p>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor"
                            class="bi bi-phone" viewBox="0 0 16 16">
                            <path
                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg> 0877-5287-4282
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg> @angkasa_photo
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" fill="currentColor"
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
                <section class="menu-footer">
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
                <sectio class="menu-footer">
                    <h3>Pemesanan</h3>
                    <ul>
                        <li>
                            <a href="daerahjember.php" title="Pemesanan-Daerah-Jember">Pemesanan Daerah Jember</a>
                        </li>
                        <li>
                            <a href="diluarjember.php" title="Pemesanan-Diluar-Daerah-Jember">Pemesanan Diluar Daerah
                                Jember</a>
                        </li>
                    </ul>
                </sectio>
            </div>
            <div class="footer-bottom">
                <div class="social-links">
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/angkasa_photo/" title="Instagram" target="_blank">
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