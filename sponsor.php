<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <title>Angkasa | Sponsor Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .navbar-menu #Pemesanan {
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

        .container-pemesanan {
            width: 450px;
            padding: 10px;
            margin-top: 100px;
            margin-bottom: 25px;
            font-family: "Poppins", sans-serif;
        }

        .container-pemesanan h1 {
            font-size: 28px;
            text-align: center;
            color: #000;
            font-weight: 800;
            margin-bottom: 35px;
        }

        .container-pemesanan #step-2::after {
            margin-top: 100px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 11px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: transparent;
        }

        .proposal-container {
            display: flex;
            justify-content: center;
            width: 100%;
            text-align: center;
        }

        #proposal {
            display: none;
        }

        .input-label {
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px dashed #ccc;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .icon {
            font-size: 24px;
            margin-right: 10px;
        }

        #proposal:hover+.input-label,
        #proposal:focus+.input-label {
            border: 2px dashed #007bff;
        }

        label {
            flex-basis: 30%;
            font-weight: bold;
        }

        input,
        select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            border: none;
            outline: none;
            background-color: #EBECF0;
            box-shadow: inset 2px 2px 10px #BABECC, inset -5px -5px 10px #FFF;
            box-sizing: border-box;
        }

        button {
            background-color: #131313;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:disabled {
            background-color: #ccc;
            color: #888;
            cursor: not-allowed;
        }

        .next-button {
            margin-top: 20px;
        }

        .prev-button {
            background-color: #6c6c6c;
        }

        .submit-button {
            background-color: #4CAF50;
            margin-top: 10px;
        }

        .checkbox-group {
            height: 100px;
            margin-top: -10px;
        }

        .checkbox-group h3 {
            font-size: 16px;
            padding-right: 20px;
            align-items: start;
        }

        input[type="checkbox"] {
            display: none;
        }

        .checkbox-group label {
            margin-bottom: -15px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .checkbox-group label:before {
            content: " ";
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 10px;
            border: 2px solid #000;
            border-radius: 3px;
            vertical-align: middle;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"]+label:before {
            background-color: #fff;
            margin-bottom: 5px;
        }

        .checkbox-group input[type="checkbox"]:checked+label:before {
            background-color: #000;
            font-family: "FontAwesome";
            content: "\f00c";
            color: #fff;
            text-align: center;
        }

        .checkbox-group input[type="checkbox"]:disabled+label:before {
            text-decoration: line-through;
            color: #999;
            cursor: not-allowed;
        }

        .checkbox-group input[type="checkbox"]:disabled+label {
            color: #999;
            cursor: not-allowed;
        }

        .checkbox-group input[type="checkbox"]:checked+label:after {
            display: block;
            color: #fff;
            font-size: 16px;
            text-align: center;
            line-height: 18px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        #quota-2R-dropdown,
        #unlimited-2R-dropdown,
        #quota-4R-dropdown,
        #unlimited-4R-dropdown,
        #unlimited-360-dropdown {
            display: none;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="dashboard.php"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="dashboard.php" id="Home">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" id="Pemesanan" class="dropbtn active-link">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="daerahjember.php">Daerah Jember</a>
                    <a href="diluarjember.php">Diluar Jember</a>
                    <a href="sponsor.php">Sponsor</a>
                </div>
            </li>
            <li><a href="ourpackage.php" id="Our-Package">Our Package</a></li>
            <li><a href="gallery.php" id="Gallery" >Gallery</a></li>
            <li><a href="tentang.php" id="Tentang-Kami" >Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div id="circularcursor"></div>

    <div class="pack-sponsor">
        <div class="container-pemesanan">
            <form id="step-1">
                <h1>Form Pengajuan Sponsor</h1>
                <div class="input-container">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" placeholder="Contoh: Jhon Doe" required>
                </div>
                <div class="input-container">
                    <label for="phone">Nomer Telepon:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Contoh: 081222333444" required>
                </div>
                <div class="input-container">
                    <label for="address">Alamat Acara:</label>
                    <input type="text" id="address" name="address" placeholder="Contoh: Jl. Walikota Mustajab No.59, Surabaya" required>
                </div>
                <div class="input-container">
                    <label for="date">Tanggal Acara:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <button class="next-button" id="next-1" disabled>Selanjutnya</button>
            </form>

            <form id="step-2" style="display: none;">
                <h1>Form Pengajuan Sponsor</h1>
                <div class="input-container proposal-container">
                    <label for="proposal" class="input-label">
                        <span class="icon">📁</span> Drop Here or Click to Upload PDF
                    </label>
                    <input type="file" id="proposal" name="proposal" accept=".pdf" required>
                </div>
                <button class="prev-button" id="prev-2">Kembali</button>
                <button class="submit-button" id="submit" disabled>Pesan</button>
            </form>
        </div>
    </div>

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

    <script>
        document.getElementById("proposal").addEventListener("change", function (event) {
            const fileName = event.target.files[0].name;
            document.querySelector(".input-label").textContent = fileName;
        });
    </script>

    <script>
        const nextButton1 = document.getElementById("next-1");
        const nextButton3 = document.getElementById("submit");

        const step1Inputs = [document.getElementById("name"), document.getElementById("phone"), document.getElementById("address"), document.getElementById("date")];
        const step3Inputs = [document.getElementById("proposal")];

        function isStepFormValid(inputs) {
            return inputs.every(input => input.value.trim() !== "");
        }

        step1Inputs.forEach(input => {
            input.addEventListener("input", () => {
                nextButton1.disabled = !isStepFormValid(step1Inputs);
            });
        });

        step2Inputs.forEach(input => {
            input.addEventListener("input", () => {
                nextButton2.disabled = !isStepFormValid(step2Inputs);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const step1Form = document.getElementById("step-1");
            const step2Form = document.getElementById("step-2");

            const nextButton1 = document.getElementById("next-1");
            const prevButton2 = document.getElementById("prev-2");

            nextButton1.addEventListener("click", function (e) {
                e.preventDefault();
                step1Form.style.display = "none";
                step2Form.style.display = "block";
            });

            prevButton2.addEventListener("click", function (e) {
                e.preventDefault();
                step2Form.style.display = "none";
                step1Form.style.display = "block";
            });
        });
    </script>
</body>

</html>